# Stream Telecom

В index.php приведено два варианта получения масок:

        for ($ii = 3; $ii <= $max; $ii++) {
            for ($i = $first; $i <= $last; $i++) {
                $str = substr($i, 0, $ii);
                $arr[$data[4]]['7' . $str] = null;
            }
        }

        $str = "$first-$last";
        for ($ii = 3; $ii <= $max; $ii++) {
            for ($i = $first; $i <= $last; $i++) {
                preg_match("/^([$str]{0,$ii})\d+$/", $i, $matches);
                $arr[$data[4]]['7' . $matches[1]] = null;
            }
        }
