<!DOCTYPE html>
<html>
<head>
    <title>Word Mapping</title>
</head>
<body>
    <form action="" method="GET">
        <textarea name="text"></textarea><br />
        <input type="submit" value="Count words"/>
    </form>
    <?php
    if(isset($_GET["text"])) {
        $words = preg_split("/[\W]/", $_GET["text"]);
        $words = array_filter($words);
        $frequencies = [];

        foreach ($words as $word) {
            if (array_key_exists(strtolower($word), $frequencies)) {
                $frequencies[strtolower($word)]++;
            } else {
                $frequencies[strtolower($word)] = 1;
            }
        }
        arsort($frequencies);

        echo "<table><tbody>";

        foreach($frequencies as $key => $value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
        }
    }
    ?>
</body>
</html>