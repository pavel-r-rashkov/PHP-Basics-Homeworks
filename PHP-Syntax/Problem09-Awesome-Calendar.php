<html>
    <head>
        <title>Awesome Calendar</title>
        <style>

            h1 {
                text-align: center;
                font-size: 40px;
            }

            table {
                float: left;
                border-spacing: 0;
                margin-right: 10px;
            }

            td {
                text-align: right;
                width: 40px;
                height: 40px;
            }
            
            th {
                text-align: center;
                width: 40px;
                height: 40px;
            }

            thead th {
                border-bottom: 1px solid black;
            }

            tr>th:nth-child(7), tr>td:nth-child(7) {
                color: red;
            }

        </style>
    </head>
    <body>
        <form method="GET" action="">
            <input type="number" name="year">
        </form>
        <?php

        if(isset($_GET["year"])) {
            $year = $_GET["year"];

            echo "<h1>$year</h1>";

            for ($month = 1; $month <= 12; $month++) {

                echo "<table>";
                $maxDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                $date = date_create("$year-$month-1");
                $firstDay = $date->format("w");
                $days = [];
                echo "<thead><tr><th>", $date->format("M"), "</th></tr>";
                echo "<tr><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr></thead><tbody>";

                for ($i = 0; $i < $firstDay - 1; $i++) {
                    array_push($days, "");
                }

                for ($d = 1; $d <= $maxDays; $d++) {
                    array_push($days, $d);
                }

                for ($week = 0; $week < 6; $week++) {
                    echo "<tr>";
                    for ($day = 0; $day < 7; $day++) {
                        echo "<td>", $days[$week * 7 + $day], "</td>";
                    }
                    echo "</tr>";
                }

                echo "</tbody></table>";
            }
        }
        ?>
    </body>
</html>