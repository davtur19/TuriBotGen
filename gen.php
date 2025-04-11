<?php

const TAB = '    ';

function errHandle($errNo, $errStr, $errFile, $errLine): void {
    echo $errNo . PHP_EOL;
    echo $errStr . PHP_EOL;
    echo $errFile . PHP_EOL;
    echo $errLine . PHP_EOL;
    exit(1);
}

set_error_handler('errHandle');


$api = json_decode(file_get_contents('botapi.json'), true);

function returnType(string $type): string {
    // se $type inizia con "Array" allora è un array
    if (str_starts_with($type, 'Array')) {
        return 'array';
    }

    $types = [
        'int'                      => 'int',
        'string'                   => 'string',
        'InputFile'                => '\CURLFile',
        'bool'                     => 'bool',
        'float'                    => 'float',
        'ChatPermissions'          => 'array',
        'InlineKeyboardMarkup'     => 'array',
        'InputMedia'               => 'array',
        'MaskPosition'             => 'array',
        'BotCommandScope'          => 'array',
        'MenuButton'               => 'array',
        'ChatAdministratorRights'  => 'array',
        'InlineQueryResult'        => 'array',
        'InputSticker'             => 'array',
        'InlineQueryResultsButton' => 'array',
        'LinkPreviewOptions'       => 'array',
        'ReplyParameters'          => 'array',
        'InputProfilePhoto'        => 'array',
        'AcceptedGiftTypes'        => 'array',
    ];

    if (!isset($types[$type])) {
        return 'array';
    }

    return $types[$type];
}

$methods_upload = [
    'sendMediaGroup',   // Array of InputMediaAudio, InputMediaDocument, InputMediaPhoto and InputMediaVideo
    'editMessageMedia', // InputMedia
];

// Parameters to be added last, to avoid compatibility problems
$last_parameters = [
    'business_connection_id'
    // 'message_thread_id',
    //'has_spoiler',
];

$out = '';
foreach ($api['methods'] as $method) {
    $args = [];

    // Move parameters to the end of the array to avoid compatibility problems
    foreach ($method['fields'] as $key => $field) {
        if (in_array($field['name'], $last_parameters)) {
            unset($method['fields'][$key]);
            $method['fields'][] = $field;
        }
    }

    // generate documentation
    $out .= PHP_EOL;
    $out .= "/**" . PHP_EOL;
    $out .= " * " . wordwrap(str_replace("\n", PHP_EOL . " * ", $method['description']), 100, PHP_EOL . " * ");
    $out .= PHP_EOL . " *" . PHP_EOL;
    foreach ($method['fields'] as $field) {
        $out .= " * @param ";
        if (count($field['types']) === 1) {
            $out .= returnType($field['types'][0]);
        } elseif ($field['types'][0] === 'int' and $field['types'][1] === 'string') {
            $out .= 'int|string';
        } elseif ($field['types'][0] === 'InputFile' and $field['types'][1] === 'string') {
            $out .= '\CURLFile|string|InputFile';
        } elseif ($field['name'] == 'reply_markup') {
            $out .= 'array';
        }

        if ($field['optional']) {
            $out .= "|null";
        }
        $out .= ' ';

        $out .= '$' . $field['name'];

        $out .= " " . wordwrap($field['description'], 100, PHP_EOL . " *                                       ");

        $out .= PHP_EOL;
    }
    $out .= " * @return \stdClass" . PHP_EOL;
    $out .= " *" . PHP_EOL;
    $out .= " * @see https://core.telegram.org/bots/api#" . strtolower($method['name']) . PHP_EOL;
    $out .= " */" . PHP_EOL;

    // generate function and parameters
    $out .= "public function {$method['name']}(";

    if (!empty($method['fields'])) {
        $out .= PHP_EOL;

        // sort $method['fields'] by putting non-optional parameters first
        foreach ($method['fields'] as $field) {
            if ($field['optional']) {
                $array_optional[] = $field;
            } else {
                $array_required[] = $field;
            }
        }
        unset($method['fields']);
        $method['fields'] = [];
        if (isset($array_required)) {
            foreach ($array_required as $req) {
                $method['fields'][] = $req;
            }
        }
        unset($array_required);
        if (isset($array_optional)) {
            foreach ($array_optional as $opt) {
                $method['fields'][] = $opt;
            }
        }
        unset($array_optional);

        //gen parameters
        foreach ($method['fields'] as $field) {
            $out .= TAB;
            if (count($field['types']) === 1) {
                $out .= returnType($field['types'][0]);
                $out .= ' ';
            } elseif ($field['types'][0] === 'int' and $field['types'][1] === 'string') {
                $out .= 'int|string ';
            } elseif ($field['types'][0] === 'InputFile' and $field['types'][1] === 'string') {
                $out .= '\CURLFile|string|InputFile ';
            } elseif ($field['name'] == 'reply_markup') {
                $out .= 'array ';
            }

            $out .= '$' . $field['name'];

            if (!$field['optional']) {
                //gen array $args of mandatory parameters
                if (returnType($field['types'][0]) === 'array' or $field['name'] === 'reply_markup') {
                    $args[] = ['name' => $field['name'], 'array' => true];
                } else {
                    $args[] = ['name' => $field['name'], 'array' => false];
                }
            }

            if ($field['optional']) {
                $out .= ' = null';
            }

            if (end($method['fields']) != $field) {
                $out .= ',';
            }
            $out .= PHP_EOL;
        }
        $out .= '): \stdClass {';
        $out .= PHP_EOL;

        $out .= TAB;
        //gen string from args
        if ($args === []) {
            $out .= '$args = [];';
        } else {
            $out .= '$args = [';
            $out .= PHP_EOL;
            foreach ($args as $name) {
                // support specific case for upload media with attach:// in json object
                if (!(in_array($method['name'], $methods_upload) and $name['name'] === 'media')) {
                    if ($name['array']) {
                        $out .= TAB . TAB . "'{$name['name']}' => json_encode(\${$name['name']})";
                    } else {
                        $out .= TAB . TAB . "'{$name['name']}' => \$" . $name['name'];
                    }
                    if (end($args)['name'] != $name['name']) {
                        $out .= ',';
                    }
                    $out .= PHP_EOL;
                }
            }

            $out .= TAB . "];";

            // support specific case for upload media with attach:// in json object
            if (in_array($method['name'], $methods_upload) and in_array(['name' => 'media', 'array' => true], $args)) {
                $out .= PHP_EOL . PHP_EOL . "foreach (\$media as \$key => \$value) {" . PHP_EOL;
                $out .= TAB . TAB . "if (is_object(\$value['media'])) {" . PHP_EOL;
                $out .= TAB . TAB . TAB . "\$args['upload' . \$key] = \$value['media'];" . PHP_EOL;
                $out .= TAB . TAB . TAB . "\$media[\$key]['media'] = 'attach://upload' . \$key;" . PHP_EOL;
                $out .= TAB . TAB . "}" . PHP_EOL;
                $out .= TAB . "}" . PHP_EOL;
                $out .= TAB . "\$args['media'] = json_encode(\$media);";
            }
        }
        $out .= PHP_EOL . PHP_EOL;

        //gen "if !== null" of non-mandatory parameters
        foreach ($method['fields'] as $field) {
            if ($field['optional']) {
                $out .= TAB . "if (null !== \$" . $field['name'] . ') ';
                // support specific case for upload media with attach:// in json object
                if (in_array($method['name'], $methods_upload) and $field['name'] === 'media') {
                    $out .= TAB . "{ " . PHP_EOL;
                    $out .= TAB . TAB . "if (is_object(\$media['media'])) {" . PHP_EOL;
                    $out .= TAB . TAB . TAB . "\$args['upload'] = \$media['media'];" . PHP_EOL;
                    $out .= TAB . TAB . TAB . "\$media['media'] = 'attach://upload';" . PHP_EOL;
                    $out .= TAB . TAB . "}" . PHP_EOL;
                    $out .= TAB . "}" . PHP_EOL;
                }
                $out .= '$args[\'' . $field['name'] . '\'] = ';
                if (returnType($field['types'][0]) === 'array' or $field['name'] === 'reply_markup') {
                    $out .= "json_encode(\${$field['name']})";
                } else {
                    $out .= '$' . $field['name'];
                }
                $out .= ';' . PHP_EOL;
            }
        }

        //end of function
        $out .= PHP_EOL . TAB . "return \$this->Request('" . $method['name'] . '\', $args);';
    } else {
        $out .= '): \stdClass {';
        $out .= PHP_EOL;
        $out .= TAB . "return \$this->Request('" . $method['name'] . '\', []);';
    }

    $out .= PHP_EOL;
    $out .= '}';
    $out .= PHP_EOL;
    /*if ($method['name'] == 'sendMessage') {
        break;
    }*/
}


//echo $out;
$lines = explode(PHP_EOL, $out);
unset($out);

$out = '<?php' . PHP_EOL;
$out .= '/** @noinspection PhpUnused */';
$out .= PHP_EOL . PHP_EOL;
$out .= '//functions automatically generated from https://core.telegram.org/bots/api';
$out .= PHP_EOL;
$out .= '//generator source code https://github.com/davtur19/TuriBotGen';
$out .= PHP_EOL . PHP_EOL;
$out .= 'namespace TuriBot;';
$out .= PHP_EOL . PHP_EOL;
$out .= 'abstract class Api implements ApiInterface {';
$out .= PHP_EOL;
foreach ($lines as $line) {
    if ($line === '') {
        $out .= $line . PHP_EOL;
    } else {
        $out .= TAB . $line . PHP_EOL;
    }
}
$out .= '}';

file_put_contents('Api.php', $out);

echo "OK";

//var_export($typeGen);