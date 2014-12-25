<html>
<head>
    <title>Expenses</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <form action="" method="GET">
        <label>Enter number of years:</label>
        <input type="number" name="year"/>
        <input type="submit" value="Show costs"/>
    </form>
    <?php
    if(isset($_GET["year"])) {
        $years = filter_var($_GET["year"], FILTER_VALIDATE_INT);
        $startYear = getdate()["year"];
        echo "<table><thead><tr><th>Year</th><th>January</th><th>February</th><th>March</th><th>April</th>
        <th>May</th><th>June</th><th>July</th><th>August</th><th>September</th><th>Octomber</th><th>November</th><th>December</th><th>Total</th></tr></thead><tbody>";

        for($year = $startYear ; $year > $startYear - $years ; $year--) {
            echo "<tr><td>$year</td>";
            $total = 0;
            for($month = 0 ; $month < 12 ; $month++) {
                $expense = mt_rand(0, 999);
                $total += $expense;
                echo "<td>$expense</td>";
            }
            echo "<td>$total</td>", "</tr>";
        }

        echo "</tbody></table>";
    }
    ?>
</body>
</html>