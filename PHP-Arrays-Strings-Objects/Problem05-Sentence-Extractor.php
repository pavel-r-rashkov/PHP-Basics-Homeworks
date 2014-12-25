<!DOCTYPE html>
<html>
<head>
    <title>Text filter</title>
</head>
<body>
    <form action="" method="POST">
        <textarea name="text"></textarea><br />
        <input type="text" name="word">
        <input type="submit" value="Count words"/>
    </form>
</body>
</html>

<?php
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"];
    $word = $_POST["word"];
    $pattern = "/[^\!\.\?]*[\s]" . $word . "(([\s\,][^\!\.\?]*[\!\.\?])|([\!\.\?]))/i";

    preg_match_all($pattern, $text, $matches);

    foreach($matches[0] as $match) {
        echo "<p>$match</p>";
    }
}
?>