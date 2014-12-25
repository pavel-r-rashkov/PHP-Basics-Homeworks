<html>
<head>
    <title>Primes</title>
</head>
<body>
    <form action="" method="GET">
        <label>Starting Index: </label>
        <input type="number" name="start"/>
        <label>End: </label>
        <input type="number" name="end"/>
        <input type="submit" value="Submit"/>
    </form>
    <?php
    if(isset($_GET["start"]) && isset($_GET["end"])) {
        if($_GET["start"] <= 1 || $_GET["end"] <= 1) {
            die("numbers can't be less than 2!");
        }

        for($i = $_GET["start"] ; $i <= $_GET["end"] ; $i++) {
            echo isPrime($i) ? "<strong>$i</strong>" : "$i";
            echo $_GET["end"] == $i ? "" : ", ";
        }
    }
    ?>
</body>
</html>

<?php
function isPrime($num)
{
    if($num == 2) {
        return true;
    }
    $divider = 2;
    $maxDivider = sqrt($num);

    while($divider <= $maxDivider) {
        if($num % $divider == 0) {
            return false;
        }
        $divider++;
    }
    return true;
}
?>