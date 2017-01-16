
<div class="nav3">
	<h3>Categories</h3>
	<?php 
	include_once("config.php");
	include "dbconn.php";
   
    $query  = "SELECT * FROM categories";
	$result = @mysqli_query($MySQL, $query);
	while ($row = @mysqli_fetch_array($result)){
		echo '<ul><li><a href="index.php?menu=6&id=' . $row['id'] . '">' . $row['name'] . '</a></li></ul>';						
			}

  print '</div>';
 
print '<div class="gallerycontainer">';
$category = $_GET['id'];
$query  = "SELECT * FROM images WHERE category_id = $category";
$result = @mysqli_query($MySQL, $query);

$rows = @mysqli_fetch_all($result, MYSQLI_ASSOC);

if(count($rows) == 0){
	echo "There are no images";
}
foreach ($rows as $row) {
	$img = $row['file'];
	echo '<img src="uploads/' . $img . '" class="gallery-img" height="200" width="300">';
}
print '</div>';

?>

