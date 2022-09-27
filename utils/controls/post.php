<?php 
include '../init.php';
// require_once '../core/classes/image.php';

if (User::checkLogIn() === false) 
header('location: ../../index.php'); 

if (isset($_POST['post'])) {

    $header =  User::checkInput($_POST['header']);
    $content =  User::checkInput($_POST['content']);

    // $img = $_FILES['tweet_img'];
    
    // if ($_POST['status'] == '' && $img['name'] == '' ) {
    // $_SESSION['errors_tweet'] = ['status or image are required'];
    // header('location: ../home.php'); 
    // die();
    // }

    // $v = new Validator;
    // $v->rules('status' , $status , ['string' , 'max:14']);
    // if ($img['name'] != '') 
    //  $v->rules('image' , $img , ['image']);

    // $errors = $v->errors;
    
    // if ($errors == []) { 
        
        // if ($img['name'] != '') {
        // $image = new Image($img , "tweet"); 
        // $tweetImg = $image->new_name ;
       
        // } else $tweetImg = null;
        
       
        
        date_default_timezone_set("Asia/Kuala_Lumpur");
        $data = [
            'user_id' => $_SESSION['user_id'], 
            'post_on' => date("Y-m-d H:i:s"),
            'header' => $header,
            'content' => $content
        ];
        // create function can handle with all tables and return last inserted id
        $post_id =   User::create('posts' , $data);
        
        // notify users if mention!

        // preg_match_all("/@+([a-zA-Z0-9_]+)/i", $status, $mention);
        // $user_id = $_SESSION['user_id'];
        // foreach($mention[1] as $men) {
        //     $id = User::getIdByUsername($men);
        //     if($id != $user_id ) {
        //         $data_notify = [
        //             'notify_for' => $id ,
        //             'notify_from' => $user_id ,
        //             'target' => $post_id , 
        //             'type' => 'mention' ,
        //              'time' => date("Y-m-d H:i:s") ,
        //              'count' => '0' , 
        //              'status' => '0'
        //           ];
          
        //           Tweet::create('notifications' , $data_notify);
                
        //     } 
            
        // }
        // end notification
        //  add trends to database
        // preg_match_all("/#+([a-zA-Z0-9_]+)/i", $status, $hashtag);
       
        // if(!empty($hashtag) ){ 

        //     Tweet::addTrend($status);
        // }
        // end add trend
       
        header('location: ../../home.php');
        return;
    // } else {
    //     $_SESSION['errors_tweet'] = $errors;
    //     header('location: ../home.php');
    // }   
} else {
    header('location: ../../home.php');
    return;
};
?>