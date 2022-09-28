<?php 
	include '../init.php';
	$user_id = $_SESSION['user_id'];
	// Comment place
	if(isset($_POST['comment']) && isset($_POST['post_id']) && isset($_POST['submit'])){
		$post_id  = $_POST['post_id'];
        $post = Post::getData($post_id);
		$get_id = $post->user_id;
		$comment   = User::checkInput($_POST['comment']);
        date_default_timezone_set("Asia/Kuala_Lumpur");
			
        $data = [
				'user_id' => $_SESSION['user_id'],
                'post_id' => $post_id,
                'comment' => $comment,
				'time' => date("Y-m-d H:i:s"),
		];
		
        User::create('comments' , $data);
        header("location: ../../post.php?id=".$post_id);
        return;
	} else header("location: ../../post.php?id=".$post_id);

	// if(isset($_POST['reply']) && !empty($_POST['reply'])){
	// 	$tweet_id  = $_POST['reply'];
	// 	$get_id    = $_POST['user_id'];
	
	// 	$comment   = User::checkInput($_POST['comment']);

	// 		date_default_timezone_set("Africa/Cairo");
          
		
	// 		$data = [
	// 			'user_id' => $_SESSION['user_id'] , 
    //             'comment_id' => $tweet_id , 
    //             'reply' => $comment , 
	// 			'time' => date("Y-m-d H:i:s") ,
	// 		];
	// 	    if ($comment != '') { 
	// 			// notification
	// 			$for_user = Tweet::getComment($tweet_id)->user_id;
	// 			$target = Tweet::getComment($tweet_id)->post_id;
		
	// 			if($for_user != $user_id) {
	// 				$data_notify = [
	// 				'notify_for' => $for_user ,
	// 				'notify_from' => $user_id ,
	// 				'target' => $target , 
	// 				'type' => 'reply' ,
	// 				'time' => date("Y-m-d H:i:s") ,
	// 				'count' => '0' , 
	// 				'status' => '0'
	// 				];
			
	// 				Tweet::create('notifications' , $data_notify);
					
	// 			} 
    //             //  end
				
	// 	     User::create('replies' , $data);
	// 		}
	// }
?>