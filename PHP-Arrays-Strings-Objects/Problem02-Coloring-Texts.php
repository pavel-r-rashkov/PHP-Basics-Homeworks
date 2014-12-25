<!DOCTYPE html>
<html>
<head>
    <title>Word Mapping</title>
    <style>
        .red {
            color: red;
        }

        .blue {
            color: blue;
        }
    </style>
</head>
<body>
<form action="" method="GET">
    <textarea name="text"></textarea><br />
    <input type="submit" value="Color text"/>
</form>
<?php
if(isset($_GET["text"])) {
    $chars = str_split($_GET["text"]);

    foreach($chars as $char) {
        echo ord($char) % 2 == 0 ? "<span class='red'>" : "<span class='blue'>", htmlentities($char) . "</span> ";
    }
}
?>
</body>
</html>