<style>
	.product{
		margin-bottom:0;
	}
	
	.edit, .delete {
		width:50%;
		display:inline-block;
		float:left;
	}
	.delete {
		text-align:right;
	}
	.edit a,.delete a{
		text-decoration:none;
		display:block;
		width:100%;
	}
	
</style>
<section id="content">
		<div class="container">
			<div class="row">
				<?php 
				$link = mysqli_connect('localhost','root','usbw','guitarshop');
				mysqli_set_charset($link,"utf8");
				$result = mysqli_query($link, "SELECT * FROM product");
				if(mysqli_num_rows($result) > 0)
				{
					$row = mysqli_fetch_array($result);
				do{
					echo '
					<div class="col-md-4  col-sm-4 col-xs-12 ">
					<div class="product">
						<div class="prod-img">
							<img src="../images/'.$row["image"].'" alt="">
						</div>
						<div class="info">
							<h4>'.$row["title"].'<h4>
							<p class="price">'.$row["price"].'.грн</p>
						</div>
					</div>
					<div class="edit">
					<button> <a href="admin.php?page=list_to_edit&id='.$row['id'].'">Редактировать</a></button>
					</div>
					<div class="delete">
						<button><a href="admin.php?page=list_to_delete&id='.$row['id'].'">Удалить</a></button>
					</div>
				</div>'; 
				}
					while($row = mysqli_fetch_array($result));
				}
					 ?>
			
			</div>
	</div>
		</div>
	</section>
	