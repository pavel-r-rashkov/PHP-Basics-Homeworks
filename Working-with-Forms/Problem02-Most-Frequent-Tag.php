<html>
<head>
    <title>Most frequent tag</title>
</head>
<body>
<form action="" method="GET">
    <label>Enter Tags:</label><br />
    <input type="text" name="tags">
    <input type="submit" value="Submit">
</form>
</body>
</html>


<?php
if( isset( $_GET["tags"] )) {
    $tags = explode( ", ", $_GET["tags"] );
    $frequencies = [];

    foreach( $tags as $tag) {
        $count = $frequencies[ $tag ] ? $frequencies[ $tag ] + 1 : 1;
        $frequencies[ $tag ] = $count;
    }

    arsort( $frequencies );
    $mostFreq = [];
    $last = 0;

    foreach( $frequencies as $key => $value) {
        if( $value == $last || $last == 0 ) {
            array_push( $mostFreq, $key );
            $last = $value;
        }
        echo htmlentities( $key ) . "  " . htmlentities( $value ) . "<br />";
    }

    echo "Most Frequent Tag is: ";

    foreach( $mostFreq as $t ) {
        echo htmlentities( $t ), " ";
    }
}
?>