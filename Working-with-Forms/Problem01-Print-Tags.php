<html>
    <head>
        <title>Print Tags</title>
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

    foreach( $tags as $key => $value) {
        echo htmlentities( $key ) . " : " . htmlentities( $value ) . "<br />";
    }
}
?>