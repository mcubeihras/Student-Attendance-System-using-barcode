<?php
session_start();
  require_once ('conf/connaction.php'); 


if(isset($_SESSION['userid']))
{

  $userid=$_SESSION['userid'];

  $sql="SELECT * FROM user_table WHERE uid='".$_SESSION['userid']."'";
      
    $runQuery =  mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($runQuery);
    $numRow = mysqli_num_rows($runQuery);
      
      if($numRow > 0)
        {
          //echo "You Have Succesfully Login";
          $user=$row['user_login'];
          //header('Location: ../admin/docs/dashbord.php');
          //exit();
        }
}
      else
        { 
          header('Location:Login/index.php'); 
        }
?>


<html>

  <head>
  	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <title>ATI-ASRS</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main_lock2.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="../../Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    
  </head>
  
  <body>

    <section class="material-half-bg">
      <div class="cover">
      </div>
    </section>

    <section class="lockscreen-content">
      <div class="logo">
        <h1>ATI-ASRS</h1>
      </div>

      <div class="lock-box">

        <img class="rounded-circle user-image" src="assets/img/48.jpg">
        <p class="u_name"><?php echo $user; ?><p>
        <p class="a_lock">Account Locked</p>

        <form class="unlock-form">
          
          <div class="form-group">
            <input class="form-control" type="password" placeholder="Password" autofocus required>
          </div>
          
          <br>
          
          <div class="form-group btn-container">
          	<center>
            <button class="btn btn-primary btn-block" type="submit" value="submit">
            <i class="fa fa-unlock fa-lg"></i> &nbsp; UNLOCK </button>
            </center>
          </div>
          
        </form>
		<br>
        <p align="center"><a href="../../Login/index.php">Not Dilshan ? Login Here.</a></p>

      </div>
    </section>

  </body>

</html>