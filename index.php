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
//        $arr[$data[4]]['7' . $data[0]] = null;


        $first = (int)($data[0] . $data[1]);
        $last = (int)($data[0] . $data[2]);

//        $first = rtrim(($data[0] . $data[1]), '0');
        $end = strlen(rtrim(($data[0] . $data[2]), '9'));

//        var_dump($first, $last);
//        var_dump(strlen($end) - 1);

        for ($ii = 3; $ii <= $end; $ii++) {

            for ($i = $first; $i <= $last; $i++) {

                $str = substr($i, 0, $ii);

                $arr[$data[4]]['7' . $str] = null;
            }
        }

        foreach ($arr as $key => $item) {
            $result[$key] = array_keys($item);
        }
    }

//    error_log(print_r($arr, true), 3, 'log.log');
//    print_r($arr);
//    exit();
}
error_log(print_r($result, true), 3, 'log.log');
//error_log(print_r($arr), 3, 'log.log');
//print_r($arr);

fclose($stream);