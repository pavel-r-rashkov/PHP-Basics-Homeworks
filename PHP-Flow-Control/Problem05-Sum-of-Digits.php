<html>
<head>
    <title>Sum of digits</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="" method="GET">
        <label>Input string: </label>
        <input type="text" name="inputString"/>
        <input type="submit" value="Submit"/>
    </form>
    <?php
    function calculateDigitSum($num) {
        $total = 0;

        while($num != 0) {
            $total += $num % 10;
            $num /= 10;
        }
        return $total;
    }

    if(isset($_GET["inputString"])) {
        $numbers = explode(", ", $_GET["inputString"]);
        echo "<table><tbody>";

        foreach($numbers as $number) {
            echo "<tr><td>$number</td><td>";
            echo filter_var($number, FILTER_VALIDATE_INT) ? calculateDigitSum($number): "I cannot sum that", "</td></tr>";
        }
        echo "</tbody></table>";
    }
    ?>
</body>
</html>