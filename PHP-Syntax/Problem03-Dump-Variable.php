<?php

$vars = ["hello", 15, 1.234, [1, 2, 3], (object)[2, 34]];

function DumpVariable($var) {
    if(gettype($var) == "integer" || gettype($var) == "double") {
        var_dump($var);

    }else {
        echo "<p>" . gettype($var) . "</p>";
    }
}

foreach($vars as $var) {
    DumpVariable($var);
}

?>