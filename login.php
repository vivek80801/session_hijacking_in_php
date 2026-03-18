<?php include_once __DIR__ . "/include/db.php" ?>
<?php
    $errors = [];
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $username = htmlspecialchars($_POST["username"]);
        $password = htmlspecialchars($_POST["password"]);

        $select_user_statement = $pdo->prepare("SELECT * FROM users WHERE name=:name");
        $select_user_statement->bindValue(":name", $username);
        $select_user_statement->execute();

        $user = $select_user_statement->fetch( PDO::ERRMODE_EXCEPTION, PDO::FETCH_ASSOC);
        if($user)
        {
            if($user["password"] === $password)
            {
                session_start();
                $_SESSION["username"] = $user["name"];
                $_SESSION["email"] = $user["email"];

                header("location: ./dashboard.php");
            }else {
                array_push($errors, "wrong credentials");
            }
        }
    }
?>
    
<?php require_once __DIR__ . "/include/header.php" ?>
<?php require_once __DIR__ . "/include/nav.php" ?>

<form action="./login.php" method="post">
    <h1>Login</h1>
    <?php if(!empty($errors) ):?>
        <?php foreach($errors as $error):?>
            <span style="
                background-color: red;
                color: white;
                padding: 0.7rem;
            ">
                <?= $error ?>
            </span></br></br>
        <?php endforeach ?>
    <?php endif ?>
    <input type="text" placeholder="enter your username" name="username" required/>
    <input type="password" placeholder="enter your password" name="password" required/>
    <button type="submit">Login</button>
</form>
<?php require_once __DIR__ . "/include/header.php" ?>
