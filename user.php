<?php
	error_reporting( E_ERROR );
	session_start();
	if($_SESSION['user_id'] == ''){
		header('Location: index.php');
	}
	if(isset($_POST['exit'])){
		$_SESSION['user_id']='';
		$_SESSION['shopping_cart']='';
		header('Location: index.php');
	}
	$link = mysqli_connect('localhost', 'root', 'usbw', 'guitarshop');
	mysqli_set_charset($link,"utf8"); 

	 if(isset($_POST["add"]))  
 {   
 	  $_SESSION["shopping_cart"][0] = ""; 
      if(isset($_SESSION["shopping_cart"]))  
      {  
  $item_array_id = array_map(function($element) {
  	return $element['item_id'];
}, $_SESSION['shopping_cart']);

           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"], 
                     'item_quantity'          =>     $_POST["quantity"]  
                  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
                 unset($_SESSION["shopping_cart"][0]);  
           }  
           else  
           {  
           		unset($_SESSION["shopping_cart"][0]);  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="user.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],
                 'item_quantity'          =>     $_POST["quantity"]   
           
           );  
           $_SESSION["shopping_cart"][1] = $item_array;  
      }  
 }  

  if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="user.php#buy"</script>';  
                }  
           }  
      }  
 }  

?>



<!doctype html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>GuitarShop</title>
	
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	
	
	
		
</head>
<body>
<?php
	
	$user_data = array();
	if($result = mysqli_query($link, "SELECT * FROM users WHERE id=".$_SESSION['user_id'])){
			while ($row = mysqli_fetch_assoc($result)){
				$user_data = $row;
			}
			mysqli_free_result($result);
		}
 ?>
	<header>
	
	<div class="container" id="main">
			<form action="user.php" method="POST">
			<div class="user" >
			<p><?php echo $user_data['login'];?></p>
			<input type="submit" name = "exit" value="Выйти"class="exit">
			</div>;
			</form>
		
		<div class="logo">
			<div class="row">
				<div class="col-md-12">
					<h1>GuitarShop</h1>
				</div>
			</div>
		
			<div class="slider">
				<div class="row">
					<div class="col-md-12 ">
					
						<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="../images/shop_1.jpg" alt="...">
   
    </div>
    <div class="item">
      <img src="../images/shop_2.jpg" alt="...">
    
    </div>
	 <div class="item">
      <img src="../images/shop_3.jpg" alt="...">
      
    </div>
 
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
				</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</header>
	
	
	<nav>
	 <div class="menu">
		<div class="row">
				
			<ul>
				<li><a href="#main"><span class="glyphicon glyphicon-home"></span> Главная</a></li>
				<li><a href="#buy"><span class="glyphicon glyphicon-briefcase"></span>   Корзина</a></li>
				<li><a href="#contacts"><span class="glyphicon glyphicon-map-marker"></span> Контакты</a></li>
			</ul>
			
		</div>
		</div>
	</nav>
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
					?>
					<div class="col-md-4  col-sm-4 col-xs-12 ">
					<div class="product">
						<div class="prod-img">
							<img src="../images/<?php echo $row["image"]?>" alt="">
						</div>
						<div class="info">
							<h4><?php echo $row["title"] ?><h4>
							<p class="price"><?php echo $row["price"] ?> грн</p>
						</div>
						<button class="buy_info" data-toggle="modal" data-target="#<?php echo $row["id"]?>">Подробнее</button>
					</div>
				</div>
				<div class="modal fade bs-example-modal-lg" id="<?php echo $row["id"]?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
					<div class="modal-content">
					<form method = "POST" action="user.php?action=add&id=<?php echo $row['id']?>#buy">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="myModalLabel"><?php echo $row["title"]?></h4>
						
					  </div>
					  <div class="modal-body">
							<div id="info-body">	
							<div class="about_git">
							<img src="../images/<?php echo $row["image"]?>" alt="">
							<input type="hidden" name="hidden_name" value="<?php echo $row['title']?>" />
						<input type="hidden" name="hidden_price" value="<?php echo $row['price']?>" />
							   <input style="max-width: 160px; margin-left: 115px; text-indent: 62px" type="text" name="quantity" class="form-control" value="1" />
							
						  </div>
						<div class="modal-about">
						<p><?php echo $row['info']?></p>
							<p> <b>Цена: <?php echo $row["price"]?>.грн</b></p>
							
						</div>
						</div>
					</div>
				
				  <div class="modal-footer">

					<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
					<button type="submit" name="add" class="btn btn-primary"> Добавить в корзину</button>
				  </div>
				</div>
			  </div>
			  </form>
			</div>
		<?php				
				}
				while($row = mysqli_fetch_array($result));
				}
					 ?>
			
			</div>
	</div>
		</div>
	</section>
	<section id="buy" >
		<h3>Ваша корзина</h3>
		<div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Название монстра</th>  
                               <th width="10%">Количество</th>  
                               <th width="20%">Цена</th>  
                               <th width="15%">В сумме</th>  
                               <th width="5%">Действие</th>  
                          </tr>  
                          <?php   

                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="user.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
	</section>
	<section id="contacts">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6 col-xs-12">
					<h2>Наши контакты</h2>
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7254.656553318116!2d36.22782196001182!3d49.99432636930306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0LzRg9C3INC80LDQs9Cw0LfQuNC9INGF0LDRgNGM0LrQvtCy!5e0!3m2!1sru!2sua!4v1478088418106" 
				></iframe>
				</div>
				<div class="col-md-6 col-sm-6 col-xs-10">
				<div class="cont_info">
					<h3>Адресс:</h3>
					<p>г.Харьков.ул Клочковская,переулок Кравцова 17 в здании MusicStore</p>
					<h3>Контактные телефоны</h3>
					<p><label>Телефоны:</label> 0997896190, 0675904916</p>
					<label>Email: <a href="mailto:astral.the.best@gmail.com">astral.the.best@gmail.com</a></label>
					
				</div>
				</div>
			</div>
		</div>
	</section>
	<?php include ("footer.php")?>
	

	
	<script src="../js/jquery-3.1.0.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/jquery.1.7.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			
			var navPos, winPos, navHeight;
			
			function refreshVar() {
			navPos = $('nav').offset().top;
			navHeight = $('nav').outerHeight(true);
			}
			
			refreshVar();
			$(window).resize(refreshVar);
			$('<div class="clone-nav"></div>').insertBefore('nav').css('height', navHeight).hide();
			$(window).scroll(function() {
					winPos = $(window).scrollTop();
  
						if (winPos >= navPos) {
							$('nav').addClass('fixed shadow'); 
							$('.clone-nav').show();
		
								}  
				else {
					$('nav').removeClass('fixed shadow');
					$('.clone-nav').hide();
				  }
				});
			
		 var w = $(window).width();
		 if (w <= 330) { 
			$(".cont_info").css("margin","0px");
			}

			// Плавный скролл по якорям
			$('a[href^="#buy"], a[href^="#contacts"], a[href^="#contacts"], a[href^="#main"]').click(function () { 
			    elementClick = $(this).attr("href");
				destination = $(elementClick).offset().top-50;
				if($.browser.safari){
				$('body').animate( { scrollTop: destination }, 1000 );
				} else {
			    	$('html').animate( { scrollTop: destination }, 1000 );
				}
				return false;
		   });
		 
		});
	
	</script>

</body>
</html>