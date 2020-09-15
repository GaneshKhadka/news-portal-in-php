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
                        <a class="navbar-brand" href="#"> State </a>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">

                            <?php
                            $all = array_shift($state);
                            // debug($all,true);
                                foreach($state as $key => $state_name){
                                    ?>
                            <a class="nav-item nav-link <?php echo $key == 'state1' ? 'active' : ''?>" id="nav-<?php echo $key; ?>-tab" data-toggle="tab" href="#nav-<?php echo $key ?>" role="tab" aria-controls="nav-<?php echo $key ?>" aria-selected="<?php echo $key == 'state1' ? true : false?>">
                                <?php echo $state_name ?>
                            </a>
                            
                            <?php
                                }
                            ?>

                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <?php 
                            foreach($state as $key => $state_name) {
                                $state_wise = $news->getStatewiseNews($key);
                            // debug($state_wise,true);

                                ?>
                                 <div class="tab-pane fade <?php echo $key == 'state1' ? 'show active' : '' ?>" id="nav-<?php echo $key; ?>" role="tabpanel" aria-labelledby="nav-<?php echo $key ?>-tab">
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
                                                    } else{
                                                        ?>
                                                        <img src="<?php echo ASSETS_IMAGES_URL.'/logo.png'; ?>" style="width: 100%; height: auto;">
                                        
                                                        <?php
                                                    }
                                                       ?>
                                                    </a>
                                                    <h1 class="nagdunga">
                                                        <a href="news.php?id=<?php echo $first_state_news->id?>">
                                                            <?php echo $first_state_news->title ?>
                                                        </a></h1>
                                                    <p><?php echo $first_state_news->summary ?></p>
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
                                                                                       <img src="<?php echo UPLOAD_URL.'/news/'.$news_list->image ?>" style="width: 100%; height: auto;">
                                                                                    <?php
                                                                                } else{
                                                                                    ?>
                                                                                         <img src="<?php echo ASSETS_IMAGES_URL.'/logo.png'; ?>" style="width: 100%; height: auto;">
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </a>
                                                                        <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">
                                                                            <a href="news.php?id=<?php echo $news_list->id ?>">
                                                                                <?php echo $news_list->title ?>
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
                                            } else {
                                                echo "No news found.";
                                            }
                                        ?>
                                        </div>

                                <?php
                            }
                        ?>

                    </div>
                </div>
                <div class="col-md-3">
                    <nav class="navbar navbar-light bg-primary" style="border-radius: 20px;">
                        <a class="navbar-brand" href="#">ट्रेन्डिङ</a>
                    </nav>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <span style="text-align: center; font-weight: bold;">१.</span>
                        </div>
                        <div class="col-md-10">
                            <p class="trends"><a href="#">स्थानीय तहका जनप्रतिनिधिलाई पारिश्रमिक नदिन सर्वोच्चको आदेश</a></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <span style="text-align: center; font-weight: bold;">२.</span>
                        </div>
                        <div class="col-md-10">
                            <p class="trends"><a href="#">उमेर भैसक्यो साठी, झन् ठूला दुःखले घेरेको !</a></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <span style="text-align: center; font-weight: bold;">३.</span>
                        </div>
                        <div class="col-md-10">
                            <p class="trends"><a href="#">महावीरको राष्ट्रिय आविष्कार केन्द्रको उद्घाटन, के-के हुँदैछन् ‘आविष्कार’ ?</a></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <span style="text-align: center; font-weight: bold;">४.</span>
                        </div>
                        <div class="col-md-10">
                            <p class="trends"><a href="#">आलम पक्राउ कांग्रेसविरुद्धको षडयन्त्र : देउवा</a></p>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <span style="text-align: center; font-weight: bold;">५.</span>
                        </div>
                        <div class="col-md-10">
                            <p class="trends"><a href="#">महराको बयान अझै भएन, स्वास्थ्य समस्याले होः प्रहरी</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- देश Closed -->
    <!-- Listing_paage -->
    <div class="title_news">
        <div class="container">
            <ul class="css-nav">
                <li><a href="#about">सूचना-प्रविधि</a></li>
            </ul>
            <h1 class="title_news1"><a href="#">यो हो अमेजन कम्पनीको ‘सबैभन्दा स्मार्ट’ काम</a></h1>
            <div class="row mt-3">
                <div class="col-md-8">
                    <a href="#"><img src="assets/img/smart-work-768x465.webp" style="height: auto; width: 100%;"></a>
                </div>
                <div class="col-md-4">
                    <p style="font-size: 1.2em; font-weight: 450;">विश्वका सबैभन्दा धनी व्यक्ति हुन् जेफ बेजोस । उनी अमेजन कम्पनीका सीईओ हुन् । जेफ बेजोस जब कुनै सार्वजनिक मञ्चहरुमा बोल्दछन्, तब आफ्नो मन्तव्यको अन्तिममा एउटा प्रसँग छुटाउँदैनन् । आफ्नो भाषणको अन्त्यतिर बेजोसले आफ्नो कम्पनी अमेजनभित्र रहेका केही अनुकरणीय तथा प्रेरणादायी प्रयास तथा कार्यहरुहरुको बारेमा बताउँदछन् ।</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
                    <img src="assets/img/ntc-nepal-telecom-300x183.webp" alt="" style="width: 100%; height: auto;">
                    <p class="three_nepali">
                        <a href="">घट्यो इन्टरनेट लिज लाइनको महसुल</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <img src="assets/img/samsung-apple-300x159 (1).webp" alt="" style="width: 100%; height: auto;">
                    <p class="three_nepali">
                        <a href="">यी हुन् विश्वका सबैभन्दा सिर्जनशील प्रविधि कम्पनीहरु : सामसुङको फड्को, एप्पल कमजोर</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <img src="assets/img/smart-telicom-300x182.webp" alt="" style="width: 100%; height: auto;">
                    <p class="three_nepali">
                        <a href="">स्मार्ट टेलिकमबाट खोसियो ४ अर्बको फाइबर परियोजना</a>
                    </p>
                </div>
                <div class="col-md-3">
                    <img src="assets/img/smart-telicom-300x182.webp" alt="" style="width: 100%; height: auto;">
                    <p class="three_nepali">
                        <a href="">स्मार्ट टेलिकमबाट खोसियो ४ अर्बको फाइबर परियोजना</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- ListingPage closed -->
    <!-- Video Open -->
    <div class="Video">
        <div class="container">
            <nav class="navbar navbar-light bg-dark" style="border-radius: 20px; margin-top: 10px;">
                <a class="navbar-brand" href="#">भिडियो</a>
            </nav>
            <div class="row mt-3 pt-2" style="padding-bottom: 10px;">
                <div class="col-md-8 col-sm-12">
                    <iframe width="100%;" height="550px" src="https://www.youtube.com/embed/o6Y5JJViFG4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    <p class="mt-3">
                        <a href="">
                            <h4>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </h4>
                        </a>
                    </p>
                    <hr>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="row">
                        <div class="col-md-12">
                            <iframe width="100%;" height="auto" src="https://www.youtube.com/embed/l1VVBD5I4FM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p class="mt-3">
                                <a href="">
                                    <h4>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h4>
                                </a>
                            </p>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/QHlsyY9Jpu8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p class="mt-3">
                                <a href="">
                                    <h4>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h4>
                                </a>
                            </p>
                            <hr>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <iframe width="100%" height="auto" src="https://www.youtube.com/embed/H-ExNmHo2xI" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p class="mt-3">
                                <a href="">
                                    <h4>
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    </h4>
                                </a>
                            </p>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="css-nav">
                    <li><a href="#about">International</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/Supreme-Court-300x180.jpg" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">स्थानीय तहका जनप्रतिनिधिलाई पारिश्रमिक नदिन सर्वोच्चको आदेश..</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/Prov-1-vs-other-300x160.webp" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">अरूको सुविधा खारेज हुँदा प्रदेश १ का स्थानीय जनप्रतिनिधि कसरी बचे ?..</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/onion-300x196.webp" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">भारतले रोकेपछि नेपालमा चीनबाट भित्रिन थाल्यो प्याज..</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/Shankar-pokharel-1-300x132.webp" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">सर्वोच्चको आदेशप्रति प्रदेश ५ का मुख्यमन्त्रीको असन्तुष्टि..</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/UNESCO-Misson-meets-with-NRA-CEO-300x182.webp" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">युनेस्को मिसन नेपालमा, सम्पदा पुनर्निर्माणबारे अध्ययन गर्दै..</a></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/Ram-saran-basnet-300x183.webp" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">‘भत्ता दिँदा ठीक, एकमुष्ठ पारिश्रमिक दिँदा बेठीक भने झै भयो’..</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/Nepali-congrress-training-300x183.jpg" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">गाउँपालिका अध्यक्षलाई आधा कार्यकाल घर्केपछि कांग्रेसको प्रशिक्षण..</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/Bijaya-yadav-300x182.webp" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">मधेस आन्दोलनका घाइतेको प्रश्न : नेताज्यू, वाचा गरेको ५० लाख खोई ?..</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/Woman-conference-300x182.webp" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">महिला अधिकार अनुगमन गर्न छुट्टै सं‌वैधानिक संयन्त्रको माग..</a></p>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-5">
                        <img src="assets/img/flowers-300x182.webp" style="width: 100%; height: auto;  border:1px solid #e8edf4;">
                    </div>
                    <div class="col-md-5">
                        <p style="font-weight: 600; font-size: 1em;" class="list11"><a href="#">जाउलाखेलमा गोदावरी पुष्प मेला सुरु..</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 20px">
        <div class="row">
            <div class="col-12">
                <img src="assets/img/ads1.png" alt="" class="img img-fluid">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="css-nav">
                    <li><a href="#about">Sports</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-6">
                <a href="#"><img src="assets/img/Nagdhunga-JAm-2076-19-768x501.webp" style="width: 100%; height: auto;"></a>
                <h1 class="nagdunga"><a href="#">नौबिसे-नागढुंगा सडकखण्डमा १० बजेदेखि ४ बजेसम्म एकतर्फी यातायात सञ्चालन</a></h1>
                <p>२ कात्तिक, काठमाडौं । नौबिसे-नागढुंगा सडकखण्डमा यातायातका साधन एकतर्फी सञ्चालन गरिएको छ । धादिङको धुनिवेशी नगरपालिका ९ पिपलामोडभन्दा तल भूत घर, याक घर र टायल घर सडक खण्डमा कालोपत्रे...</p>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#"><img src="assets/img/mahila-sammelan-300x182.webp" style="width: 100%; height: auto;"></a>
                    </div>
                    <div class="col-md-6">
                        <a href="#"><img src="assets/img/Pokhara-High-Court-300x150.webp" style="width: 100%; height: auto;"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">२० बुँदे घोषणापत्रसहित बेइजिङ समीक्षा सम्मेलन सम्पन्न</p>
                    </div>
                    <div class="col-md-6">
                        <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">उच्च अदालत पोखराका न्यायाधीश शाही सेवाबाट बर्खास्त</p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6">
                        <a href="#"><img src="assets/img/mahila-sammelan-300x182.webp" style="width: 100%; height: auto;"></a>
                    </div>
                    <div class="col-md-6">
                        <a href="#"><img src="assets/img/Three-senior-officers-feliciatied-300x180.webp" style="width: 100%; height: auto;"></a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">सचिवको गुनासो : महिला आयोगको नेतृत्व मैले लिनुपरेको छ</p>
                    </div>
                    <div class="col-md-6">
                        <p style="padding-top: 20px; font-weight: 400; font-size: 16px;">स्टाफ कलेजद्वारा प्रधानसेनापति र सशस्त्रका आईजीपी सम्मानित</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Closed -->

    <?php require_once 'inc/footer.php' ?>