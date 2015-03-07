<?php 
session_start();
// include('header.php');
$id = $_GET['id'];
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
  	$query = mysql_query("SELECT username,name FROM member WHERE id = '".$_GET['id']."'");
      $uname = mysql_fetch_array($query);
      echo '<h1>'. $uname['username'].'</h1>';
      echo '<h1>'. $uname['name'].'</h1>';
      $title=$uname['name'].'\'s Profile';
      include('header.php');

      function list_tracks() {
      $output = "";

      $result = mysql_query("SELECT * FROM track WHERE acc_id = '".$_GET['id']."'");
      while ($row = mysql_fetch_array($result)){
      $output .= '
      <tr> 
      <td>' . $row['name'] . '</td>
      <td>' . $row['artist'] . '</td>                                                   
      <td>' . $row['listens'] . '</td>';
      
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
<div class="col-md-4"></div>
	<div class="col-md-1"></div>
<div class="btn-group">
<?php 
$q="SELECT * FROM followers where acc_id = ".$_SESSION['user_id']." and follow_id = ".$_GET['id'];

$result1 = mysql_query($q);
$row1 = mysql_fetch_array($result1);
       $abc=mysql_num_rows($result1);
     
        if($abc==1){
echo '<a href="/unfollow.php?id='.$id.'">';
echo '<button type="submit"  class="btn btn-default">Unfollow!</button></a>';
}
else
{
echo '<a href="/followers.php?id='.$id.'">';
  echo '<button type="submit"  class="btn btn-default">Follow!</button></a>';
}?>
  </div>

</div>


<div class="col-md-2">
</div>


<?php include('footer.php'); ?>
