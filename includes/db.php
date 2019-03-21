<?php

$connection = mysqli_connect('fb7915xs.beget.tech','fb7915xs_eskin','x8oR%rMJ','fb7915xs_eskin'); 

if ($connection == false){
    echo 'Не удалось подключиться к БД<br>'; 
    echo mysqli_connect_error(); 
    exit();
}

?>