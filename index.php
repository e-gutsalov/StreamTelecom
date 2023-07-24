<?php

$stream = @fopen('DEF-9xx.csv', 'r');

if ($stream === false) {
    echo "Файл не найден\n";
}

$arr = [];
$result = [];
$flag = true;

while (($data = @fgetcsv($stream, 200, ';')) !== false) {
    if($flag) {
        $flag = false;
        continue;
    }

    if (isset($data[4])) {
        if (!isset($arr[$data[4]])) {
            $arr[$data[4]] = null;
        }

        $first = (int)($data[0] . $data[1]);
        $last = (int)($data[0] . $data[2]);

        $start = rtrim(($data[0] . $data[1]), '0');
        $end = rtrim(($data[0] . $data[2]), '9');

        $max = max(strlen($start), strlen($end));

        for ($ii = 3; $ii <= $max; $ii++) {
            for ($i = $first; $i <= $last; $i++) {
                $str = substr($i, 0, $ii);
                $arr[$data[4]]['7' . $str] = null;
            }
        }

// TODO реализация через регулярное выражение, работает медленно

//        $str = "$first-$last";
//        for ($ii = 3; $ii <= $max; $ii++) {
//            for ($i = $first; $i <= $last; $i++) {
//                preg_match("/^([$str]{0,$ii})\d+$/", $i, $matches);
//                $arr[$data[4]]['7' . $matches[1]] = null;
//            }
//        }

        foreach ($arr as $key => $item) {
            $result[$key] = array_keys($item);
        }
    }
}

error_log(print_r($result, true), 3, 'log.log');

fclose($stream);