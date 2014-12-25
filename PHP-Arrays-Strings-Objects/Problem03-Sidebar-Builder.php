<!DOCTYPE html>
<html>
<head>
    <title>Word Mapping</title>
    <style>
        aside {
            border: 1px solid black;
            background: dodgerblue;
            float: right;
            width: 170px;
            border-radius: 20px;
        }

        h2 {
            border-bottom: 1px solid black;
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <label for="categories">Categories:</label>
        <input type="text" id="categories" name="categories"><br />
        <label for="tags">Tags:</label>
        <input type="text" id="tags" name="tags"><br />
        <label for="months">Months:</label>
        <input type="text" id="months" name="months"><br />
        <input type="submit" value="Generate"/>
    </form>
</body>
</html>

<?php

if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $categories = explode(", ", $_POST["categories"]);
    $tags = explode(", ", $_POST["tags"]);
    $months = explode(", ", $_POST["months"]);

    generateAside("Categories", $categories);
    generateAside("Tags", $tags);
    generateAside("Months", $months);
}

function generateAside($heading, $items) {
    echo "<aside><h2>$heading</h2><ul>";

    foreach($items as $item) {
        echo "<li>" . htmlentities($item) . "</li>";
    }
    echo "</ul></aside>";
}
?>