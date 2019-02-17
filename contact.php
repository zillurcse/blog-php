<?php
include "inc/header.php";
?>
<?php 

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$firstname = $fm->validation($_POST['firstname']);
			$lastname  = $fm->validation($_POST['lastname']);
			$email     = $fm->validation($_POST['email']);
			$body      = $fm->validation($_POST['body']);

			$firstname = mysqli_real_escape_string($db->link, $firstname);
			$lastname  = mysqli_real_escape_string($db->link, $lastname);
			$email     = mysqli_real_escape_string($db->link, $email);
			$body      = mysqli_real_escape_string($db->link, $body);

			$error = "";
			if (empty($firstname)) {
				$error = "First name must not be empty !";
			}
			elseif (!filter_var($firstname, FILTER_SANITIZE_SPECIAL_CHARS)) {
				$error = "Invalid Name !";
			}
			elseif (empty($lastname)) {
				$error = "Last name must not be empty !";
			}elseif (empty($email)) {
				$error = "Email field must not be empty !";
			}
			elseif (empty($email)) {
				$error = "Email field must not be empty !";
			}
			elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = "Invalid Email address !";
			}
			elseif (empty($body)) {
				$error = "Message field must not be empty !";
			}else{
				$query = "INSERT INTO `tbl_contact`(`firstname`,`lastname`,`email`,`body`) VALUES('$firstname', '$lastname', '$email', '$body')";
                $inserted_rows = $db->insert($query);
                if ($inserted_rows) {
                 $msg = "Message Send Successfully.";
                }else {
                 $error = "Message Send Not Send !";
                }
			}
		}
?>
<div class="containsection contempleate clear">
	<div class="maincontain templeate clear">
		<div class="about">
			<h2>Contact US</h2>
			<?php  
				if (isset($error)) {
					echo "<span style=' color:red'>$error</span>";
				}
				if (isset($msg)) {
					echo "<span style=' color:green'>$msg</span>";
				}
			?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name :</td>
					<td>
						<input type="text" name="firstname" placeholder="Enter Your First Name">
					</td>
				</tr>

				<tr>
					<td>Your Last Name :</td>
					<td>
						<input type="text" name="lastname" placeholder="Enter Your Last Name">
					</td>
				</tr>
				<tr>
					<td>Your Email : </td>
					<td>
						<input type="email" name="email" placeholder="Enter Your Email">
					</td>
				</tr>
				<tr>
					<td>Message :</td>
					<td>
						<textarea name="body">
							
						</textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="submit" name="submit" value="Send">
					</td>
				</tr>
			</table>
			</form>
			
			
			
		</div>

	</div>
	<?php 
	include "inc/sidebar.php";
	?>

	

</div>
</div>
<?php
include "inc/footer.php";
?>