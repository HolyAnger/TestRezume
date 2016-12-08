<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/style.css">
  
  </head>
  <body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
	
    <div class="navbar-header">
      <button type="button" class="navbar-toggle " data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="../index.php">GuitarShop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" ">
      <ul class="nav navbar-nav">
        <li class="active" id="lists"  ><a href="admin.php">Список</a></li>
        <li id="product" class="dropdown">
          <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Товар<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li id="add"><a href="admin.php?page=add">Добавить</a></li>
          </ul>
        </li>
      </ul>

  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
	<?php 
	error_reporting( E_ERROR );
	switch($_GET['page']){
		case 'add': include ("add.php"); break;
		case 'list_to_edit': include ("list_to_edit.php"); break;
		case 'list_to_delete': include ("list_to_delete.php"); break;
		default: include ("content_admin.php"); 
		
		break;
	}
	?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$('#product').on('click', function(){
			$('#product').addClass("active");
			$('#lists').removeClass("active");
		})
	
	</script>
  </body>
</html>