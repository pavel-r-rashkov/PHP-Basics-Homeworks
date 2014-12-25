<?php
if(isset($_GET["continent"])) {
    $continent = $_GET["continent"];
}

$_COOKIE["continent"] = $_GET["continent"];
?>

<html>
<head>
    <title>Combo box</title>
</head>
<body>
    <form action="" method="GET">
        <input type="text" list="continentsList" value="<?php echo htmlentities($_COOKIE['continent'])?>" name="continent" onchange="this.form.submit()">
        <datalist id="continentsList">
            <option value="Europe">Europe</option>
            <option value="North America">North America</option>
            <option value="South America">South America</option>
            <option value="Africa">Africa</option>
            <option value="Asia">Asia</option>
            <option value="Australia">Australia</option>
        </datalist>
    </form>
    <input type="text" list="countriesList" id="country" name="countries">
    <datalist id="countriesList">
        <?php
        switch($continent) {
            case "Europe":
                echo "<option value='Germany'>";
                echo "<option value='Spain'>"; break;
            case "North America":
                echo "<option value='USA'>";
                echo "<option value='Canada'>"; break;
            case "South America":
                echo "<option value='Brazil'>";
                echo "<option value='Argentina'>";break;
            case "Africa":
                echo "<option value='Nigeria'>";
                echo "<option value='Cameroon'>";break;
            case "Australia":
                echo "<option value='Australia'>"; break;
            case "Asia":
                echo "<option value='China'>";
                echo "<option value='Japan'>";break;
        }
        ?>
    </datalist>
</body>
</html>