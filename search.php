<?php
include "inc/header.php";
?>

<?php 
if (!isset($_GET['search']) || $_GET['search'] == NULL) {
	echo "<script>window.location = '404.php';</script>";
}else{
	$search = $_GET['search'];
}
?>
<div class="containsection contempleate clear">
	<div class="maincontain clear">
		
			<?php 
				$query = "SELECT * FROM tbl_post WHERE taital LIKE '%$search%' OR body LIKE '%$search%'";
				$post = $db->select($query);

			if ($post) {
				while ($result = $post->fetch_assoc()) {

					?>
					<div class="samepost clear">
								<h2><a style="text-decoration: none; color: #333" href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['taital']; ?></a></h2>
								<h3><?php echo $fm->formatDate($result['date']); ?>,By <a style="text-decoration: none; color: #333" href="#"><?php echo $result['author']; ?></a></h3>
								<a href="#"><img src="admin/upload/<?php echo $result['image'] ?>" alt="post image" /></a>
								<p>	
									<?php echo $fm->textShorten($result['body']); ?>
								</p>
						<div class="readmore clear">
							<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
						</div>

					<?php }/*End While loop*/ }else{ ?>
						<p>Your Serach Query Not Found !!</p>
					<?php } ?>
				   </div>

		

		</div>
	
</div>
	<?php 
	include "inc/sidebar.php";
	?>
	<?php 
	include "inc/footer.php";
	?>