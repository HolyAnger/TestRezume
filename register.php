		<!doctype html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<title>Document</title>
				<link rel="stylesheet" href="css/bootstrap.min.css">
				<link rel="stylesheet" href="css/registr.css">
					
			</head>
			<body>
	<?php 
		error_reporting( E_ERROR );
		$link = mysqli_connect('localhost','root','usbw','guitarshop');
		mysqli_set_charset($link,"utf8");		
		if(isset($_POST['registr']))
		{
		$login = htmlspecialchars(strip_tags($_POST['login']));
		$pass = htmlspecialchars(strip_tags($_POST['pass']));
		$r_pass = $_POST['r_pass'];
		if($login == '' && $pass == '' && $r_pass == '')
			$error = "Все поля должны быть заполнены";
		else if($login == '')
			$error = "Введите ваш логин";
	
		else if($pass!='')
		{
			 if((!preg_match('/^[0-9a-zA-Z-_.]+$/',$login)) || (!preg_match('/^[0-9a-zA-Z-_.]+$/',$pass))){
			$error= "Допустимы только английские символы для логина и пароля";
			}
			
		 else if($pass == $r_pass ){
			$query = mysqli_query($link,"INSERT INTO users VALUES('','".mysqli_real_escape_string($link,$login)."', '".mysqli_real_escape_string($link, $pass)."')") or die (mysql_error());
			mysqli_close($link);
			$nice = "Регистрация прошла успешно"."<br>"."Ваш логин: ".$login."<br>"."<a id = 'back' href='/'>Вернуться на сайт</a>";
		}
		else
			$error = "Вы не правильно повторили пароль";
		}
		else $error = "Вы не ввели пароль";
		}
	?>
			<div class="container">
				<div id="registr">
				<h2>Регистрация</h2>
					<form class="form-horizontal" method="POST" action="register.php" autocomplete="off">
					  <div class="form-group">
						<label class="col-sm-2 control-label">Login</label>
						<div class="col-sm-8">
						  <input type="text" class="form-control" placeholder="Login" name="login">
						</div>
					  </div>
					  <div class="form-group">
						<label  class="col-sm-2 control-label">Password</label>
						<div class="col-sm-8">
						  <input type="password" class="form-control" placeholder="Password" name="pass">
						</div>
						</div>
						 <div class="form-group">
						 	<label  class="col-sm-2 control-label">Repeat</label>
						<div class="col-sm-8">
						  <input type="password" class="form-control" placeholder="Repeat password" name="r_pass">
						</div>
					  </div>
					    
				 <div class="form-group">
					<div class=" col-sm-6">
						 <button  style="right:0; position: absolute;" class="btn btn-default" ><a style="text-decoration: none; color:black; display: block;" href="/">Вернуться на сайт</a></button>
					</div>

					<div class="col-sm-6">
						 <button  type="submit" class="btn btn-default"  name="registr">Зарегестрироваться</button>
					</div>
				</div>
				<p style="text-align:center; text-transform:uppercase; font-size:15px">
				<?php echo $error, $nice ?>
				</p>
					</form>
				</div>
				</div>
			</body>
			</html>