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
  <a href="/add_pl_track.php?id=<?php echo $_GET['id'];?>">
<button type="submit"  class="btn btn-default">Add Tracks</button></a>
<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Track Name</th>
     
    </tr>
  </thead>
  <tbody>
  	<?php
  	include "config.php";
  	  $title='View Playlist';
      include('header.php');

      function list_tracks() {
      $output = "";
      $x=1;

      $result = mysql_query("SELECT * FROM playlist_track WHERE play_id = '".$_GET['id']."'");
      while ($row = mysql_fetch_array($result)){
         $result1 = mysql_query("SELECT * FROM track WHERE id = '".$row['track_id']."'");
         $row1 = mysql_fetch_array($result1);
      $output .= '
      <tr> 
                                                         
      <td>' . $row1['name'] . '</td>
      
 <td><audio controls preload="none" onloadeddata="myFunction()" >
  <source src="tracks/'.$row1['path'].'" type="audio/mp3">

  
</audio> 

<script>
function myFunction() {
    alert("The video is now playing");
}
function pausefunc() {
    alert("The video ispaused");
}
</script></td>
<td><a href="/delete_track.php?id='.$row['track_id'].'&plid='.$_GET['id'].'">
<button type="submit"  class="btn btn-default">Delete</button></a></td>
';
      
      
		$output.= '</tr>';
      }
      return $output;
     }
     echo list_tracks();
?>
</tbody>
</table>
 

<?php include('footer.php'); ?>
