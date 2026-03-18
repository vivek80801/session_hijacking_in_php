<?php require_once __DIR__ . "/include/db.php" ?>
<?php
    $errors = [];
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        if(strlen($username) < 3)
        {
            array_push($errors, "username is very small");
        }
        if (strlen($username) > 20)
        {
            array_push($errors, "username is very big");
        }
        if(strlen($password) < 3)
        {
            array_push($errors, "password is very small");
        }
        if (strlen($password) > 20)
        {
            array_push($errors, "password is very big");
        }
        if(empty($errors))
        {
            $insert_user_statement = $pdo->prepare("INSERT INTO users (name, password, email) VALUES (:name, :password, :email)");
            $insert_user_statement->bindValue(":name", $username);
            $insert_user_statement->bindValue(":password", $password);
            $insert_user_statement->bindValue(":email", $username . "@gmail.com");
            $insert_user_statement->execute();

            header("location: ./login.php");
        }
    }
?>
<?php include_once __DIR__ . "/include/header.php" ?>
<?php include_once __DIR__ . "/include/nav.php" ?>
<form action="./register.php" method="post">
    <h1>Register</h1>
    <?php if(!empty($errors) ):?>
        <?php foreach($errors as $error):?>
            <span style="background-color: red; color: white; padding: 0.7rem;"><?= $error ?></span></br></br>
        <?php endforeach ?>
    <?php endif ?>
    <input type="text" placeholder="enter your username" name="username" required/>
    <input type="password" placeholder="enter your password" name="password" required/>
    <button type="submit">Register</button>
</form>
<?php include_once __DIR__ . "/include/footer.php" ?>
