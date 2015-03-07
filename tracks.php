<?php include "header.php"; ?>
<?php include "config.php"; 
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
      function list_tracks() {
      $output = "";
      $result = mysql_query("SELECT * FROM track ORDER BY name ASC");
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
</div>
<div class="col-md-2">
</div>
<?php include "footer.php"; ?>