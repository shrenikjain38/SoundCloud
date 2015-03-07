<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title; session_start();?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <!-- <link href="css/logo-nav.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<!-- Navigation -->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
   <div class="navbar-header">
      <a class="navbar-brand" href="#">SoundCloud</a>
   </div>
   <div>
      <ul class="nav navbar-nav">
         <li><a href="/tracks.php">Tracks</a></li>
        
         <?php if (!$_SESSION['logged_in']) 
         {
        ?>
         <li><a href="/index2.php">Login</a></li>
         <li><a href="/register.php">Register</a></li>

         <?php
         }
         else{
          ?>
          <li><a href="/home.php">Home</a></li>
          <li><a href="/editprofile.php">Edit Profile</a></li>
          <li><a href="/upload.php">Upload</a></li>
         <li><a href="/playlist.php">My Playlists</a></li>
          <?php
         }
         ?>
          <?php if ($_SESSION['logged_in']) 
         {
        ?>
          
      </ul>
      <ul class="nav navbar-nav navbar-right">
       <li><a href="/logout.php">Logout&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></li>
      
    </ul>
    <?php } ?>
   </div>
</div>

<!--<script>
  $('.nav navbar-nav').on('click','li', function(){
   $(this).addClass('active').siblings().removeClass('active');
});
</script>-->



