<?php 
$title = "Login";
include('header.php'); ?>
<?php
    include "config.php";
    session_start();
    if(isset($_POST['submit']) && empty($_SESSION['logged_in']))
    {
    $user=$_POST['username'];
    $pass=$_POST['pass'];
    $result = mysql_query("SELECT * FROM member WHERE username='".$user."'");
    $row = mysql_fetch_array($result);
    if($row[1]==SHA1($pass)){
        $_SESSION['logged_in'] = 1;
        $_SESSION['username'] = $user;
        $_SESSION['user_id'] = $row[3];
        header("Location: home.php");
        die();
    }
    else
        echo "Wrong password..!";
    }

    if (!empty($_SESSION['logged_in'])) {
        echo "You are logged in.";
        header("Location: home.php");
        exit;
    }
?>

    <!-- Page Content -->
    <div class="container">
        <div class="row clearfix">
                <div class="col-md-4 column">
                </div>
                <div class="col-md-4 column">
                    <form role="form" action="" method="post">
                        <div class="form-group">
                             <label>Username</label><input class="form-control" type="text" name="username">
                        </div>
                        <div class="form-group">
                             <label for="exampleInputPassword1">Password</label><input class="form-control" id="exampleInputPassword1" type="password" name="pass">
                        </div>
                        <div class="checkbox">
                             <label><input type="checkbox">Rememeber Me</label>
                        </div> <button type="submit" name="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
                <div class="col-md-4 column">
                </div>
            </div>
    </div>
<?php include('footer.php'); ?>
