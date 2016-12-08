<meta charset="UTF-8">
<?php
if(isset($_POST['add'])){
	if($_FILES['img_g']['error'] > 0){
		echo "Ошибка загрузки";
		exit();
	}
	if($_FILES['img_g']['type'] != 'image/jpeg'){
		echo"Данный файл не является изображением";
		exit();
	}

	$upfile = '../images/'.$_FILES['img_g']['name'];
	if(is_uploaded_file($_FILES['img_g']['tmp_name'])){
		if(!move_uploaded_file($_FILES['img_g']['tmp_name'], $upfile)){
			echo 'Невзможно переместить файл в каталог';
			exit();
		}
	}
	$link = mysqli_connect('localhost','root','usbw','guitarshop');
	mysqli_set_charset($link,"utf8");

	$name = $_POST['name_g'];
	$price = $_POST['price_g'];
	$about = $_POST['about_g'];
	$img = $_FILES['img_g']['name'];
	if($query = mysqli_query($link,"INSERT INTO product VALUES('','$name', '$price', '$about', '$img')") or die (mysql_error()))
	{	
	mysqli_close($link);
	echo ' <p style="margin-left:20px;">Гитара добавлена</p>';
	}
}
	?>
<form action="admin.php?page=add" method="POST" enctype="multipart/form-data" id="add_form">
	<div id="admin-add">
	<label for="">Название гитары</label>
	<input type="text" name="name_g">
	
	<label for="">Стоимость</label>
	<input type="text" name="price_g">
	
	<label for="">Описание</label><br>
	<textarea name="about_g" cols="30" rows="10"></textarea><br>
	
	<label for="">Фотография</label>
	<input style="margin-bottom:10px;"type="file" name="img_g" accept="image/*,image/jpeg">

	
	<input type="submit" value="Добавить" name="add">
	</div>
	
</form>