<?php 

// include('header.php');
session_start();

$user_id = $_SESSION['user_id'];
// echo $id;
?>
<div class="col-md-2">
</div>
<div class="col-md-8">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Track Name</th>
      <th>Artist</th>
      <th>Listens</th>
    </tr>
  </thead>
  <tbody>
  	<?php
  	include "config.php";
  	$query = mysql_query("SELECT username,name FROM member WHERE id = '".$_SESSION['user_id']."'");
      $uname = mysql_fetch_array($query);
      echo '<h1>'. $uname['username'].'</h1>';
      echo '<h1>'. $uname['name'].'</h1>';
      $title='Home';
      include('header.php');

      function list_tracks() {
      $output = "";
       // $result1 = mysql_query("SELECT * FROM track WHERE acc_id = '".$_SESSION['user_id']."'");
       // $row1 = mysql_fetch_array($result1);
       // $abc=mysql_num_rows($result1);
      // echo $abc;
      $result = mysql_query("SELECT * FROM track WHERE acc_id = '".$_SESSION['user_id']."'");
      while ($row = mysql_fetch_array($result)){
      $output .= '
      <tr> 
      <td>' . $row['name'] . '</td>
      <td>' . $row['artist'] . '</td>                                                   
      <td>' . $row['listens'] . '</td>
     
 <td>
 <audio controls preload="none" onloadeddata="myFunction()" >
  <source src="tracks/'.$row['path'].'" type="audio/mp3">

  
</audio> 

<script>
function myFunction() {
    alert("The video is now playing");
}
function pausefunc() {
    alert("The video ispaused");
}
</script></td>';
      if(!empty($_SESSION['logged_in']))
      	$output.= '<td><a href="/download.php?id=' . $row['id'] . '">Download Now!</a></td>';
		$output.= '</tr>';
      }
      return $output;
     }
     echo list_tracks();
?>
</tbody>
</table>



<div class="col-md-2">
</div>


<?php include('footer.php'); ?>
