<div class="saidbar templeate clear">

	<div class="samesidebar clear">
		<h2>Categoris</h2>
		
		<ul>

			<?php 
			$query = "SELECT * FROM tbl_catagory";
			$catagory = $db->select($query);

			if ($catagory) {
				while ($result = $catagory->fetch_assoc()) {

					?>
					<li><a href="posts.php?catagory=<?php echo  $result['id'];?>"><?php echo $result['name']; ?></a></li>
					
				<?php } } else{ ?>
					<li>No Catagory Created !!</li>

				<?php } ?>
			</ul>
		</div>

		<div class="samesidebar clear">

			<h2>Popular Articals</h2>

			<?php 
			$query = "SELECT * FROM tbl_post LIMIT 5";
			$post = $db->select($query);

			if ($post) {
				while ($result = $post->fetch_assoc()) {

					?>
					
					<div class="popular clear">
						<h3>
							<a style="text-decoration: none; color: #333" href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['taital']; ?></a>
						</h3>
						<a href="post.php?id=<?php echo $result['id']; ?>">
							<img src="admin/upload/<?php echo $result['image'] ?>" alt="Popular image" />
						</a>

						<p>	
							<?php echo $fm->textShorten($result['body'], 130); ?>

						</p>

					</div>

				<?php }/*End While loop*/ }else{ echo "<script>window.location = '404.php';</script>";} ?>

			</div>
		</div>
		