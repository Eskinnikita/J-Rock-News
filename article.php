<?php

include('includes/db.php');
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#77a4a5">
    <title>Nonsense Ongaku - новости из мира j-rock</title>
    <link rel="stylesheet" href="/css/article.css">
    <link rel="shortcut icon" href="img/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <script src="scripts/adaptive_menu.js"></script>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
        (function(d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter48884447 = new Ya.Metrika({
                        id: 48884447,
                        clickmap: true,
                        trackLinks: true,
                        accurateTrackBounce: true
                    });
                } catch (e) {}
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function() {
                    n.parentNode.insertBefore(s, n);
                };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/48884447" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->
</head>

<body>
    <header>
        <div id="wrapper">
            <div id="nav">
                <div class="nav_item name">
                    <a href="/">Nonsense Ongaku</a>
                    <p class="sub_name">новости из мира j-rock</p>
                </div>
                <div class="menu_item menu_charts"><a href="/">главная</a></div>
                <div class="menu_item menu_news"><a href="articles_pages.php">новости</a></div>
                <div class="menu_item menu_video"><a href="video.php">видео</a></div>
                <div class="menu_item menu_photo"><a href="photo.php">фото</a></div>
                <div class="social">
                    <a href="https://vk.com/public166557947" target="_blank">
                        <img src="/img/vk.png" alt="vk" height="30">
                    </a>
                </div>
                <div class="social">
                    <a href="https://plus.google.com/u/0/+JROCKNEWSS" target="_blank">
                        <img src="/img/google.png" height="29">
                    </a>
                </div>
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="/">главная</a>
                    <a href="articles_pages.php">новости</a>
                    <a href="video.php">видео</a>
                    <a href="photo.php">фото</a>
                </div>
                <span class="burger" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
            </div>
        </div>
    </header>
    <main>
        <div id="wrapper">
            <div class="left_col">
                <?php 

                $article = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id` =" .  (int)$_GET['id']);

                if (mysqli_num_rows($article) <= 0) {
                    ?>

                <div class="news_block article_main">
                    <div class="block_title">
                        <p>Новости<a href="#">0 просмотров</a></p>
                    </div>
                    <h2>Статья не найдена</h2>
                    <div class="article_text">
                        <h3>Запрашиваемая вами статья не существует :с </h3>
                    </div>
                </div>
                <?php

            } else {

                $art = mysqli_fetch_assoc($article);
                mysqli_query($connection, "UPDATE `articles` SET `views` = `views` + 1 WHERE `id` =" . (int)$art['id']);
                ?>
                <div class="news_block article_main">
                    <div class="block_title">
                        <p>Новости
                            <a href="#">
                                <?php echo $art['views']; ?> просмотров</a>
                        </p>
                    </div>
                    <h2>
                        <?php echo $art['title'];   ?>
                    </h2>
                    <img class="article_photo" src="<?php echo $art['image']; ?>" alt="pic">
                    <div class="article_text">
                        <?php echo $art['text'];   ?>
                    </div>
                    <div class="article_video" style="display:<?php echo $art['display_mode']; ?>">
                        <iframe src="<?php echo $art['mv'];  ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                    </div>

                    <div class="block_pubdate">
                        <p>Дата публикации: <a href="#"><?php echo $art['pubdate'];  ?></a></p>
                        <!-- AddToAny BEGIN -->
                        <div class="a2a_kit a2a_kit_size_32 a2a_default_style share_buttons">
                            <a class="a2a_button_vk"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                        </div>
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->

                    </div>
                </div>




                <?php 
            }
            ?>
                <div class="news_block article_comments">


                    <?php 

                    if (isset($_POST['do_post'])) {
                        $error = array();

                        if ($_POST['name'] == '') {
                            $errors[] = 'Введите имя!';
                        }

                        if ($_POST['mail'] == '') {
                            $errors[] = 'Введите вашу почту!';
                        }

                        if ($_POST['comment'] == '') {
                            $errors[] = 'Введите текст комментария!';
                        }

                        if (empty($errors)) {
                            //Добавить комментарий 

                            mysqli_query($connection, "INSERT INTO `comments` (`author`,`email`, `text`, `pubdate`,`articles_id`) VALUES ('" . $_POST['name'] . "','" . $_POST['mail'] . "','" . $_POST['comment'] . "', NOW(),'" . $art['id'] . "')");



                            $comment_result = '<p style="color: green; margin-bottom: 10px;">Комментарий успешно добавлен!</p>';
                        } else {
                            //Вывести ошибку на экран 
                            $comment_result = '<p style="color: red; margin-bottom: 10px;">' .  $errors['0'] . '</p>';
                        }
                    }

                    ?>

                    <div class="block_title">
                        <p>Комментарии</p>
                    </div>

                    <?php
                    $comments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id` = " . (int)$art['id'] . " ORDER BY `id` DESC");
                    if (mysqli_num_rows($comments) <= 0) {
                        echo "Никто еще не прокомментировал эту статью. Будьте первым!";
                    }
                    while ($comment = mysqli_fetch_assoc($comments)) {
                        ?>

                    <div class="comments_item">

                        <div class="user_photo" style="background-image:url(http://www.gravatar.com/avatar/<?php echo md5($comment['email']);    ?>?s=125);">
                        </div>
                        <div class="comment_content ">
                            <h4><?php echo $comment['author']; ?></h4>
                            <p class="data_time"><?php 
                                                    echo $comment['pubdate']; ?></p>
                            <p> <?php echo $comment['text']; ?>
                            </p>
                        </div>

                    </div>
                    <?php 
                }
                ?>
                </div>
                <div class="news_block add_comment" id="error">
                    <div class="block_title">
                        <p>Добавить комментарий<a href="#"></a></p>
                    </div>
                    <?php echo $comment_result  ?>
                    <form method="POST" action="/article.php?id=<?php echo $art['id']; ?>#error">
                        <input class="input_name" type="text" name="name" placeholder="Ваше имя"> <br>
                        <input class="input_name input_mail" type="email" name="mail" placeholder="Ваша почта"> <br>
                        <textarea name="comment" rows="9" placeholder="Ваш комментарий"></textarea> <br>

                        <input class="btn" name="do_post" type="submit" value="Добавить комментарий">
                    </form>
                </div>
            </div>
            <?php
            include 'includes/right_col.php';
            ?>


        </div>
    </main>
    <footer>
        <div id="wrapper">
            <div class="bottom_nav">
                <div class="bottom_item"><a href="/index.php">главная</a></div>
                <div class="bottom_item"><a href="/articles_pages.php">новости</a></div>
                <div class="bottom_item"><a href="/video.php">видео</a></div>
                <div class="bottom_item"><a href="/photo.php">фото</a></div>
            </div>
            <div class="admin_link">
                <a href="admin/index.php">для администрации</a>
            </div>

            <div class="copyright">
                <p> выполнил студент группы 171-331 Ескин Никита<br>2018</p>

            </div>
        </div>
    </footer>
</body>


</html> 