<meta charset="UTF-8">

<meta name="description" content="It is website is my blog">
<?php  
	if (isset($_GET['id'])) {
	   $keywordid = $_GET['id'];
	   $query = "SELECT * FROM tbl_post WHERE id='$keywordid'";
       $Keyword = $db->select($query);
       if ($Keyword) {
       		while ($result = $Keyword->fetch_assoc()) { ?>
		<meta name="keywords" content="<?php echo $result['tags'] ?>">

       		<?php } } }else{ ?>
				<meta name="keywords" content="<?php echo KEYWORDS ?>">
       		<?php  } ?>

<meta name="author" content="Zillur">
<?php  
if (isset($_GET['pageid'])) {
$pagetitleid = $_GET['pageid'];
$query = "SELECT * FROM tbl_page WHERE id='$pagetitleid'";
$page = $db->select($query);
if ($page) {
    while ($result = $page->fetch_assoc()) { ?>
	<title><?php echo $result['name']; ?>-<?php echo TITLE; ?></title>

  <?php } } }elseif(isset($_GET['id'])) {
$postid = $_GET['id'];
$query = "SELECT * FROM tbl_post WHERE id='$postid'";
$post = $db->select($query);
if ($post) {
    while ($result = $post->fetch_assoc()) { ?>
	<title><?php echo $result['taital']; ?>-<?php echo TITLE; ?></title>

  <?php } } } else { ?>
	<title><?php echo $fm->title(); ?>-<?php echo TITLE; ?></title>
<?php } ?>