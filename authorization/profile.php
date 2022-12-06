<?php

require 'db.php';

$user = R::findOne('users', 'id = ?', array($_SESSION['user']->id));
//?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="../css/student.css">
    <link rel="stylesheet" href="profile.css">
</head>
<body style="background: none">

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
                    <a class="btn-register" href="authorization/signup.php">Регистрация </a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</header>

<section class="profile__content">

    <img class="profile-content-img" src="../uploads/avatars/<?php echo $user->avatar; ?>" alt="">

<!--    <form action="profile.php" method="post" enctype="multipart/form-data">-->
<!--        <input type="file" name="avatar">-->
<!--        <button type="submit" name="set_avatar">Обновить аватарку</button>-->
<!--    </form>-->

    <p>Ваше имя:<?php echo $user->firstName;?></p>
    <p>Ваша фамилия:<?php echo $user->lastName;?></p>
    <p>Ваш email:<?php echo $user->email;?></p>

</section>


<script src="js/profile.js"></script>
</body>
</html>