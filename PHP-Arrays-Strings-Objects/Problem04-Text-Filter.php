<!DOCTYPE html>
<html>
<head>
    <title>Text filter</title>
</head>
<body>
    <form action="" method="POST">
        <textarea name="text"></textarea><br />
        <input type="text" name="words">
        <input type="submit" value="Count words"/>
    </form>
</body>
</html>

<?php
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"];
    $words = explode(", ", $_POST["words"]);
    $pattern = "/" . join("|", $words) . "/";

    $result = preg_replace_callback($pattern, function($match) {return str_repeat("*", strlen($match[0]));}, $text);
    echo $result;
}
?>