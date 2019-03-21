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
    <link rel="stylesheet" href="/css/main.css">
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
            <div class="last_news">
                <div class="news_name">
                    <p>Главное</p>
                </div>
                <div class="news_img">
                    <img src="/img/hot.png" height="20" alt="">
                </div>
            </div>
            <div class="slideshow">
                <div class="slider">
                    <div class="slide_viewer">
                        <div class="slide_group">
                            <?php
                            $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 4");
                            ?>
                            <?php
                            while ($art = mysqli_fetch_assoc($articles)) {
                                ?>
                            <div class="slide" style="background: url(<?php echo $art['image']; ?>) no-repeat; background-size: cover;  background-position: center;">
                                <a href="/article.php?id=<?php echo $art['id']; ?>">
                                    <span class="slide_content">

                                        <?php echo $art['title'];  ?>

                                    </span>

                                </a>
                            </div>
                            <?php 
                        }
                        ?>
                        </div>
                    </div>
                </div>
                <!-- End // .slider -->

                <div class="slide_buttons">
                </div>

                <div class="directional_nav">
                    <div class="previous_btn" title="Previous">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-11 -11.5 65 66">
                            <g>
                                <g>
                                    <path fill="white" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
			c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z" />
                                    <path fill="white" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                    <div class="next_btn" title="Next">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="-11 -11.5 65 66">
                            <g>
                                <g>
                                    <path fill="white" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z" />
                                    <path fill="white" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z" />
                                </g>
                            </g>
                        </svg>
                    </div>
                </div>
                <!-- End // .directional_nav -->
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
            </div>
            <div class="news">
                <div class="news_block last_list">
                    <div class="block_title">
                        <p>Последние новости <a href="articles_pages.php">Все записи</a> </p>

                    </div>
                    <div class="articles_columns">
                        <?php
                        $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 4,6");
                        ?>
                        <?php
                        while ($art = mysqli_fetch_assoc($articles)) {
                            ?>

                        <div class="article">
                            <a href="/article.php?id=<?php echo $art['id']; ?>">
                                <div class="article_image" style="background-image:url(<?php echo $art['image']; ?>);">
                                </div>
                                <div class="article_info">
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
                <div class="news_block most_popular">
                    <div class="block_title">
                        <p>Самое популярное <a href="articles_pages.php">Все записи</a> </p>
                    </div>
                    <?php
                    $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");
                    while ($art = mysqli_fetch_assoc($articles)) {
                        ?>

                    <div class="article">
                        <a href="/article.php?id=<?php echo $art['id']; ?>">
                            <div class="article_image" style="background-image:url(<?php echo $art['image']; ?>);">
                            </div>
                            <div class="article_info">
                                <h4><?php echo $art['title']; ?></h4>
                                <p> <?php 
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
                <div class="news_block last_comments_mv">
                    <div class="block_title">
                        <p>Последние MV <a href="video.php">Все записи</a></p>
                    </div>
                    <div class="MV_videos">
                        <div class="video_mv">
                            <?php
                            $articles = mysqli_query($connection, "SELECT `mv` FROM `articles` WHERE `mv` !=' ' ORDER BY `id` DESC LIMIT 2");
                            while ($art = mysqli_fetch_assoc($articles)) {
                                ?>

                            <iframe src="<?php echo $art['mv'];    ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>


                            <?php 
                        }
                        ?>
                        </div>





                    </div>
                    <div class="block_title">
                        <p>Комментарии</p>
                    </div>
                    <div class="comments">
                        <?php
                        $comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 4");
                        while ($comment = mysqli_fetch_assoc($comments)) {
                            ?>

                        <div class="comments_item">
                            <a href="/article.php?id=<?php echo $comment['articles_id']; ?>">
                                <div class="user_photo" style="background-image:url(http://www.gravatar.com/avatar/<?php echo md5($comment['email']);    ?>?s=125);">
                                </div>
                                <div class="comment_content ">
                                    <h4><?php echo $comment['author']; ?> </h4>
                                    <span class="data_time"><?php echo $comment['pubdate']; ?></span>
                                    <p>
                                        <?php echo $comment['text']; ?>
                                    </p>

                                </div>
                            </a>
                        </div>
                        <?php 
                    }
                    ?>


                    </div>

                </div>

            </div>




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
    <script>
        $('.slider').each(function() {
            var $this = $(this);
            var $group = $this.find('.slide_group');
            var $slides = $this.find('.slide');
            var bulletArray = [];
            var currentIndex = 0;
            var timeout;

            function move(newIndex) {
                var animateLeft, slideLeft;

                advance();

                if ($group.is(':animated') || currentIndex === newIndex) {
                    return;
                }

                bulletArray[currentIndex].removeClass('active');
                bulletArray[newIndex].addClass('active');

                if (newIndex > currentIndex) {
                    slideLeft = '100%';
                    animateLeft = '-100%';
                } else {
                    slideLeft = '-100%';
                    animateLeft = '100%';
                }

                $slides.eq(newIndex).css({
                    display: 'block',
                    left: slideLeft
                });
                $group.animate({
                    left: animateLeft
                }, function() {
                    $slides.eq(currentIndex).css({
                        display: 'none'
                    });
                    $slides.eq(newIndex).css({
                        left: 0
                    });
                    $group.css({
                        left: 0
                    });
                    currentIndex = newIndex;
                });
            }

            function advance() {
                clearTimeout(timeout);
                timeout = setTimeout(function() {
                    if (currentIndex < ($slides.length - 1)) {
                        move(currentIndex + 1);
                    } else {
                        move(0);
                    }
                }, 4000);
            }

            $('.next_btn').on('click', function() {
                if (currentIndex < ($slides.length - 1)) {
                    move(currentIndex + 1);
                } else {
                    move(0);
                }
            });

            $('.previous_btn').on('click', function() {
                if (currentIndex !== 0) {
                    move(currentIndex - 1);
                } else {
                    move(3);
                }
            });

            $.each($slides, function(index) {
                var $button = $('<a class="slide_btn">&bull;</a>');

                if (index === currentIndex) {
                    $button.addClass('active');
                }
                $button.on('click', function() {
                    move(index);
                }).appendTo('.slide_buttons');
                bulletArray.push($button);
            });

            advance();
        });
    </script>
</body>

</html> 