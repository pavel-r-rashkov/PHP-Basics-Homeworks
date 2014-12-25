<?php

$currentDate = getdate();
$year = $currentDate["year"];
$month = $currentDate["mon"];
$firstDay = date_create("$year-$month-1");

for($day = 0 ; $day < 31 ; $day++) {

    if($firstDay->format("m") == $month && $firstDay->format("w") == 0) {
        echo $firstDay->format("d M, Y"), "<br />";
    }

    $firstDay->add(new DateInterval("P1D"));
}

?>