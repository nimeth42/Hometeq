<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login_validation.php" method="GET">
        <fieldset>
            <legend>Login info</legend>
            <label>Username: </label>
            <input type="text" name="username"></br>
            </br>
            <label>Password: </label>
            <input type="text" name="password"></br>
            </br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
        </fieldset>
    </form>
    <a href="login_validation.php?sample=this_is_sample_text">Click here</a>
</body>
</html>