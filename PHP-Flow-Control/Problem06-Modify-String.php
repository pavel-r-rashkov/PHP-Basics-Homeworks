<html>
<head>
    <title>Modify string</title>
</head>
<body>
    <form action="" method="GET">
        <label>Input string: </label>
        <input type="text" name="inputString"/>
        <input type="radio" name="choice" id="palindrome" value="palindrome"/>
        <label for="palindrome">Check Palindrome</label>
        <input type="radio" name="choice" id="reverse" value="reverse"/>
        <label for="reverse">Reverse String</label>
        <input type="radio" name="choice" id="split" value="split"/>
        <label for="split">Split</label>
        <input type="radio" name="choice" id="hash" value="hash"/>
        <label for="hash">Hash String</label>
        <input type="radio" name="choice" id="shuffle" value="shuffle"/>
        <label for="shuffle">Shuffle String</label>
        <input type="submit" value="Submit"/>
    </form>
    <?php
    if(isset($_GET["choice"])) {
        $choice = $_GET["choice"];
        $action;

        switch($choice) {
            case "palindrome":
                $action = 'checkPalindrome'; break;
            case "reverse":
                $action = 'strrev'; break;
            case "split":
                $action = 'splitString'; break;
            case "hash":
                $action = 'hashString'; break;
            case "shuffle":
                $action = 'shuffleString'; break;
        }

        echo $action($_GET["inputString"]);
    }

    function checkPalindrome($string) {
        $string = $string == strrev($string) ? $string . " is palindrome!" : $string . " is not a palindrome!";
        return $string;
    }

    function splitString($string) {
        $chars = str_split($string);
        return join(" ", $chars);
    }

    function hashString($string) {
        return crypt($string);
    }

    function shuffleString($string) {
        $chars = str_split($string);
        shuffle($chars);
        return join("", $chars);
    }
    ?>
</body>
</html>