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