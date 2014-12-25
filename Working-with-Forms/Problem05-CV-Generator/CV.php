<?php
if( $_SERVER['REQUEST_METHOD'] == "POST" ) {
    $validate = true;

    if(preg_match("/[^a-zA-Z]/", $_POST["firstName"]) || strlen($_POST["firstName"]) < 2 || strlen($_POST["firstName"]) > 20) {
        echo "Incorrect first name !" . "<br />";
        $validate = false;
    }

    if(preg_match("/[^a-zA-Z]/", $_POST["lastName"]) || strlen($_POST["lastName"]) < 2 || strlen($_POST["lastName"]) > 20) {
        echo "Incorrect last name !" . "<br />";
        $validate = false;
    }

    $languages = $_POST["language"];
    foreach($languages as $language) {
        if(preg_match("/[^a-zA-Z]/", $language) || strlen($language) < 2 || strlen($language) > 20) {
            echo "Incorrect language !" . "<br />";
            $validate = false;
        }
    }

    if(preg_match("/[^a-zA-Z\d]/", $_POST["company"]) || strlen($_POST["company"]) < 2 || strlen($_POST["company"]) > 20) {
        echo "Incorrect company name !" . "<br />";
        $validate = false;
    }

    if(preg_match("/[^\d\-\+\s]/", $_POST["phone"])) {
        echo "Incorrect phone number !" . "<br />";
        $validate = false;
    }

    if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) || preg_match_all("/\./", $_POST["email"]) > 1) {
        echo "Incorrect email";
        $validate = false;
    }
}
?>

<html>
<head>
    <title>CV</title>
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <?php if($validate): ?>
        <table>
            <thead>
                <tr>
                    <th colspan="2">Personal Information</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>First Name</td>
                    <td><?php echo htmlentities($_POST["firstName"]) ?></td>
                </tr>
                <tr>
                    <td>Last Name</td>
                    <td><?php echo htmlentities($_POST["lastName"]) ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo htmlentities($_POST["email"]) ?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?php echo htmlentities($_POST["phone"]) ?></td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td><?php echo htmlentities($_POST["gender"]) ?></td>
                </tr>
                <tr>
                    <td>Birth Date</td>
                    <td><?php echo htmlentities($_POST["birthDay"]) ?></td>
                </tr>
                <tr>
                    <td>Nationality</td>
                    <td><?php echo htmlentities($_POST["nationality"]) ?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <table>
            <thead>
                <tr>
                    <th colspan="2">Last Work Position</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Company Name</td>
                    <td><?php echo htmlentities($_POST["company"]) ?></td>
                </tr>
                <tr>
                    <td>From</td>
                    <td><?php echo htmlentities($_POST["dateFrom"]) ?></td>
                </tr>
                <tr>
                    <td>To</td>
                    <td><?php echo htmlentities($_POST["dateTo"]) ?></td>
                </tr>
            </tbody>
        </table>
        <br />
        <table>
            <thead>
                <tr>
                    <th colspan="2">Computer Skills</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Programming Languages</td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>Language</th><th>Skill Level</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $len = count($_POST["compLanguage"]);
                                for($i = 0 ; $i < $len; $i++) {
                                    echo "<tr><td>" . htmlentities($_POST["compLanguage"][$i]) . "</td>
                                    <td>" . htmlentities($_POST["level"][$i]) . "</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
        <br />
        <table>
            <thead>
                <tr>
                    <th colspan="2">Other Skills</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Languages</td>
                    <td>
                        <table>
                            <thead>
                                <tr>
                                    <th>Language</th><th>Comprehension</th><th>Reading</th><th>Writing</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $len = count($_POST["language"]);
                            for($i = 0 ; $i < $len; $i++) {
                                echo "<tr><td>" . htmlentities($_POST["language"][$i]) . "</td>
                                    <td>" . htmlentities($_POST["comprehension"][$i]) . "</td>
                                    <td>" . htmlentities($_POST["reading"][$i]) . "</td>
                                    <td>" . htmlentities($_POST["writing"][$i]) . "</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>Driver's License</td>
                    <td>
                        <?php
                        echo htmlentities($_POST["driverLicenseA"]), " ";
                        echo htmlentities($_POST["driverLicenseB"]), " ";
                        echo htmlentities($_POST["driverLicenseC"]);
                        ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif ?>
</body>
</html>