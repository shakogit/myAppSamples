<?php if(!isset ($page_title)) {$page_title = 'Staff Area';}

?>
<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>GBI - <?php echo h( $page_title);?></title>
	<meta name="author" content="Your Name">
	<meta name="description" content="Example description">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="<?php echo url_for('/stylesheet/staff.css'); ?>">
	<link rel="icon" type="image/x-icon" href=""/>
</head>

<body>
	<header><h1>GBI Staff Area</h1></header>
	<main>
	    <ul>
	        <li><a href="<?php echo url_for('/staff/index.php');?>">MENU</a></li>
	    </ul>
	</main>	
	<h1></h1>
		
</body>

</html>

