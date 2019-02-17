<?php
include "inc/header.php";

?>

<?php 
        if (!isset($_GET['pageid']) || $_GET['pageid'] == NULL) {
            echo "<script>window.location = '404.php';</script>";
        }
        else{
            $id = $_GET['pageid'];
        }
?>
<?php  
	$query = "SELECT * FROM tbl_page WHERE id = '$id'";
	$page = $db->select($query);
	if ($page) {
	while ($result = $page->fetch_assoc()) {
?> 
<div class="containsection contempleate clear">
	<div class="maincontain templeate clear">
		<div class="about">
 
			<h2><?php echo $result['name']; ?></h2>
			<img src="img/Zillur1.png" alt="My Image" />
			<p>
				<?php echo $result['body']; ?>
			</p>

			
		</div>

	</div>

	<?php  } }else{ echo "<script>window.location = '404.php';</script>";} ?>
	<?php 
		include "inc/sidebar.php";
	?>
</div>
<?php
	include "inc/footer.php";

?>