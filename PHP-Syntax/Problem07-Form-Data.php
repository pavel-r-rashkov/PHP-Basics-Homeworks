<html>
    <head>
        <title>Form Data</title>
    </head>
    <body>
        <form action="" method="GET">
            <input type="text" name="name"><br>
            <input type="number" name="age"><br>
            <input type="radio" name="gender" id="male" value="male"><label for="male">Male</label><br>
            <input type="radio" name="gender" id="female" value="female"><label for="female">Female</label><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>

<?php if(!empty($_GET["name"]) && !empty($_GET["gender"]) && !empty($_GET["age"]) && $_GET["age"] > 0): ?>
    <p>My name is <?php echo htmlentities($_GET["name"]) ?> I am <?php echo htmlentities($_GET["age"])?>
        years old. I am <?php echo htmlentities($_GET["gender"]) ?></p>
<?php endif ?>



