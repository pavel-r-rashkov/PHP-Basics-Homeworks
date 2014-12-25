<html>
<head>
    <title>Car randomizer</title>
    <style>
        table, td, th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="" method="GET">
        <label for="cars"></label>
        <input type="text" id="cars" name="cars"/>
        <input type="submit" value="Show result"/>
    </form>
    <?php
    if(isset($_GET["cars"])) {
        $cars = explode(", ", $_GET["cars"]);
        $colors = ["pink", "red", "black", "blue", "yellow"];
        echo "<table><thead><tr><th>Car</th><th>Color</th><th>Count</th></tr></thead><tbody>";

        foreach($cars as $car) {
            $color = $colors[mt_rand(0, 4)];
            $count = mt_rand(1, 5);

            echo "<tr><td>" . htmlentities($car) . "</td><td>$color</td><td>$count</td></tr>";
        }

        echo "</tbody></table>";
    }
    ?>
</body>
</html>