<html>
<head>
	<title>upload sukses<</title>
</head>
<body>
 
	<center><h1>Membuat Upload File Dengan CodeIgniter </h1></center>
 
	<ul>
		<?php foreach ($upload_data as $item => $value):?>
			<li><?php echo $item;?>: <?php echo $value;?></li>
		<?php endforeach; ?>
	</ul>	
 
</body>
</html>