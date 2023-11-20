<!DOCTYPE html>
<?php
session_start();
include("include/connection.php");
if(isset($_SESSION['user_email'])){
    header("location: signin.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <title>Document</title>
</head>
<body>
    <div class="container main-section">
        <div class="row">
           <div class="col-md-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <center><a href="include/find_friends.php"><button class="btn btn-default search-icon" name="search_user" type="submit">Add new user</button></a></center>
            
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php include("include/get_user_data.php");?>
                    </ul>
                </div>
          </div>
          <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
            <div class="row">
                <!-- getting the user information-->
                <?php
                // $user = $_SESSION['user_email'];
                $get_user = "select * from users where user_email = '$user'";
                $run_user = mysqli_query($con,$get_user);
                $row = mysqli_fetch_array($run_user);
                
                $user_id = $row['user_id'];
                $user_name = $row['user_name'];
                ?>
                <!-- gettingn the user data on click -->
                <?php
                if(isset($GET['user_name'])){
                    global $con;
                    $get_username = $_GET['user_name'];
                    $get_user = "select * from user where user_name = '$get_username'";
                    $run_user = mysqli_query($con,$get_user);
                    $row_user = mysqli_fetch_array($run_user);
                    $username =  $row_user['user_name'];
                    $user_profile_image = $row_user['user_profile'];


                }
                $total_messages =  "select * from user_chat where (sender_username = '$user_name' AND receiver_username ='$user_name')OR(receiver_username='$user_name'AND sender_username='$user_name')";
                $run_messages = mysqli_query($con,$total_messages);
                $total = mysqli_num_rows($run_messages);
                ?>
                 <div class="col-md-12 right-header">
                    <div class="right-header-img">
                        <img src="<?php echo"$user_profile_image";?>">

                    </div>
                    <div class="right-header-detail">
                        <form method="post">
                            <p><?php echo "$username";?></p>
                            <span><?php echo $total;?>messages</span>&nbsp &nbsp
                            <button name="logout" class="btn btn-danger">logout </button>
                        </form>
                        <?php
                        if(isset($_POST['logout'])){
                            $update_msg =mysqli_query($con,"UPDATE users SET log_in='offline' WHERE user_name='$user_name'");
                            header("location:logout.php");
                            exit();
                        }
                        ?>
                    </div>
                 </div>
            </div>
              <div class="row">
                <div id="scrolling_to_bottom" class="col-md-12 right-header-contentChat">
                    <?php
                    $update_msg =mysqli_query($con,"UPDATE user_chat SET msg_status='read' WHERE sender_username='$username'");
                    $sel_msg = "select * from user_chat where (sender_username='$user_name' AND receiver_username='$username') OR (receiver_username='$user_name'
                    AND sender_username='$username') ORDER by 1 ASC ";
                    $run_msg = mysqli_query($con,$sel_msg);
                    while($row = mysqli_fetch_array($run_msg)){
                        $sender_username = $row['sender_username'];
                        $receiver_username = $row['receiver_username'];
                        $msg_content = $row['msg_content'];
                        $msg_date = $row['msg_date'];
                    }
                    ?>
                    <ul>
                        <?php
                        if($user_name == $sender_username AND $username == $receiver_username){
                            echo "
                            <li>
                            <div class='rightside_chat'>
                            <span> $username <small>$msg_date</small></span>
                            <p> $msg_content</p>
                            </div>
                            </li>
                            ";
                        }
                        if($user_name == $receiver_username AND $username == $sender_username){
                            echo "
                            <li>
                            <div class='rightside_chat'>
                            <span> $username <small>$msg_date</small></span>
                            <p> $msg_content</p>
                            </div>
                            </li>
                            ";
                        }
                        ?>
                    </ul>
                </div>
              </div>
              <div class="row">
                  <div class="col-md-12 right-chat-textbox">
                     <form method="post">
                        <input autocomplete="off" type="text" name="msg_content" placeholder="write your message....">
                        <button class="btn" name="submit"><i class="fa fa-telegram" aria-hidden="true"></i></button>
                     </form>
                  </div>
              </div>
          </div>
      </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $msg = htmlentities($_POST['msg_content']);
        if($msg == ""){
            echo "
               <div class='alert a;ert-danger'>
                   <strong><center>Message was unable to send </center></strong>
                </div>
            ";
        }
        else if(strlen($msg) > 100){
            echo "
               <div class='alert alert-danger'>
                   <strong><center>Message is too long.use only 100 characters</center></strong>
                </div>
            ";  
        }
        else{
            $insert = "insert into user_chat(sender_username,receiver_username,msg_content,msg_status,msg_date) values('$user_name','$username','$msg','unread',NOW())";
            $run_insert = mysqli_query($con,$insert);
        }
    }
    ?>
</body>
</html>