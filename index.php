<?php
include "inc/header.php";
?>
<?php 
include "inc/slider.php";
?>

	<div class="containsection contempleate clear">
		<div class="maincontain clear">

			<!--Pagination -->
			<?php 
				$per_page = 3;
				if (isset($_GET['page'])) {
					$page = $_GET['page'];
				}else{
					$page = 1;
				}
				$start_from =($page-1) * $per_page ;
			 ?>
			<!--Pagination End-->

		<?php 
			$query = "SELECT * FROM tbl_post LIMIT $start_from, $per_page";
			$post = $db->select($query);

			if ($post) {
				while ($result = $post->fetch_assoc()) {
			
		?>
				<div class="samepost clear">
							<h2><a style="text-decoration: none;" href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['taital']; ?></a></h2>
							<h3><?php echo $fm->formatDate($result['date']); ?>,By <a style="text-decoration: none; color: green" href="#"><?php echo $result['author']; ?></a></h3>
							<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/upload/<?php echo $result['image'] ?>" alt="post image" /></a>
							<p>	
								<?php echo $fm->textShorten($result['body']); ?>
							</p>
							<div class="readmore clear">
								<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
							</div>
							
				</div>
			<!--While loop-->
		<?php } ?>
			<!--While loop End-->

			<!--Pagination-->
			<?php 
			$query  = "SELECT * FROM tbl_post";
			$result = $db->select($query); 
			$total_row = mysqli_num_rows($result);
			$tatal_page = ceil($total_row/$per_page);
				echo "<span class='pagination'><a href='index.php?page=1'>".'First Page'."</a>";
			
			for ($i=1; $i <= $tatal_page; $i++) { 
				echo "<a href='index.php?page=".$i."'>".$i."</a>";
			};
			 echo "<a href='index.php?page=$tatal_page'>".'Last Page'."</a></span>"; ?>
			<!--Pagination End-->

		<?php /*End While loop*/ }else{ echo "<script>window.location = '404.php';</script>";} ?>
			
			
		</div>
<?php 
	include "inc/sidebar.php";
 ?>

<?php 
	include "inc/footer.php";
?>