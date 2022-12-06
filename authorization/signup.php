<?php
require "db.php";
$data = $_POST;
$showError = False;

$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));

if (isset($data['singup'])){
    $errors = array();
    $showError = True;

    if (trim($data['firstName']) == ''){
        $errors[] = 'Вы не указали имя...';
    }
    if (trim($data['lastName']) == ''){
        $errors[] = 'Вы не указали фамилию...';
    }
    if (trim($data['email']) == ''){
        $errors[] = 'Укажите Email...';
    }
    if (trim($data['password']) == ''){
        $errors[] = 'Укажите пароль...';
    }
    if (trim($data['password']) != trim($data['password_2'])){
        $errors[] = 'Пароли не совпадают';
    }

    if (R::count('users', 'email = ?', array($data['email'])) > 0){
        $errors[] = 'Такой email уже существует!';
    }

    if (empty($errors)){
        $user = R::dispense('users');
        $user->firstName = $data['firstName'];
        $user->lastName = $data['lastName'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $user->avatar = 'avatardefoult.png';
        R::store($user);
    }
}
?>

<!doctype html>
<html lang="en">
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
                            <a href="authorization/profile.php"><img class="profile_img" src="../images/profile.png" alt="profile"></a>
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
        <form action="signup.php" method="post">
            <div class="title__register">Создать аккаунт</div>
            <a href="signip.php" class="link-login">Уже зарегистрированы? <span>Войдите</span></a>

            <input type="text" name="firstName" placeholder="Имя" />
            <input type="text" name="lastName" placeholder="Фамилия" />
            <input type="email" name="email" placeholder="Email" />
            <input type="password" name="password" placeholder="Пароль" />
            <input type="password" name="password_2" placeholder="Подтвердите пароль" />
            <button type="submit" name="singup" style="margin-bottom: 30px;">Зарегистрироваться</button>

            <p class="errors"> <?php if ($showError) {echo showError($errors);} ?> </p>
        </form>
    </div>
</div>

<script src="js/singup.js"></script>
</body>
</html>