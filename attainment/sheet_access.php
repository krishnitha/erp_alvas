<?php
    include "../Classes/PHPExcel.php";
    $excelFile = PHPExcel_IOFactory::load('../uploads/18CS55_2020-2021.xlsx');

    $sheet = $excelFile -> setActiveSheetIndex(3);

    echo $sheet -> getHighestRow();




?>