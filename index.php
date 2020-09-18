<?php 
    require_once 'config/init.php';

    $meta = array(
    //    'keywords' => '',
    //    'description' => '',
       'title' => "Homepage || ".SITE_NAME
    );

    require_once 'inc/header.php';
    $news = new News;
    $featured_top = $news->getFeaturedNews(0,3);
    // debug($featured_top,true);
    if($featured_top){
        ?>
            <div class="banner-news">
        <?php
        foreach($featured_top as $key => $list_news){
            ?>   
        <div class="newsfeed">
            <div class="container">
                <h4 class="header1">
                    <a href="news.php?id=<?php echo $list_news->id ?>"><?php echo $list_news->title ?></a>
                </h4>
                <?php 
                    if ($key ==0) {
                        if(file_exists(UPLOAD_PATH.'/news/'.$list_news->image) && !empty($list_news->image)){
                        ?>
                <div class="img_hastag">
                    <img src="<?php echo UPLOAD_URL.'/news/'.$list_news->image?>">
                </div>
                        <?php } ?>
                <p class="img_content">
                    <?php echo $list_news->summary ?>
                </p>
                <?php
                    } ?>
            </div>
        </div>
        <hr class="first">
            <?php
        }
    }
    ?>

      
    </div>

    <div class="listing">
        <div class="container">
            <div class="row">
                    <?php
                        $other = $news->getFeaturedNews(3,5);
        // debug($other,true); 


                        if($other){
                            $first_elem = array_shift($other);

                    ?>
                <div class="col-md-6 col-sm-12">
                    <div class="card listnews-1">

                        <img src="<?php echo UPLOAD_URL.'/news/'.$first_elem->image ?>" class="card-img-top main-image-1" alt="...">
                        
                        <div class="card-body">
                            <p class="card-text1">
                                <a href="news.php?id=<?php echo $first_elem->id?>">
                                    <?php echo $first_elem->title ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-sm-12">

                <?php 
                    if($other){
                        foreach($other as $key => $other_news){
                            ?>
                                <div class="row">
                                    <div class="col-md-5">
                                        <img src="<?php echo UPLOAD_URL.'/news/'.$other_news->image ?>" style="width: 100%; height: 150px; ">
                                    </div>
                                    <div class="col-md-5">
                                        <p style="font-weight: 600; font-size: 1em;" class="list11">
                                            <a href="news.php?id=<?php echo $other_news->id ?>">
                                                <?php echo $other_news->title ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <hr>
                            <?php
                        }
                    }
                ?>

                </div>
                        <?php } ?>
            </div>
        </div>
    </div>
    <!-- Content Closed -->
    
    <?php 
        $category_news = $news->getCategoryWiseNews(2, 0, 5);
        // debug($category_news,true); 
        if($category_news){
            $first_news = array_shift($category_news);
            ?>
            <!-- Listing_paage -->
    <div class="title_news">
        <div class="container">
            <ul class="css-nav">
                <li><a href="category.php?id=2">Politics</a></li>
            </ul>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-12">
                            <h1 class="title_news1">
                                <a href="news.php?id=<?php echo $first_news->id; ?>">
                                    <?php echo $first_news->title; ?>                                </a>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="news.php?id=<?php echo $first_news->id; ?>">
                                <img src="<?php echo UPLOAD_URL.'/news/'.$first_news->image ?>" style="height: auto; width: 100%;">
                            </a>
                        </div>
                        <div class="col-md-6">
                            <p class="summary-text">
                               <?php echo $first_news->summary ?>
                            </p>
                            <!-- read more -->
                            <a href="news.php?id=<?php echo $first_news->id; ?>">
                                Read more..
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row mt-3">
            <?php
                if($category_news){
                    foreach($category_news as $cat_news){
                        
                        ?>
                        <div class="col-md-3">
                            <img src="<?php echo UPLOAD_URL.'/news/'.$cat_news->image ?>" alt="" style="width: 100%; height: auto;">
                            <p class="three_nepali mt-3">
                                <a href="news.php?id=<?php echo $cat_news->id; ?>">
                                <?php echo $cat_news->title ?>
                                </a>
                            </p>
                            </div>
                        <?php
                    }
                }
            ?>
         </div>
         <hr>
         <?php 
            $cat_news_first = $news->getCategoryWiseNews(4, 0, 5);
            if ($cat_news_first) {
                ?>
            <div class="row mt-3">
                    <div class="col-md-6">
                        <?php 
                            foreach($cat_news_first as $cat_news_left){
                                ?>
                                    <div class="row mt-3">
                                        <div class="col-md-5">
                                        <img src="<?php echo UPLOAD_URL.'/news/'.$cat_news_left->image; ?>" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                                        </div>
                                    <div class="col-md-5">
                                        <p style="font-weight: 600; font-size: 1em;" class="list11">
                                            <a href="news.php?id=<?php echo $cat_news_left->id; ?>">
                                                 <?php echo $cat_news_left->title ?>
                                            </a>
                                        </p>
                                    </div>
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php 
                            $cat_news_second = $news->getCategoryWiseNews(4, 5, 5);
                            // debug($cat_news_second,true);
                            if($cat_news_second){
                                foreach($cat_news_second as $right_news){
                                    ?>
                                         <div class="row mt-3">
                                            <div class="col-md-5">
                                                <img src="<?php echo UPLOAD_URL.'/news/'.$right_news->image ?>" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                                            </div>
                                            <div class="col-md-5">
                                                <p style="font-weight: 600; font-size: 1em;" class="list11">
                                                    <a href="news.php?id=<?php echo $right_news->id ?>">
                                                        <?php echo $right_news->title; ?>
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                </div>
            </div>
            <?php
            } ?>
        </div>
    </div>
    <!-- ListingPage closed -->
            <?php
        }
    ?>

    
    <!-- देश -->
    <div class="country">
        <div class="container">
            <div class="row mt-3">
                <div class="col-md-9">
                    <nav class="navbar navbar-light bg-light" style="border-radius: 20px;">
                        <a class="navbar-brand" href="#">State</a>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <?php 
                            $all = array_shift($state);
                                foreach($state as $key => $state_name){
                                    ?>

                                    <a class="nav-item nav-link <?php echo $key == 'state1' ? 'active' : ''?>" id="nav-<?php echo $key; ?>-tab" data-toggle="tab" href="#nav-<?php echo $key;?>" role="tab" aria-controls="nav-<?php echo $key;?>" aria-selected="<?php echo $key == 'state1' ? true : false?>">
                                        <?php echo $state_name?>
                                    </a>
                                    <?php
                                }
                            ?>
                           
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                                <?php
                                    foreach($state as $key => $state_name){
                                        $state_wise = $news->getStatewiseNews($key);
                                        ?>
                                        <div class="tab-pane fade <?php echo $key == 'state1' ? 'show active' : '' ?>" id="nav-<?php echo $key; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $key;?>-tab">
                                               <?php 
                                                    if($state_wise){
                                                        $first_state_news = array_shift($state_wise);
                                                        ?>
                                                         <div class="row mt-3">
                                                    <div class="col-md-6">
                                                        <a href="news.php?id=<?php echo $first_state_news->id; ?>">
                                                        <?php
                                                            if(file_exists(UPLOAD_PATH.'/news/'.$first_state_news->image) && !empty($first_state_news->image)){
                                                                ?>
                                                                     <img src="<?php echo UPLOAD_URL.'/news/'.$first_state_news->image; ?>" style="width: 100%; height: auto;">
                                                                <?php
                                                            } else { ?>
                                                                 <img src="<?php echo ASSETS_IMAGES_URL.'/logo.png'; ?>" style="width: 100%; height: auto;">
                                                        <?php } ?>    
                                                        </a>
                                                        <h1 class="nagdunga">
                                                            <a href="news.php?id=<?php echo $first_state_news->id; ?>">
                                                                <?php echo $first_state_news->title; ?>    
                                                            </a>
                                                        </h1>
                                                        <p><?php echo $first_state_news->summary; ?></p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <?php 
                                                                if($state_wise){
                                                                    foreach($state_wise as $news_list){
                                                                        ?>
                                                                        <div class="col-md-6">
                                                                            <a href="news.php?id=<?php echo $news_list->id; ?>">
                                                                            <?php 
                                                                                if(file_exists(UPLOAD_PATH.'/news/'.$news_list->image) && !empty($news_list->image)){
                                                                                    ?>
                                                                                <img src="<?php echo UPLOAD_URL.'/news/'.$news_list->image; ?>" style="width: 100%; height: auto;">
                                                                                    <?php
                                                                                } else { ?>
                                                                                <img src="<?php echo ASSETS_IMAGES_URL.'/logo.png'; ?>" style="width: 100%; height: auto;">
                                                                                <?php }
                                                                            ?>
                                                                            </a>
                                                                            <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">
                                                                                <a href="news.php?id=<?php echo $news_list->id ?>">
                                                                                <?php echo $news_list->title; ?>
                                                                            </a>
                                                                        </p>
                                                                        </div>
                                                                        <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </div>
                                                       
                                                    </div>
                                                </div>
                                                        <?php
                                                    }else {
                                                        echo "No news found.";
                                                    }
                                               ?>
                                            </div>
                                        <?php
                                    }
                                ?>
                       
                    </div>
                </div>

                <!-- Trending news -->
                <!-- $news = new News; -->
                <?php
                    $trending_news = $news->getTrendingNews(0,5);
                    if($trending_news){
                        ?>
                        <div class="col-md-3">
                            <nav class="navbar navbar-light bg-primary" style="border-radius: 20px;">
                                <a class="navbar-brand" href="#">Trending</a>
                            </nav>
                        <?php
                        $i = 1;
                        foreach($trending_news as $list_news){
                            ?>
                        <div class="row mt-3">
                            <div class="col-md-2">
                                <span style="text-align: center; font-weight: bold;"><?php echo $i++; ?></span>
                            </div>
                        <div class="col-md-10">
                            <p class="trends"><a href="news.php?id=<?php echo $list_news->id; ?>"><?php echo $list_news->title; ?></a></p>
                        </div>
                        </div>
                        <?php
                        }
                    }
                ?>                                                 
                </div>
            </div>
        </div>
    </div> 
    <!-- देश Closed -->

    <?php 
        $category_news = $news->getCategoryWiseNews(6,0,5);
                            // debug($category_news,true);
        if($category_news){
            $cat_first_news = array_shift($category_news);
            ?>
             <!-- Listing_paage -->
                <div class="title_news">
                    <div class="container">
                        <ul class="css-nav">
                            <li><a href="category.php?id=6">Entertainment</a></li>
                        </ul>
                        <h1 class="title_news1"><a href="news.php?id=<?php echo $cat_first_news->id; ?>"><?php echo $cat_first_news ->title; ?></a></h1>
                        <div class="row mt-3">
                            <div class="col-md-8">
                                <a href="news.php?id=<?php echo $cat_first_news->id; ?>">
                                    <img src="<?php echo UPLOAD_URL.'/news/'.$cat_first_news->image; ?>" style="height: auto; width: 100%;">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <p style="font-size: 1.2em; font-weight: 450;">
                                <?php echo $cat_first_news->summary; ?>
                                    <a href="news.php?id=<?php echo $cat_first_news->id; ?>">
                                         [Read more..]
                                    </a>
                                 </p>
                            </div>
                        </div>
                        <div class="row mt-3">
                        <?php
                            if($category_news){
                                foreach($category_news as $cat_news){
                                    ?>
                                    <div class="col-md-3">
                                        <img src="<?php echo UPLOAD_URL.'/news/'.$cat_news->image; ?>" alt="" style="width: 100%; height: auto;">
                                        <p class="three_nepali">
                                            <a href="news.php?id=<?php echo $cat_news->id; ?>">
                                                <?php echo $cat_news->title; ?>
                                            </a>
                                        </p>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                            
                        </div>
                    </div>
                </div>
    <!-- ListingPage closed -->
            <?php
        }

    ?>

   
    <?php 
        $videos = new Video;
        $get_videos = $videos -> getVideos(0,4);
        // debug($get_videos,true);
        if($get_videos){
            $get_first_videos = array_shift($get_videos);
            ?>
  <!-- Video Open -->
        <div class="Video">
                <div class="container">
                    <nav class="navbar navbar-light bg-dark" style="border-radius: 20px; margin-top: 10px;">
                        <a class="navbar-brand" href="#">Video</a>
                    </nav>
                    <div class="row mt-3 pt-2" style="padding-bottom: 10px;">
                        <div class="col-md-8 col-sm-12">
                            <iframe width="100%;" height="550px" src="https://www.youtube.com/embed/<?php echo $get_first_videos->video_id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p class="mt-3">
                                <a href="#">
                                    <h4>
                                        <?php echo $get_first_videos->title;?>
                                    </h4>
                                </a>
                            </p>
                            <hr>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <?php 
                                if($get_videos){
                                    foreach($get_videos as $other_videos){
                                        ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <iframe width="100%;" height="auto" src="https://www.youtube.com/embed/<?php echo $other_videos->video_id; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    <p class="mt-3">
                                        <a href="">
                                            <h4>
                                                <?php echo $other_videos->title; ?>
                                            </h4>
                                        </a>
                                    </p>
                                    <hr>
                                </div>
                            </div>
                                        <?php
                                    }
                                }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
            <?php
        }

    ?>

  
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-6">
                <img src="assets/img/ads1.png" alt="" class="img img-fluid">
            </div>
            <div class="col-6">
                <img src="assets/img/ads1.png" alt="" class="img img-fluid">
            </div>
        </div>
    </div>

    <!-- International open -->
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="css-nav">
                    <li><a href="category.php?id=8">International</a></li>
                </ul>
            </div>
        </div>

        <!-- for left side 5 -->
        <?php 
            $cat_news_international_first = $news->getCategoryWiseNews(8,0,5);
            // debug($cat_news_international_first,true);
            if($cat_news_first){

        ?>
        <div class="row mt-3">
            <div class="col-md-6">
                <?php 
                    foreach($cat_news_international_first as $cat_news_international_left){
                        ?>
                        <div class="row mt-3">
                            <div class="col-md-5">
                                <img src="<?php echo UPLOAD_URL.'/news/'.$cat_news_international_left->image; ?>" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                            </div>
                            <div class="col-md-5">
                                <p style="font-weight: 600; font-size: 1em;" class="list11">
                                    <a href="news.php?id=<?php echo $cat_news_international_left->id;?>">
                                         <?php echo $cat_news_international_left->title;?>
                                    </a>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>

            <div class="col-md-6">
                <?php 
                     $cat_news_international_second = $news->getCategoryWiseNews(8,5,5);
                  // debug($cat_news_international_left,true);
                  if($cat_news_international_second){
                      foreach($cat_news_international_second as $right_news){
                          ?>
                         <div class="row mt-3">
                                <div class="col-md-5">
                                    <img src="<?php echo UPLOAD_URL.'/news/'.$right_news->image; ?>" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                                </div>
                                <div class="col-md-5">
                                    <p style="font-weight: 600; font-size: 1em;" class="list11">
                                        <a href="news.php?id=<?php echo $right_news->id; ?>">
                                            <?php echo $right_news->title;?>
                                        </a>
                                    </p>
                                </div>
                            </div>
                          <?php
                      }
                  }
                ?>
                
            </div>
        </div>
            <?php } ?>
    </div>

    <!-- International close -->
<!-- sports start -->
<?php
$category_news = $news->getCategoryWiseNews(4,0,1);
                //   debug($category_news,true);
    if($category_news){
        $first_sport_news = array_shift($category_news);
        ?>
            <div class="container">
            <div class="row">
                <div class="col-12">
                    <ul class="css-nav">
                        <li><a href="category.php?id=4">Sports</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-6">
                    <a href="news.php?id=<?php echo $first_sport_news->id; ?>"><img src="<?php echo UPLOAD_URL.'/news/'.$first_sport_news->image; ?>" style="width: 100%; height: auto;"></a>
                    <h1 class="nagdunga"><a href="news.php?id=<?php echo $first_sport_news->id; ?>"><?php echo $first_sport_news->title; ?></a></h1>
                    <p><?php echo $first_sport_news->summary; ?></p>
                </div>
                <?php 
                    $cat_news_sport_first = $news->getCategoryWiseNews(4,1,2);
                    if ($cat_news_sport_first) {
                        ?>
                <div class="col-md-6">
                    <div class="row">
                        <?php 
                            foreach($cat_news_sport_first as $cat_news_sport_left){
                                ?>
                                <div class="col-md-6">
                                    <a href="news.php?id=<?php echo $cat_news_sport_left->id; ?>"><img src="<?php echo UPLOAD_URL.'/news/'.$cat_news_sport_left->image; ?>" style="width: 100%; height: auto;"></a>
                                        <p style="padding-top: 20px; font-weight: 400; font-size: 16px;"><?php echo $cat_news_sport_left->title; ?></p>
                                 </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="row mt-5">
                        <?php
                            $cat_news_sport_second = $news->getCategoryWiseNews(4,2,2); //category 4 ko index 2 dekhi 2 ota news
                            if($cat_news_sport_second){
                                foreach($cat_news_sport_second as $cat_news_sport_right){
                                    ?>
                                    <div class="col-md-6">
                                        <a href="news.php?id=<?php echo $cat_news_sport_right->id; ?>"><img src="<?php echo UPLOAD_URL.'/news/'.$cat_news_sport_right->image; ?>" style="width: 100%; height: auto;"></a>
                                        <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">
                                            <?php echo $cat_news_sport_right->title; ?>
                                        </p>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
                <?php
                    } ?>
            </div>
        </div>
        <?php
    }


?>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-12">
                <img src="assets/img/ads1.png" alt="" class="img img-fluid">
            </div>
        </div>
    </div>
   
    <!-- Video Closed -->

    <?php require_once 'inc/footer.php' ?>