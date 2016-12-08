<?php 
				error_reporting( E_ERROR );
				$link = mysqli_connect('localhost','root','usbw','guitarshop');
				mysqli_set_charset($link,"utf8");
		
				mysqli_query($link, "DELETE  FROM product WHERE id =".$_GET['id']);
				header ('Location: admin.php');
			
		?>
	