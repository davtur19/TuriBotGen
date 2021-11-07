<?php

$api = json_decode(file_get_contents('botapi.json'), true);

$types = [
    'int' => 'int',
    'Array<string>' => 'array',
    'string' => 'string',
    'InputFile' => '\CURLFile',
    'bool' => 'bool',
    'float' => 'float',
    'ChatPermissions' => 'array',
    'Array<BotCommand>' => 'array',
    'InlineKeyboardMarkup' => 'array',
    'InputMedia' => 'array',
    'MaskPosition' => 'array',
    'Array<InlineQueryResult>' => 'array',
    'Array<ShippingOption>' => 'array',
    'Array<PassportElementError>' => 'array',
    'Array<LabeledPrice>' => 'array',
    'Array<MessageEntity>' => 'array',
    'Array<InputMediaAudio, InputMediaDocument, InputMediaPhoto, InputMediaVideo>' => 'array',
    'Array<int>' => 'array',
    'BotCommandScope' => 'array',
];

$out
    = '<?php /** @noinspection PhpOptionalBeforeRequiredParametersInspection */';
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
$out .= PHP_EOL . PHP_EOL;
foreach ($api['methods'] as $method) {
    $args = [];

    $out .= 'public function ';
    $out .= $method['name'];
    $out .= '(';

    if (!empty($method['fields'])) {
        $optional = false;
        $out .= PHP_EOL;
        //gen parameters
        foreach ($method['fields'] as $field) {
            $out .= "\t";
            if (count($field['types']) === 1) {
                $out .= $types[$field['types'][0]];
                $out .= ' ';
            } elseif ($field['name'] == 'reply_markup') {
                $out .= 'array ';
            }

            $out .= '$' . $field['name'];

            if ($field['optional'] or $optional) {
                $optional = true;
                $out .= ' = null';
            } else {
                //gen array $args of mandatory parameters
                if ($types[$field['types'][0]] === 'array' or $field['name']
                    === 'reply_markup'
                ) {
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
        $out .= ') {';
        $out .= PHP_EOL;

        //gen string from args
        if ($args === []) {
            $out .= '$args = [];';
        } else {
            $out .= '$args = [';
            $out .= PHP_EOL;
            foreach ($args as $name) {
                if ($name['array']) {
                    $out .= "\t" . '\'' . $name['name'] . '\' => json_encode($'
                        . $name['name'] . ')';
                } else {
                    $out .= "\t" . '\'' . $name['name'] . '\' => $' . $name['name'];
                }
                if (end($args)['name'] != $name['name']) {
                    $out .= ',';
                }
                $out .= PHP_EOL;
            }

            $out .= '];';
        }
        $out .= PHP_EOL . PHP_EOL;

        //gen "if !== null" of non-mandatory parameters
        $optional = false;
        foreach ($method['fields'] as $field) {
            if ($field['optional'] or $optional) {
                $optional = true;
                $out .= 'if ($' . $field['name'] . ' !== null) {' . PHP_EOL;
                $out .= "\t" . '$args[\'' . $field['name'] . '\'] = ';
                if ($types[$field['types'][0]] === 'array' or $field['name']
                    === 'reply_markup'
                ) {
                    $out .= 'json_encode($' . $field['name'] . ')';
                } else {
                    $out .= '$' . $field['name'];
                }
                $out .= ';' . PHP_EOL;
                $out .= '}' . PHP_EOL . PHP_EOL;
            }
        }

        //end of function
        $out .= 'return $this->Request(\'' . $method['name'] . '\', $args);';
    } else {
        $out .= ')';
        $out .= PHP_EOL;
        $out .= '{';
        $out .= PHP_EOL;
        $out .= 'return $this->Request(\'' . $method['name'] . '\', []);';
    }

    $out .= PHP_EOL;
    $out .= '}';
    $out .= PHP_EOL . PHP_EOL;
    /*if ($method['name'] == 'sendMessage') {
        break;
    }*/
}

$out .= PHP_EOL;
$out .= '}';

//echo $out;

file_put_contents('Api.php', $out);

//var_export($typeGen);