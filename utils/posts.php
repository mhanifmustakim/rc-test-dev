<?php
    $user_id = $_SESSION['user_id'];

    $posts = POST::posts();
    foreach($posts as $post) { 
        $post_user = User::getData($post->user_id) ;
        $timeAgo = Post::getTimeAgo($post->post_on) ; 
        // $likes_count = Post::countLikes($post->id) ;
        // $user_like_it = Post::userLikeIt($user_id ,$post->id);
        $post_link = $post->id;
        // $comment_count = Post::countComments($post->id); 
?>
<!-- ------------VIEW-----------     -->
<div style="background-color: red">
    <a href="post/<?php echo $post_link; ?>">View post</a>
    <div style="background-color: orange">
        <a href="user/<?php echo $post_user->username; ?>">
            <!-- <img src="assets/images/users/
            <?php echo $post_user->img; ?>
            " alt="" class="img-user-tweet" /> -->
        </a>

        <div style="background-color: yellow">
            <p>
                <a href="user/<?php echo $post_user->username;  ?>">
                    <strong>
                        @<?php echo $post_user->username ?>
                    </strong>
                </a>
                <span>
                    <?php echo $timeAgo ?>
                </span>
            </p>

            <?php if ($post->img != null) { ?>
            <p>
                <!-- <img src="assets/images/tweets/
                <?php echo $post->img; ?>
                " alt="" class="img-post-tweet" /> -->
            </p>
            <?php } ?>

            <div style="background-color: green">
                <div style="background-color: blue">
                    <div style="background-color: indigo" 
                    data-user="<?php echo $user_id; ?>"
                    data-post="<?php echo $post->id; ?>">
                        <!-- <i class="far fa-comment"></i> -->
                        <div style="background-color: violet">
                            <p>
                                10
                                <!-- <?php if($comment_count > 0) echo $comment_count; ?> -->
                            </p>
                            <h2>
                                <?php $post->header?>
                            </h2>
                            <p>
                                <?php $post->content?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="grid-box-reaction">
                    <a class="hover-reaction hover-reaction-like 
    <?= $user_like_it ? 'unlike-btn' : 'like-btn' ?> " data-tweet="<?php 
    if($retweet_sign) {
        if($retweet->tweet_id != null) {
        echo $retweet->tweet_id;
        } echo $retweet->retweet_id;
    }  else echo $tweet->id ;
    //  echo Tweet::likedTweetRealId($tweet->id);

    ?>" data-user="<?php echo $user_id; ?>">


                        <i class="fa-heart <?= $user_like_it ? 'fas' : 'far mt-icon-reaction' ?>"></i> -->
                        <!-- <i class="fas fa-heart liked"></i> -->

                        <!-- <div class="mt-counter likes-count d-inline-block">
                            <p>
                                <?php if($likes_count > 0)  echo $likes_count ; ?>
                            </p>
                        </div>
                    </a>


                </div>

                <div class="grid-box-reaction">
                    <div class="hover-reaction hover-reaction-comment">

                        <i class="fas fa-ellipsis-h mt-icon-reaction"></i>
                    </div>
                    <div class="mt-counter">
                        <p></p>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>

<!-- 
<div class="popupTweet">

</div>
<div class="popupComment">

</div> -->
<?php } ?>