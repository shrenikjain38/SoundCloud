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
  	
      include('header.php');

      function list_tracks() {
      $output = "";
      $play_id=$_GET['id'];;
      $track_id = mysql_query("SELECT * FROM track");

	while($row = mysql_fetch_array($track_id))
	{
		// $output = "";
	$track_id1 = mysql_query("SELECT * FROM playlist_track WHERE play_id = '".$play_id."'");
	$abc=mysql_num_rows($track_id1);
	// echo $abc;
		$track_id1 = mysql_query("SELECT * from playlist_track where play_id = '".$_GET['id']."' and track_id = '".$row['id']."'");
	$abc1=mysql_num_rows($track_id1);

		if(!$abc1)
		{
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
</script></td>
<td><a href="/add_track.php?t_id='.$row['id'].'&plid='.$_GET['id'].'">
<button type="submit"  class="btn btn-default">Add to Playlist</button></a></td>';
      
		$output.= '</tr>';
      }}
      return $output;
     }
     echo list_tracks();
?>
</tbody>
</table>
<div class="col-md-2">
</div>
<?php include('footer.php'); ?>

