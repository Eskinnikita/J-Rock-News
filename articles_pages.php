<?php

include('includes/db.php');
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#77a4a5">
    <title>Все новости </title>
    <link rel="stylesheet" href="/css/pages.css">
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
                    <a href="https://plus.google.com/u/0/+JROCKNEWS" target="_blank">
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
                <div class="news_block all_news">
                    <div class="block_title">
                        <p>Все новости</p>

                    </div>
                    <div class="articles_columns">
                        <?php
                        $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC");
                        ?>
                        <?php
                        while ($art = mysqli_fetch_assoc($articles)) {
                            ?>

                        <div class="article_cols">
                            <a href="/article.php?id=<?php echo $art['id']; ?>">
                                <div class="article_image_cols" style="background-image:url(<?php echo $art['image']; ?>);">
                                </div>
                                <div class="article_info_cols">
                                    <h4><?php echo $art['title']; ?></h4>
                                    <p>
                                        <?php 
                                        $art['text'] = iconv('UTF-8', 'windows-1251', $art['text']); //Меняем кодировку на windows-1251 

                                        $art['text'] = substr($art['text'], 0, 150); //Обрезаем строку 

                                        $art['text'] = iconv('windows-1251', 'UTF-8', $art['text']) . '...'; //Возвращаем кодировку в utf-8 

                                        echo $art['text'];

                                        ?> </p>

                                </div>
                            </a>
                        </div>
                        <?php 
                    }
                    ?>
                    </div>
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