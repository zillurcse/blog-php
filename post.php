<?php
	include "inc/header.php";
?>
<?php 
	if (!isset($_GET['id']) || $_GET['id'] == NULL) {
		echo "<script>window.location = '404.php';</script>";
	}else{
		$id = $_GET['id'];
	}
 ?>

		<div class="containsection contempleate clear">
			<div class="maincontain templeate clear">
				<div class="about">
		<?php 
			$query = "SELECT * FROM tbl_post WHERE id = $id";
			$post = $db->select($query);

				if ($post) {
					while ($result = $post->fetch_assoc()) {
			
			?>
					<h2><?php echo $result['taital'] ?></h2>
					<h3><?php echo $fm->formatDate($result['date']); ?>,By <a style="text-decoration: none; color: green" href="#"><?php echo $result['author']; ?></a></h3>
					<img src="admin/upload/<?php echo $result['image'] ?>" alt="post image" />
					<p>
						<?php echo $result['body'] ?>
					</p>

				

					<div class="relatepost clear">
						<h2>Related Articals</h2>
						<?php
						 $cat_id = $result['cat'];
						 $queryrelated = "SELECT * FROM tbl_post WHERE cat = '$cat_id' ORDER By rand() LIMIT 6";
						 $related_post = $db->select($queryrelated);

							if ($related_post) {
								while ($related_result = $related_post->fetch_assoc()) {

						 ?>
						<a href="post.php?id=<?php echo $related_result['id']; ?>">
							<img src="admin/upload/<?php echo $related_result['image'] ?>" alt="My Image" />
						</a>
						<?php } }else{echo "No Related post Available !!";} ?>
					</div>
						<?php } /*End While loop*/ ?>
					<?php  }else{ echo "<script>window.location = '404.php';</script>";} ?>
				</div>

			</div>
		<?php 
			include "inc/sidebar.php";
		 ?>

		<?php 
			include "inc/footer.php";
		 ?>