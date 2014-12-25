<!DOCTYPE html>
<html>
<head>
    <title>Text filter</title>
</head>
<body>
<form action="" method="POST">
    <textarea name="text"></textarea><br />
    <input type="submit" value="Replace"/>
</form>
</body>
</html>

<?php
if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $text = $_POST["text"];
    $replacement = "[URL=$1]$2[/URL]";
    $pattern = "/<[\s]*a[^>]+href[\s]*=[\s]*[\"\']([^\"\']*)[\'\"][\s\S]*?>([^<]*)<[\s]*\/[\s]*a[\s]*>/";

    $result = preg_replace($pattern, $replacement, $text);
    echo htmlentities($result);
}
?>



