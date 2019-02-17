<?php 
	include "config/config.php";
	include "lib/Database.php";
	include "helpers/Format.php";
 ?>
 <?php 
	$db = new Database();
	$fm = new Format();

 ?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'script/meta.php'; ?>
<?php include 'script/css.php'; ?>
<?php include 'script/js.php'; ?>
	
</head>
<body style="font-family: 'Raleway', sans-serif; 
  font-size: 14px; line-height: 18px; 
  background: url(img/full-bloom.png)repeat fixed 0 0 #fff; 
  position: relative;">
	<div class="headersection templeate clear">
		<div class="logo">
			<?php  
				$query = "SELECT * FROM title_slogan WHERE id='1'";
				$blog_title = $db->select($query);
				if ($blog_title) {
					while ($result = $blog_title->fetch_assoc()) {

			?>
			<img src="admin/<?php echo $result['image'] ?>" alt="LOGO"/>
			<h2><?php echo $result['title'] ?></h2>
			<p><?php echo $result['slogan'] ?></p>
		<?php } } ?>
		</div>
<?php  
/*Social Link*/
    $query = "SELECT * FROM tbl_social WHERE id='1'";
    $social = $db->select($query);
    if ($social) {
    while ($result = $social->fetch_assoc()) {

?>      
   
		<div class="social" style="margin-top: 25px">
			<a target="_blank" href="<?php echo $result['fb'] ?>"><i class="fa fa-facebook"></i></a>
			<a target="_blank" href="<?php echo $result['tw'] ?>"><i class="fa fa-twitter"></i></a>
			<a target="_blank" href="<?php echo $result['ln'] ?>"><i class="fa fa-linkedin"></i></a>
			<a target="_blank" href="<?php echo $result['gp'] ?>"><i class="fa fa-google-plus"></i></a>
		</div>
<?php } } ?>
		<div class="searchbtn templeate" style="  margin-top: 65px; margin-left: 760px;">
			<form action="search.php" method="get">
				<input style="font-size: 16px; height: 30px; width: 200px" type="text" name="search" placeholder="Search Keyword....">
				<input type="submit" name="submit" value="Search">
			</form>
		</div>
		
	</div>

	<div class="navsection templeate">
		<ul>
			<?php  
				$path = $_SERVER['SCRIPT_FILENAME'];
				$currentpage = basename($path, '.php');
			?>
			<li><a 
				<?php  
					if ($currentpage == 'index') {
					echo 'id="active"';
					}
				?>
				 href="index.php">HOME</a>
				
			</li>
		<?php  
		    $query = "SELECT * FROM tbl_page";
		    $page = $db->select($query);
		    if ($page) {
		        while ($result = $page->fetch_assoc()) {
		?>
		<li><a 
			<?php  
				if (isset($_GET['pageid']) && $_GET['pageid'] == $result['id']  ) {
					echo 'id="active"';
				}
			?>
			href="page.php?pageid=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a> </li>

		 <?php } } ?>
			 
			<li><a 
				<?php  
					if ($currentpage == 'contact') {
					echo 'id="active"';
					}
				?>
				href="contact.php">CONTACT</a></li>
		</ul>
	</div>