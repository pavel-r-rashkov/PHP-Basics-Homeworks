<html>
<head>
    <title>Most frequent tag</title>
</head>
<body>
    <form action="" method="POST">
        <label>Enter Amount</label>
        <input type="text" name="amount"><br />
        <input type="radio" name="currency" value="$" id="usd"><label for="usd">USD</label>
        <input type="radio" name="currency" value="&#128;" id="eur"><label for="eur">EUR</label>
        <input type="radio" name="currency" value="BGN" id="bgn"><label for="bgn">BGN</label><br />
        <label>Compound Interest Amount</label>
        <input type="text" name="interest"><br />
        <select name="period">
            <option value="0.5">6 months</option>
            <option value="1">1 year</option>
            <option value="2">2 years</option>
            <option value="5">5 years</option>
        </select>
        <input type="submit" value="Calculate">
    </form>
</body>
</html>

<?php
if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    $validate = true;

    $amount = filter_var( $_POST["amount"], FILTER_VALIDATE_FLOAT );
    $validate = $validate && $amount != "" && $amount >= 0;

    $currency = $_POST["currency"];
    $validate = $validate && $currency != "";

    $interest = filter_var( $_POST["interest"], FILTER_VALIDATE_FLOAT );
    $validate = $validate && $interest != "" && $interest >= 0;

    $period = $_POST["period"];

    if( $validate ) {
        $result = $amount * ( pow( 1 + ( $interest / 100 / 12 ), 12 * $period ) );
        echo "$currency ", round( $result, 2 );
    }
}
?>