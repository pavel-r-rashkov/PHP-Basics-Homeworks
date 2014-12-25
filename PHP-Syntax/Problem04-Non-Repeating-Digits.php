<?php

$n = [1234, 145, 15, 247];

function ContainsUniqueDigits($number) {
    if($number % 10 != ($number / 10) % 10 && $number % 10 != ($number / 100) % 10 && ($number / 100) % 10 != ($number / 10) % 10) {
        return true;
    }
    return false;
}

function GetMagicNumbers($number) {
    $result = false;

    for($i = 100 ; $i <= $number ; $i++) {
        if(ContainsUniqueDigits($i) && $i <= 999) {
            $result = true;
            echo $i . " ";
        }
    }

    echo $result ? "<br />" : "no<br />";
}

foreach($n as $num) {
    GetMagicNumbers($num);
}

?>