<div class="right_col">
                    <div class="news_block most_popular">
                        <div class="block_title">
                            <p>Самое популярное <a href="articles_pages.php">Все записи</a> </p>

                        </div>

                        <?php
                      $articles = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 2");
                          while($art = mysqli_fetch_assoc($articles))
                          {
                              ?>

                            <div class="article">
                                <a href="/article.php?id=<?php echo $art['id']; ?>">
                          <div class="article_image" style="background-image:url(<?php echo $art['image']; ?>); background-position: center; background-size: cover;">
                          </div>
                          <div class="article_info">
                              <h3><?php  echo $art['title']; ?></h3>
                              <p>
                              <?php 
$art['text']= iconv('UTF-8','windows-1251',$art['text'] ); //Меняем кодировку на windows-1251 

$art['text'] = substr($art['text'],0,200); //Обрезаем строку 

$art['text']= iconv('windows-1251','UTF-8',$art['text']).'...'; //Возвращаем кодировку в utf-8 

echo $art['text']; 

?> 
                              </p>
                             
                          </div>
                          </a>
                            </div>
                            <?php    
                          }
                         ?>

                    </div>
                    <div class="news_block comments">
                        <div class="block_title">
                            <p style="font-size: 15px;">Последние комментарии</p>
                        </div>
                        <?php
                      $comments = mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 4");
                          while($comment = mysqli_fetch_assoc($comments))
                          {
                              ?>

                            <div class="comments_item">
                                <a href="/article.php?id=<?php echo $comment['articles_id']; ?>">
                          <div class="user_photo" style="background-image:url(http://www.gravatar.com/avatar/<?php echo md5($comment['email']) ;    ?>?s=125);" >
                          </div>
                          <div class="comment_content ">
                              <h4><?php  echo $comment['author']; ?></h4>
                              <p class="data_time"><?php echo $comment['pubdate'];?></p>
                              <p> <?php echo $comment['text']; ?>
                              </p>
                          </div>
                          </a>
                            </div>
                            <?php    
                          }
                         ?>

                    </div>

                </div>
