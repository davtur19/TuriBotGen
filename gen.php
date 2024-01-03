<?php

use JetBrains\PhpStorm\NoReturn;

function errHandle($errNo, $errStr, $errFile, $errLine): void {
    echo $errNo . PHP_EOL;
    echo $errStr . PHP_EOL;
    echo $errFile . PHP_EOL;
    echo $errLine . PHP_EOL;
    exit(1);
}

set_error_handler('errHandle');


$api = json_decode(file_get_contents('botapi.json'), true);

$types = [
    'int'                                                                          => 'int',
    'Array<string>'                                                                => 'array',
    'string'                                                                       => 'string',
    'InputFile'                                                                    => '\CURLFile',
    'bool'                                                                         => 'bool',
    'float'                                                                        => 'float',
    'ChatPermissions'                                                              => 'array',
    'Array<BotCommand>'                                                            => 'array',
    'InlineKeyboardMarkup'                                                         => 'array',
    'InputMedia'                                                                   => 'array',
    'MaskPosition'                                                                 => 'array',
    'Array<InlineQueryResult>'                                                     => 'array',
    'Array<ShippingOption>'                                                        => 'array',
    'Array<PassportElementError>'                                                  => 'array',
    'Array<LabeledPrice>'                                                          => 'array',
    'Array<MessageEntity>'                                                         => 'array',
    'Array<InputMediaAudio, InputMediaDocument, InputMediaPhoto, InputMediaVideo>' => 'array',
    'Array<int>'                                                                   => 'array',
    'BotCommandScope'                                                              => 'array',
    'Array<InputMediaAudio|InputMediaDocument|InputMediaPhoto|InputMediaVideo>'    => 'array',
    'MenuButton'                                                                   => 'array',
    'ChatAdministratorRights'                                                      => 'array',
    'InlineQueryResult'                                                            => 'array',
    'Array<InputSticker>'                                                          => 'array',
    'InputSticker'                                                                 => 'array',
    'InlineQueryResultsButton'                                                     => 'array',
    'LinkPreviewOptions'                                                           => 'array',
    'ReplyParameters'                                                              => 'array',
    'Array<ReactionType>'                                                          => 'array',
];

$methods_upload = [
    'sendMediaGroup',   // Array of InputMediaAudio, InputMediaDocument, InputMediaPhoto and InputMediaVideo
    'editMessageMedia', // InputMedia
];

// Parameters to be added last, to avoid compatibility problems
$last_parameters = [
    // 'message_thread_id',
    //'has_spoiler',
];

$out = '';
foreach ($api['methods'] as $method) {
    $args = [];

    $out .= PHP_EOL . "public function {$method['name']}(";

    if (!empty($method['fields'])) {
        $out .= PHP_EOL;

        // Move parameters to the end of the array to avoid compatibility problems
        foreach ($method['fields'] as $key => $field) {
            if (in_array($field['name'], $last_parameters)) {
                unset($method['fields'][$key]);
                $method['fields'][] = $field;
            }
        }

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
            $out .= "\t";
            if ($field['optional'] and count($field['types']) === 1) {
                $out .= '?';
            }
            if (count($field['types']) === 1) {
                $out .= $types[$field['types'][0]];
                $out .= ' ';
            } elseif ($field['types'][0] === 'int' and $field['types'][1] === 'string') {
                if ($field['optional']) {
                    $out .= 'int|string|null ';
                } else {
                    $out .= 'int|string ';
                }
            } elseif ($field['types'][0] === 'InputFile' and $field['types'][1] === 'string') {
                if ($field['optional']) {
                    $out .= '\CURLFile|string|null ';
                } else {
                    $out .= '\CURLFile|string ';
                }
            }  elseif ($field['name'] == 'reply_markup') {
                if ($field['optional']) {
                    $out .= '?array ';
                } else {
                    $out .= 'array ';
                }
            }

            $out .= '$' . $field['name'];

            if (!$field['optional']) {
                //gen array $args of mandatory parameters
                if ($types[$field['types'][0]] === 'array' or $field['name'] === 'reply_markup') {
                    $args[] = ['name' => $field['name'], 'array' => true];
                } else {
                    $args[] = ['name' => $field['name'], 'array' => false];
                }
            }

            if (end($method['fields']) != $field) {
                $out .= ', ';
            }
            $out .= PHP_EOL;
        }
        $out .= '): \stdClass {';
        $out .= PHP_EOL;

        $out .= "\t";
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
                        $out .= "\t\t'{$name['name']}' => json_encode(\${$name['name']})";
                    } else {
                        $out .= "\t\t'{$name['name']}' => \$" . $name['name'];
                    }
                    if (end($args)['name'] != $name['name']) {
                        $out .= ',';
                    }
                    $out .= PHP_EOL;
                }
            }

            $out .= "\t];";

            // support specific case for upload media with attach:// in json object
            if (in_array($method['name'], $methods_upload) and in_array(['name' => 'media', 'array' => true], $args)) {
                $out .= PHP_EOL . PHP_EOL . "foreach (\$media as \$key => \$value) {" . PHP_EOL;
                $out .= "\t\tif (is_object(\$value['media'])) {" . PHP_EOL;
                $out .= "\t\t\t\$args['upload' . \$key] = \$value['media'];" . PHP_EOL;
                $out .= "\t\t\t\$media[\$key]['media'] = 'attach://upload' . \$key;" . PHP_EOL;
                $out .= "\t\t}" . PHP_EOL;
                $out .= "\t}" . PHP_EOL;
                $out .= "\t\$args['media'] = json_encode(\$media);";
            }
        }
        $out .= PHP_EOL . PHP_EOL;

        //gen "if !== null" of non-mandatory parameters
        foreach ($method['fields'] as $field) {
            if ($field['optional']) {
                $out .= "\tif (null !== \$" . $field['name'] . ') ';
                // support specific case for upload media with attach:// in json object
                if (in_array($method['name'], $methods_upload) and $field['name'] === 'media') {
                    $out .= "\t{ " . PHP_EOL;
                    $out .= "\t\tif (is_object(\$media['media'])) {" . PHP_EOL;
                    $out .= "\t\t\t\$args['upload'] = \$media['media'];" . PHP_EOL;
                    $out .= "\t\t\t\$media['media'] = 'attach://upload';" . PHP_EOL;
                    $out .= "\t\t}" . PHP_EOL;
                    $out .= "\t}" . PHP_EOL;
                }
                $out .= '$args[\'' . $field['name'] . '\'] = ';
                if ($types[$field['types'][0]] === 'array' or $field['name'] === 'reply_markup') {
                    $out .= "json_encode(\${$field['name']})";
                } else {
                    $out .= '$' . $field['name'];
                }
                $out .= ';' . PHP_EOL;
            }
        }

        //end of function
        $out .= PHP_EOL . "\treturn \$this->Request('" . $method['name'] . '\', $args);';
    } else {
        $out .= ')';
        $out .= PHP_EOL;
        $out .= '{';
        $out .= PHP_EOL;
        $out .= "\treturn \$this->Request('" . $method['name'] . '\', []);';
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
$out .= 'abstract class Api implements ApiInterface';
$out .= PHP_EOL;
$out .= '{';
$out .= PHP_EOL;
foreach ($lines as $line) {
    if($line === '') {
        $out .= $line . PHP_EOL;
    } else {
    $out .= "\t" . $line . PHP_EOL;
    }
}
$out .= '}';

file_put_contents('Api.php', $out);

echo "OK";

//var_export($typeGen);