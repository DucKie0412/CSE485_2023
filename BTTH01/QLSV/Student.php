<?php

$filename = "/CSE485_2023/BTTH01/data/sinhvien.csv";
$file = fopen($filename, "r");
$data = array();

while (($row = fgets($file)) !== false){
    $data[] = $row;
}

fclose($file);


?>
