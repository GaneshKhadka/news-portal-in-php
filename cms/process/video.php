<?php
    require "../../config/init.php";
    require "../inc/checklogin.php";

    // debug($_POST);
    // debug($_FILES);
    $video = new Video;

    if(isset($_POST) && !empty($_POST)){

        if(empty($_POST['title']) || empty($_POST['link'])){
            redirect('../video-form','error','Title and Link field are required.');
        }

        $video_id_from_link = getYoutubeVideoIdFromUrl($_POST['link']);

        if(!$video_id_from_link){
            redirect('../video-form','error','Video should be from youtube only.');
        }


        $data = array(
            'title' => sanitize($_POST['title']),
            'link' => sanitize($_POST['link']),
            'video_id' => $video_id_from_link,
            'summary' => sanitize($_POST['summary']),
            'status' => sanitize($_POST['status']),
        );

        $video_id = (isset($_POST['video_id']) && !empty($_POST['video_id'])) ? (int)$_POST['video_id'] : null;
        if($video_id){
            // update
            $act = "updat";
            $video_id = $video->updateData($data, $video_id);

        }else{
            // add
            $act = "add";
            $data['added_by'] = $_SESSION['user_id'];
            $video_id = $video->insertData($data);

        }

        if($video_id){
            redirect('../video.php','success','Video '.$act.'ed successfully.');
        } else {
            redirect('../video.php','error','Sorry! There was problem while '.$act.'ing video.');
        }

    } else if(isset($_GET['id']) && !empty($_GET['id'])){
        $id = (int)$_GET['id'];
        if($id <= 0){
            redirect("../video.php","error","Invalid Video id.");
        }
        $cat_info = $video->getRowById($id);
        if(!$cat_info){
            redirect("../video.php","error","Video does not exists or has been already deleted.");
        }

        $del = $video -> deleteRowById($id);
        if($del){
            deleteImage($cat_info[0]->image,"video");
            redirect("../video.php",'success','Video deleted successfully.');
        }else{
            redirect("../video.php",'error','Video could not be deleted at this moment.');
        }
    } else {
        redirect("../video.php","error","Please add data first.");
    }