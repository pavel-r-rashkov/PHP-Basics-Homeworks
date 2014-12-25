<?php
$tags = ['!DOCTYPE', 'a', 'abbr', 'address', 'area', 'article', 'aside', 'audio', 'b', 'base', 'bdi', 'bdo', 'blockquote',
    'body', 'br', 'button', 'canvas', 'caption', 'cite', 'code', 'col', 'colgroup', 'command', 'datalist', 'dd',
    'del', 'details', 'dfn', 'div', 'dl', 'dt', 'em', 'embed', 'fieldset', 'figcaption', 'figure', 'footer', 'form', 'head',
    'header', 'hgroup', 'hr', 'html', 'i', 'iframe', 'img', 'input', 'ins', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
session_start();

if( isset($_GET["tag"]) ) {

    $correct = in_array( $_GET["tag"], $tags );
    $_SESSION["counter"] = isset( $_SESSION["counter"] ) ? $_SESSION["counter"] : 0;
    $_SESSION["counter"] = $correct ? $_SESSION["counter"] + 1 : $_SESSION["counter"];
    $_SESSION['tag'] = $_GET["tag"];
}

?>

<html>
<head>
    <title>Tag counter</title>
</head>
<body>
<form action="" method="GET">
    <label>Enter HTML tags:</label><br />
    <input type="text" name="tag" value="<?php echo $_SESSION['tag'];?>">
    <input type="submit" value="Submit">
</form>
<?php
if( isset($_GET["tag"]) ) {
    echo $correct ? "Valid HTML tag! " : "Invalid HTML tag! ";
    echo "Score: ", $_SESSION["counter"];
}
?>
</body>
</html>




