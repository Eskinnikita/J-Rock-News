
<?php

$connection = mysqli_connect('fb7915xs.beget.tech','fb7915xs_eskin','x8oR%rMJ','fb7915xs_eskin'); 

if ($connection == false){
    echo 'Не удалось подключиться к БД<br>'; 
    echo mysqli_connect_error(); 
    exit();
}

?>
<?php
session_start();
if ($_POST['enter']){
    $log = $_POST['login']; 
    $pass = $_POST['password']; 
    $result = mysqli_query($connection,  "SELECT * FROM `admin` WHERE `login`='$log' and `password` = '$pass'"); 
  
    if(mysqli_num_rows($result)==1){
        header('location: news_add.php'); 
    }
    else{
        $wrong_data  = "Ошибка авторизации"; 
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация администратора</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#77a4a5">
    <title>Авторизация администратора</title>
    <link rel="stylesheet" href="/css/admin.css">
    <link rel="shortcut icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <div class="project_title">
           <a href="../index.php">
            <span class="title">Nonsense Ongaku</span> <br>
            <span class="sub_title"> новости из мира j-rock</span> <br>
            </a>
        </div>
        <div class="auth_form">
        <form method="POST">
               <h3><?php echo $wrong_data;   ?></h3>
                <input class="login input_name" type="text" name="login" placeholder="Логин"> <br>
                <input class="login input_password" type="password" name="password" placeholder="Пароль"> <br>
               
                <input class="btn" name="enter" type="submit" value="Войти">
            </form>

        </div>
    </div>
</body>
</html>