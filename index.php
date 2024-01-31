<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Log In</h1>
    <form action="index.php" method="post">
        <input type="text" name="text" /><br>
        <input type="password" name="password" /><br>
        <br>
        <input type="submit" value="Log In" />
    </form>
</body>

</html>
<?php
echo "Bienvenido {$_POST["text"]}";
?>
<p>fin</p>