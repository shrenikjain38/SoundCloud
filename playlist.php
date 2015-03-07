<?php 
$title="My Playlists";
 include('header.php');
session_start();

$user_id = $_SESSION['user_id'];
echo "<h2>My Current Playlists</h2>";
?>
<div class="col-md-2">
</div>
<div class="col-md-8">
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Playlist</th>
      <th>Number of Tracks</th>
      <th></th>
      
    </tr>
  </thead>
  <tbody>
  	<?php
  	include "config.php";
  // $query = mysql_query("SELECT * FROM playlist WHERE acc_id = '".$_SESSION['user_id']."'");
      // $uname = mysql_fetch_array($query);
     
      

      function list_tracks() {
      $output = "";

      $result = mysql_query("SELECT * FROM playlist WHERE acc_id = '".$_SESSION['user_id']."'");
      $i=1;
      while ($row = mysql_fetch_array($result)){
      $output .= '
      <tr> 
      <td><a href="/viewplaylist.php?id='.$row['play_id'].'">Playlist '.$i++.'</td></a>';
      
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
	<a href="/newplaylist.php">
		<button type="submit"  class="btn btn-default">Create New</button></a>
	</div>
</div>
<?php include('footer.php'); ?>