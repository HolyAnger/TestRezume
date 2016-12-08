<?php
	session_start();
?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
	<title>GuitarShop</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	
	
		
</head>
<body>

	<header>
	<div class="container" id="main">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div id="log">
					<form class="form-inline" method="POST" action="index.php" autocomplete="on">
					<input type="text" id="login"  placeholder="Ваш логин" class="form-control" name="login_a"required>
					<input type="password" id="password"  placeholder="Ваш пароль" class="form-control" name = "pass_a"required>
					 <button type="submit" class="btn btn-default" name="enter">Войти</button>
					 <a class="btn btn-default" href="register.php"> Регистрация </a>
					</form>
					<?php 
		if(isset($_POST['enter']))
		{
			$link = mysqli_connect('localhost', 'root', 'usbw', 'guitarshop');	
			$pass_a = htmlspecialchars(strip_tags($_POST['pass_a']));
			$login_a = htmlspecialchars(strip_tags($_POST['login_a']));
			$_SESSION['user_id'] = '';
			
			if($login_a == "admin" && $pass_a == "admin")
				header('Location:admin/admin.php');
			
			if($query = mysqli_query($link, "SELECT * FROM users WHERE login='".mysqli_real_escape_string($link,$login_a)."' AND password = '".mysqli_real_escape_string($link, $pass_a)."'")){
			
			while($row = mysqli_fetch_assoc($query)){
				$_SESSION['user_id'] = $row['id'];
			}
			mysqli_free_result($query);
		}
			if($_SESSION['user_id']!=''){
			header("Location:user.php");
			
		}
			else
				echo "<p style='color:white'> Логин или пароль неверный";
		}
		?>
					</div>
				</div>
		</div>
		<div class="logo">
			<div class="row">
				<div class="col-md-12">
				<div class="logo">
					<h1>GuitarShop</h1>
					</div>
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
      <img src="images/shop_1.jpg" alt="...">
   
    </div>
    <div class="item">
      <img src="images/shop_2.jpg" alt="...">
    
    </div>
	 <div class="item">
      <img src="images/shop_3.jpg" alt="...">
      
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
				<li><a href="#about"><span class="glyphicon glyphicon-comment"></span> О нас</a></li>
				<li><a href="#contacts"><span class="glyphicon glyphicon-map-marker"></span> Контакты</a></li>
			</ul>
			
		</div>
		</div>
	</nav>
	<?php include "content.php"?>
	
	<section id="about">
		<div class="container">
		 <div class="row">
		   <div class="col-md-12 col-sm-12 col-xs-12">
			<div id="cont_about">
				<h2><span class="first_word">GuitarShop</span> — профессиональный магазин гитар, в котором
				покупают гитары известные гитаристы такие как :
				</h2>
				<div id="list">
				<ul class="musicant-list">
					<li>- James Hetfield</li>
					<li>- Dave Mustaine</li>
					<li>- Zack Wylde</li>
				</ul>
				</div>
				<p>Все именные гитары этих музыкантов сделаны в нашем магазине. Магазин построен
				в 2014 году и сотрудничает с такими фирмами как: <i>Gibson,  Ibanez,  Epiphone.</i>
					Так же у нас было с ними несколько общих проектов.
				</p>
				<p>Магазин предоставляет возможность купить гитару и вернуть её в течении недели если 
				инструмент вам не по душе
				</p>
			</div>
			</div>
		 </div>
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
	<script src="js/jquery-3.1.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.1.7.1.min.js"></script>
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
			$('a[href^="#about"], a[href^="#contacts"], a[href^="#main"]').click(function () { 
			    elementClick = $(this).attr("href");
				destination = $(elementClick).offset().top-50;
				if($.browser.safari){
				$('body').animate( { scrollTop: destination }, 1000 );
				} else {
			    	$('html').animate( { scrollTop: destination }, 1000 );
				}
				return false;
		   });
		   
		 $('.product').click(function(){
			alert("Авторизуйтесь для просмотра и покупки товара"); 
		 });
		});
	
	</script>
	
</body>
</html>