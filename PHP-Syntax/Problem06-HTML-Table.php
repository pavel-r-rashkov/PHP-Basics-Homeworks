<?php
$name = "Gosho";
$phone = "0882-321-423";
$age = 24;
$address = "Hadji Dimitar";
?>

<html>
    <head>
        <title>Person info</title>
        <style>
            table {
                border-spacing: 0;
                border: 5px double black;
            }

            td, th {
                width: 150px;
                border: 1px solid black;
            }

            th {
                background: #FF6600;
                text-align: left;
            }

            td {
                text-align: right;
            }


        </style>
    </head>
    <body>
        <table>
            <tr><th>Name</th><td><?php echo $name ?></td></tr>
            <tr><th>Phone number</th><td><?php echo $phone ?></td></tr>
            <tr><th>Age</th><td><?php echo $age ?></td></tr>
            <tr><th>Address</th><td><?php echo $address ?></td></tr>
        </table>
    </body>
</html>