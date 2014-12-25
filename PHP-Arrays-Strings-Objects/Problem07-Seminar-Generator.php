<!DOCTYPE html>
<html>
<head>
    <title>Text filter</title>
    <style>

        .popupBox {
            display: none;
            width: 200px;
            border: 1px solid black;
            position: absolute;
            background: darkgrey;
            font-size: 12px;
        }

        .popupHeading {
            text-decoration: underline;
            font-weight: bold;
        }

        .name:hover div {
            display: block;
        }
    </style>
</head>
<body>
    <form action="" method="POST">
        <textarea name="text"></textarea><br />
        <select name="sortType">
            <option value="name">Name</option>
            <option value="date">Date</option>
        </select>
        <select name="orderType">
            <option value="ascending">Ascending</option>
            <option value="descending">Descending</option>
        </select>
        <input type="submit" value="Submit"/>
    </form>

    <?php
    if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
        $sortType = $_POST["sortType"];
        $orderType = $_POST["orderType"];
        $lines = explode("\n", $_POST["text"]);
        $pattern = "/([\s\S]+?)\-([\s\S]+?)\-(\d{2}\-\d{2}\-\d{4}[\s]\d{2}\:\d{2})([\s\S]+)/";
        $seminars = [];

        foreach($lines as $line) {
            preg_match($pattern, $line, $matches);
            $date = new DateTime($matches[3]);
            $seminar = array("name" => $matches[1], "author" => $matches[2], "date" => $date, "description" => $matches[4]);
            array_push($seminars, $seminar);
        }

        usort($seminars, function($a, $b) use($sortType, $orderType) {
            $result = $a[$sortType] > $b[$sortType];
            return $orderType == "ascending" ? $result : !$result;
        });

        echo "<table id='seminars'><thead><tr><th>Seminar name</th><th>Date</th><th>Participate</th></tr></thead><tbody>";

        foreach($seminars as $seminar) {
            echo "<tr><td><span class='name'>" . $seminar["name"] . "<div class='popupBox'><span class='popupHeading'>Lecturer: </span>" .
                $seminar["author"] . "<br /><span class='popupHeading'>Details: </span>" . $seminar["description"] . "</div></span></td>",
                "<td>" . $seminar["date"]->format("d-m-Y H:i") . "</td>";
            echo "<td><button>SIGN UP</button></td></tr>";
        }

        echo "</tbody></table>";
    }
    ?>

    <script>
        var seminars = document.getElementById('seminars');
        seminars.onmousemove = function(event) {
            var element = event.target;
            var box = element.getElementsByClassName('popupBox')[0];
            if(box) {
                box.style.top = event.clientY + 10 + 'px';
                box.style.left = event.clientX + 10 + 'px';
            }
        };
    </script>
</body>
</html>



