<?php

namespace Differ\Stylish;

function makeString(mixed $item)
{
    if (!is_array($item)) {
        $result = trim(json_encode($item, JSON_PRETTY_PRINT), "\"");
        return $result;
    }
    return $item;
}

function printing($array, $separator = '    ', $depth = 0, $offset = 2)
{
    $adding = str_repeat($separator, $depth);
    $result = array_map(function ($key, $value) use ($separator, $depth, $offset) {
        $depth += 1;
        if (in_array($key[0], ['+', '-', ' '])) {
            $adding = str_repeat($separator, $depth);
            $adding = substr($adding, $offset);
        } else {
            $adding = str_repeat($separator, $depth);
        }
        $result = "{$adding}{$key}";
        if (is_array($value)) {
<<<<<<< HEAD
            $convertedValue = printing($value, $separator, $depth, $offset);
        } else {
            $convertedValue = makeString($value);
=======
            $value = printing($value, $separator, $depth, $offset);
            $convertedValue = $value;
        } else {
            $convertedValue = makeStringIfNotArray($value);
>>>>>>> refs/remotes/origin/main
        }
        $result .= ": {$convertedValue}";
        return $result;
    }, array_keys($array), $array);
    $final = implode("\n", $result);
    return "{\n{$final}\n{$adding}}";
}
