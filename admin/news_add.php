<?php


$connection = mysqli_connect('fb7915xs.beget.tech','fb7915xs_eskin','x8oR%rMJ','fb7915xs_eskin'); 

if ($connection == false){
    echo 'Не удалось подключиться к БД<br>'; 
    echo mysqli_connect_error(); 
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Добавление новости</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#77a4a5">
    <link rel="stylesheet" href="/css/news.css">
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
        <div class="news_block news_add">
             <?php 
                            
                            if(isset($_POST['delete_article']))
                            {
   
                                mysqli_query($connection, "DELETE  FROM `articles` WHERE `id` = '".$_POST['id']."'" ); 
                                $comment_result ='<p style="color: red; margin-bottom: 10px;">Новость удалена!</p>';
                                    
                            }                           
                            ?>
                             <?php 
                            
                            if(isset($_POST['post_article']))
                            {      
                                mysqli_query($connection, "INSERT INTO `articles` (`title`,`image`, `mv`,`display_mode`,`text`, `pubdate`) VALUES ('".$_POST['title']."','".$_POST['image']."','".$_POST['mv']."','".$_POST['block']."','".$_POST['text']."', NOW())"); 
                                $comment_result ='<p style="color: green; margin-bottom: 10px;">Новость успешно добавлена!</p>';
                                    
                            }
                            
                            ?>
                           <?php 
                            
                            if(isset($_POST['refresh_article']))
                            {      
                                mysqli_query($connection, "UPDATE `articles` SET `title` = '".$_POST['title']."', `image` = '".$_POST['image']."',`mv` = '".$_POST['mv']."',`display_mode` = '".$_POST['block']."',`text` = '".$_POST['text']."',`pubdate` = NOW() WHERE `id` = '".$_POST['id']."' "); 
                                $comment_result ='<p style="color: green; margin-bottom: 10px;">Новость успешно отредактирована!</p>';
         
                            }
                            
                            ?>
            <div class="block_title">
                <p>Добавление новости</p>

            </div>
            <div class="add_form">
                <form method="POST" action="news_add.php">
                   <?php echo $comment_result ?>
                    <h3>Id статьи</h3>
                    <input class="field input_title" type="text" name="id" placeholder="id новости"> <br>
                    <h3>Заголовок новости</h3>
                    <input class="field input_title" type="text" name="title" placeholder="Заголовок статьи"> <br>
                    <h3>URL картинки</h3>
                    <input class="field  input_image" type="text" name="image" placeholder="Картинка"> <br>
                    <h3>Текст новости</h3>
                    <textarea class="article_text" name="text" rows="9" placeholder="Текст новости"></textarea> <br>
                    
                    <h3>Ссылка на видео</h3>
                     <input type="checkbox" class="add_video" id="addvideo" name="block" value="block">
                    <label class="label_check" for="addvideo">Добавить видео</label>
                    <input class="field  input_mv" type="text" name="mv" placeholder="ссылка">    
                    <div class="add_btn">
                    <input class="btn" name="post_article" type="submit" value="Опубликовать">
                    <input class="btn btn_refresh" name="refresh_article" type="submit" value="Обновить">
                    <input class="btn btn_delete" name="delete_article" type="submit" value="Удалить">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>


