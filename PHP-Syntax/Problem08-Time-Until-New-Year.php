<?php
$currentTime = getdate();

$hours = 23 - $currentTime["hours"];
$minutes = 59 - $currentTime["minutes"];
$seconds = 59 - $currentTime["seconds"];
$days = 364 - $currentTime["yday"];

echo "Hours until new year : ", ($days * 24 + $hours) . "<br />";
echo "Minutes until new year : ", ($days * 24 * 60 + $hours * 60 + $minutes) . "<br />";
echo "Seconds until new year : ", ($days * 24 * 3600 + $hours * 3600 + $minutes * 60 + $seconds) . "<br />";
echo "Days:Hours:Minutes:Seconds $days:$hours:$minutes:$seconds";
?>