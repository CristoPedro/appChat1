<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat Aguia Branca</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css2/style.css">
	<link rel="shortcut icon" href="imagens/a.jpg" type="image/x-icon">
	<style>
		#cont{
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}
#conteudo {
  display: none;
}
    /*  Carregamento do conteudo*/
	</style>
</head>
<body onload="load()" class="d-flex
             justify-content-center
             align-items-center
             vh-100">
			 <div id="cont">
      
	  <div class="spinner-grow text-success" role="status">
			
		  </div>
		  <h2 >A abrir outra sessão..</h2>
		   <br>
			  <div class="spinner-border text-primary" role="status">
			  
			  </div>
		  
		  </div>
  
	 <div id="conteudo">		 
	 <div class="w-400 p-5 shadow rounded">
	 	<form method="post" 
	 	      action="app/http/auth.php">
	 		<div class="d-flex
    		            mb-3 p-3 bg-primary
			            justify-content-between
			            align-items-center">

	 		<img src="imagens/transferir.jpg" 
	 		     class="w-25">
	 		<h3 class="display-4 fs-1 
	 		           text-center">
	 			       Aguia B</h3>   


	 		</div>
	 		<?php if (isset($_GET['error'])) { ?>
	 		<div class="alert alert-warning" role="alert">
			  <?php echo htmlspecialchars($_GET['error']);?>
			</div>
			<?php } ?>
			
	 		<?php if (isset($_GET['success'])) { ?>
	 		<div class="alert alert-success" role="alert">
			  <?php echo htmlspecialchars($_GET['success']);?>
			</div>
			<?php } ?>
		  <div class="mb-3">
		    <label class="form-label">
		           Nome de Usuário</label>
		    <input type="text" 
		           class="form-control"
		           name="username">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">
		          Palavra-passe</label>
		    <input type="password" 
		           class="form-control"
		           name="password">
		  </div>
		  
		  <button type="submit" 
		          class="btn btn-primary">
		         iniciar sessão</button>
		  <a href="signup.php" class="btn btn-success">Criar uma conta</a>
		</form>
	 </div>
	 <div class="d-flex
    		            mb-3 p-3 bg-success
			            justify-content-between
			            align-items-center">
		<p class="form-label">Chat do Aguia Branca todos direitos<strong> Pedro Cristo</strong></p>
		<br>
		<p><a href="https://facebook.com/Modo Automático"></a></p>
	 </div>
	 </div>
</body>
<script>
  function load() {
   let content = document.getElementById('cont');
   let conteudo = document.getElementById('conteudo');

   setTimeout(()=>{
    content.style.display = "none";
    conteudo.style.display = "block";

   },1000);
   
}
</script>
</script><script src="dashboard.js"></script>
 <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
 <script src="../assets/js/color-modes.js"></script>
 <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</html>
<?php
  }else{
  	header("Location: home.php");
   	exit;
  }
 ?>