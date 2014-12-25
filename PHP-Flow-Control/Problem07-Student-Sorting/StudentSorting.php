<!DOCTYPE html>
<html>
<head>
    <title>Student sorting</title>
</head>
<body>
    <form action="" method="POST">
        <fieldset id="students">
            <div>

            </div>
            <div id="studentBox1">
                <input type="text" name="firstName[]"/><!--
                --><input type="text" name="lastName[]"/><!--
                --><input type="email" name="email[]"/><!--
                --><input type="number" name="score[]"/><!--
                --><input type="button" value="-" onclick="removeStudent('studentBox1')"/>
            </div>
            <div id="studentBox2">
                <input type="text" name="firstName[]"/><!--
                --><input type="text" name="lastName[]"/><!--
                --><input type="email" name="email[]"/><!--
                --><input type="number" name="score[]"/><!--
                --><input type="button" value="-" onclick="removeStudent('studentBox2')"/>
            </div>
            <div id="studentBox3">
                <input type="text" name="firstName[]"/><!--
                --><input type="text" name="lastName[]"/><!--
                --><input type="email" name="email[]"/><!--
                --><input type="number" name="score[]"/><!--
                --><input type="button" value="-" onclick="removeStudent('studentBox3')"/>
            </div>
        </fieldset>
        <input type="button" value="+" onclick="addStudent()"/>
        <select name="sortType">
            <option value="firstName">First name</option>
            <option value="lastName">Last name</option>
            <option value="email">Email</option>
            <option value="examScore">Exam score</option>
        </select>
        <select name="order">
            <option value="ascending">Ascending</option>
            <option value="descending">Descending</option>
        </select>
        <input type="submit" value="SUBMIT">
    </form>

    <?php
    if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
        $students = [];
        $sortType = $_POST["sortType"];
        $order = $_POST["order"];

        $len = count($_POST["firstName"]);
        for($i = 0 ; $i < $len ; $i++) {
            $student = array('firstName' => $_POST["firstName"][$i], 'lastName' => $_POST["lastName"][$i],
                'email' => $_POST["email"][$i], 'examScore' => $_POST["score"][$i]);
            array_push($students, $student);
        }

        usort($students, function($a, $b) use($sortType, $order) {
            $result = $a["$sortType"] > $b["$sortType"];

            return $order == "ascending" ? $result : !$result;
        });

        echo "<table><thead><tr><th>First name</th><th>Last name</th><th>Email</th><th>Exam score</th></tr></thead><tbody>";
        $scoreSum = 0;

        foreach($students as $std) {
            echo "<tr><td>" . htmlentities($std["firstName"]) . "</td><td>" . htmlentities($std["lastName"]) . "</td><td>"
                . htmlentities($std["email"]) . "</td><td>" . htmlentities($std["examScore"]) . "</td></tr>";
            $scoreSum += $std["examScore"];
        }
        echo "<tr><td>Average Score:</td><td>" . round(htmlentities($scoreSum) / count($students), 0) . "</td></tr></tbody></table>";
    }
    ?>

    <script>
        var lastStudentID = 2;

        function addStudent() {
            lastStudentID++;
            var studentsBox = document.getElementById('students');
            var student = document.createElement('div');
            student.id = 'studentBox' + lastStudentID;

            var firstName = document.createElement('input');
            firstName.name = 'firstName[]';
            var lastName = document.createElement('input');
            lastName.name = 'lastName[]';
            var email = document.createElement('input');
            email.name = 'email[]';
            email.type = 'email';
            var score = document.createElement('input');
            score.name = 'score[]';
            score.type = 'number';
            var remove = document.createElement('input');
            remove.type = 'button';
            remove.value = '-';
            remove.onclick = function() { removeStudent(student.id); };

            student.appendChild(firstName);
            student.appendChild(lastName);
            student.appendChild(email);
            student.appendChild(score);
            student.appendChild(remove);

            studentsBox.appendChild(student);
        }

        function removeStudent(studentID) {
            var student = document.getElementById(studentID);
            student.parentElement.removeChild(student);
        }

    </script>
</body>
</html>