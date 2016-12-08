<section id="content">
		<div class="container">
			<div class="row">

				<?php 
				error_reporting( E_ERROR );
				$link = mysqli_connect('localhost','root','usbw','guitarshop');
				mysqli_set_charset($link,"utf8");
				$title = $_POST['title'];
				 $price = $_POST['price'];
				 $about = $_POST['about'];
				 $file = $_FILES['new_img']['name'];

				$id = mysqli_query($link, "SELECT * FROM product WHERE id =".$_GET['id']);
				$get_id = mysqli_fetch_array($id);
				echo' <div class="col-md-4  col-sm-4 col-xs-12 ">
					<div class="product">
					

						<div class="prod-img">
							<img src="../images/'.$get_id["image"].'" alt="">
						</div>
						<div class="info">
							<h4>'.$get_id["title"].'<h4>
							<p class="price">'.$get_id["price"].'.грн</p>
						</div>
					</div>
				</div>';
				 
			if(isset($_POST['edit'])){
				if($_FILES['new_img']['type'] != 'image/jpeg'){
		echo"Данный файл не является изображением";
		exit();
	}

				if($_FILES['new_img']['error'] > 0){
		$query = mysqli_query($link,"UPDATE product  SET title = '$title', price = '$price', info='$about'  WHERE id = ".$_GET['id']);
							header('Location:admin.php?page=list_to_edit&id='.$get_id['id']);
		exit();
		}
	
	
	$upfile = '../images/'.$_FILES['new_img']['name'];
	if(is_uploaded_file($_FILES['new_img']['tmp_name'])){
		if(!move_uploaded_file($_FILES['new_img']['tmp_name'], $upfile)){
			echo 'Невзможно переместить файл в каталог';
			exit();
		}
	}
				
							$query = mysqli_query($link,"UPDATE product  SET title = '$title', price = '$price', info='$about', image = '$file' WHERE id = ".$_GET['id']);
							header('Location:admin.php?page=list_to_edit&id='.$get_id['id']);
						}
						
					 ?>
					 <form action="admin.php?page=list_to_edit&id=<?php echo $get_id['id']?>"  method="POST" enctype="multipart/form-data">
					 <div class="info_edit">
						Название гитары: <input type="text" name = "title" value = "<?php echo $get_id['title']?>"><br>
						Цена : <input style="margin-left:74.3px;"type="text"  name="price" value = "<?php echo $get_id['price']?>"><br>
						Описание: <br/> <textarea cols="40" name="about"><?php echo $get_id['info']?></textarea><br>
						Новое Изображение: <input type="file" name="new_img" ><br>
						<input type="submit" name="edit" value="Изменить" accept="image/*,image/jpeg">
					 </div>
					 </form>
			
			</div>
	</div>
		</div>
	</section>
	