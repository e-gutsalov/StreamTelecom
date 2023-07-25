# Stream Telecom

## В index.php приведено два варианта получения масок:

### Вариант 1

        for ($i = $first; $i <= $last; $i++) {
            for ($ii = 3; $ii <= $max; $ii++) {
                $str = substr($i, 0, $ii);
                $arr[$data[4]]['7' . $str] = null;
            }
        }

### Вариант 2 (закомментирован)

        $str = "$first-$last";
        for ($i = $first; $i <= $last; $i++) {
            for ($ii = 3; $ii <= $max; $ii++) {
                preg_match("/^([$str]{0,$ii})\d+$/", $i, $matches);
                $arr[$data[4]]['7' . $matches[1]] = null;
            }
        }

