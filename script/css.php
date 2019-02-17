<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/fontawesome.css">
<link rel="stylesheet" href="css/style.css">
<?php 
	$query = "SELECT * FROM tbl_them WHERE id='1'";
	$them = $db->select($query);
	while ($result = $them->fetch_assoc()) {
			if ($result['theme'] == 'default') { ?>
		<link rel="stylesheet" href="thems/default.css">
			<?php }elseif ($result['theme'] == 'green') { ?>

				<link rel="stylesheet" href="thems/green.css">

			<?php }elseif ($result['theme'] == 'red') { ?>
		<link rel="stylesheet" href="thems/red.css">
			<?php } } ?>
				
