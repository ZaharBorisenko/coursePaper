<?php
//$host = 'localhost';  // Хост, у нас все локально
//$user = 'root';    // Имя созданного вами пользователя
//$pass = ''; // Установленный вами пароль пользователю
//$db_name = 'IT-CLUB';   // Имя базы данных
//$link = mysqli_connect($host, $user, $pass, $db_name); // Соединяемся с базой
//// Ругаемся, если соединение установить не удалось
//if (!$link) {
//    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
//    exit;
//}
//
//$result = mysqli_query($link, "SELECT * FROM `teachers`");
//
//?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/student.css">
</head>
<body>
<?php
include 'navbar.php';
?>

<section class="content__students">
    <div class="container">
        <div class="student__title">Преподаватели</div>
        <div class="student__item">


<!---->
<!---->
<!--            --><?php
//            while ($teachers = mysqli_fetch_assoc($result)){
//                ?>
<!--                <div class="student__items">-->
<!--                    <img src="images/avatar.png" alt="" class="student__avatar">-->
<!--                    <div class="student__fullName"> --><?php //echo $teachers['first name']?><!-- --><?php //echo $teachers['last name']?><!-- </div>-->
<!--                    <div class="student__group">--><?php //echo $teachers['email']?><!--</div>-->
<!--                    <a href="" class="student__btn">Подробнее</a>-->
<!--                </div>-->
<!--                --><?php
//            }
//            ?>




            <div class="student__items">
                <img src="images/avatar.png" alt="" class="student__avatar">
                <div class="student__fullName">Дмитрий Иванов</div>
                <div class="student__profession">Frontend-developer</div>
                <a href="" class="student__btn">Подробнее</a>
            </div>

            <div class="student__items">
                <img src="images/avatar.png" alt="" class="student__avatar">
                <div class="student__fullName">Дмитрий Иванов</div>
                <div class="student__profession">Frontend-developer</div>
                <a href="" class="student__btn">Подробнее</a>
            </div>

            <div class="student__items">
                <img src="images/avatar.png" alt="" class="student__avatar">
                <div class="student__fullName">Дмитрий Иванов</div>
                <div class="student__profession">Frontend-developer</div>
                <a href="" class="student__btn">Подробнее</a>
            </div>
        </div>
    </div>
</section>
</body>
</html>