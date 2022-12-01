<?php
require "db.php";

$data = $_POST;
$showError = False;

if (isset($data['signip'])){
    $errors = array();
    $showError = True;

    if (trim($data['email']) == ''){
        $errors[] = 'Укажите Email...';
    }
    if (trim($data['password']) == ''){
        $errors[] = 'Укажите пароль...';
    }

    $user = R::findOne('users','email = ?', array($data['email']));
    if ($user){
        if (password_verify($data['password'], $user->password)){
            $_SESSION['user'] = $user;
        }else{
            $errors[] = 'Неверный пароль';
        }
    }else{
        $errors[] = 'Пользователь не найден';
    }
}
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="singup.css">
    <link rel="stylesheet" href="../css/student.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="header">
    <div class="container">

        <div class="main__navigation-container">
            <img src="images/logo.png" alt="" class="main__navigation-logo">
            <div class="main__navigation-items">
                <a href="../index.php" class="main__navigation-item">Главная</a>
                <a href="../student.php" class="main__navigation-item">Студенты</a>
                <a href="../professor.php" class="main__navigation-item">Преподаватели</a>
                <a href="../events.php" class="main__navigation-item">Мероприятия</a>
            </div>

            <div class="main__navigation-btn">
                <?php if ($user): ?>

                    <div class="container_id">
                        <div class="firstNameId-container">
                            <a href="#"><img class="profile_img" src="../images/profile.png" alt="profile"></a>
                            <p class="firstName_id"> <?php echo $user->firstName;?></p>
                        </div>
                        <a class="logout_exit" href="logout.php">Выйти</a>
                    </div>

                <?php else: ?>
                    <a class="btn-register" href="signup.php">Регистрация </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</header>


<div class="body_2" id="body">
    <div class="">
        <form action="signip.php" method="post">
            <div class="title__register">Войти</div>
            <a href="signup.php" class="link-login">Ещё не зарегистрированы? <span></span></a>

            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Пароль" />
            <button type="submit" name="signip" id="btnHome" style="margin-bottom: 30px">Войти</button>
            <p class="errors"> <?php if ($showError) {echo showError($errors);} ?> </p>
        </form>
    </div>
</div>

<script src="js/singup.js"></script>
</body>
</html>


