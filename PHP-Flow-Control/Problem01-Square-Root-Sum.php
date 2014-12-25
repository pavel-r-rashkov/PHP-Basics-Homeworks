<html>
<head>
    <title>Square root</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<table>
    <thead>
        <tr><th>Number</th><th>Square</th></tr>
    </thead>
    <tbody>
    <?php
    $total = 0;
    for($i = 0 ; $i <= 100 ; $i += 2) {
        $squared = round(sqrt($i), 2);
        echo "<tr><td>$i</td><td>" . $squared . "</td></tr>";
        $total += $squared;
    }
    ?>
    </tbody>
    <tfoot>
        <tr><th>Total:</th><td><?php echo round($total, 2) ?></td></tr>
    </tfoot>
</table>
</body>
</html>