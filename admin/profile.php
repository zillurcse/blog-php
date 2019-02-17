<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php  
	$userid   = Session::get('userId');
	$userrole = Session::get('userRole');
?>
<div class="grid_10">
	<div class="box round first grid">
		<h2>Update Post</h2>
		<?php 
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$name = mysqli_real_escape_string($db->link, $_POST['name']);
			$userName    = mysqli_real_escape_string($db->link, $_POST['userName']);
			$email   = mysqli_real_escape_string($db->link, $_POST['email']);
			$detials   = mysqli_real_escape_string($db->link, $_POST['detials']);
			
			$query = "UPDATE tbl_user
			SET
			name	 = '$name',
			userName = '$userName',
			email    = '$email',
			detials  = '$detials'
			WHERE id ='$userid'";
			$updated_rows = $db->update($query);
			if ($updated_rows) 
			{
				echo "<span class='success'>User Data Update Successfully. </span>";
			}
			else 
			{
				echo "<span class='error'>User Data Not Update !</span>";
			}
		}


?>
			<div class="block">  
				<?php  
				$query   = "SELECT *  FROM tbl_user WHERE id='$userid' AND role='$userrole'";
				$getuser = $db->select($query);
				if ($getuser) {
				while ($result = $getuser->fetch_assoc()) {

					?>             
					<form action="" method="post" enctype="multipart/form-data">
						<table class="form">

							<tr>
								<td>
									<label>Name</label>
								</td>
								<td>
									<input type="text" name="name" value="<?php echo $result['name'] ?>" class="medium" />
								</td>
							</tr>

							<tr>
								<td>
									<label>User Name</label>
								</td>
								<td>
									<input type="text" name="userName" value="<?php echo $result['userName'] ?>" class="medium" />
								</td>
							</tr>

							<tr>
								<td>
									<label>Email</label>
								</td>
								<td>
									<input type="text" name="email" value="<?php echo $result['email'] ?>" class="medium" />
								</td>
							</tr>

							<tr>
								<td style="vertical-align: top; padding-top: 9px;">
									<label>Detials</label>
								</td>
								<td>
									<textarea class="tinymce" name="detials">
										<?php echo $result['detials'] ?>
									</textarea>
								</td>
							</tr>
							<tr>
								<td></td>
								<td>
									<input type="submit" name="submit" Value="Update" />
								</td>
							</tr>
							</table>
						</form>
					<?php } } ?>
				</div>
			</div>
		</div>
		<!-- Load TinyMCE -->
		<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				setupTinyMCE();
				setDatePicker('date-picker');
				$('input[type="checkbox"]').fancybutton();
				$('input[type="radio"]').fancybutton();
			});
		</script>
		<!-- Load TinyMCE -->
		<?php include 'inc/footer.php';?>


