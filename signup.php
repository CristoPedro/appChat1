<?php 
  session_start();

  if (!isset($_SESSION['username'])) {
?>

<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App - Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="css/style.css">
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
		  <h2 >Criar uma conta..</h2>
		   <br>
			  <div class="spinner-border text-primary" role="status">
			  
			  </div>
		  
		  </div>
  
	 <div id="conteudo">
	 <div class="w-400 p-5 shadow rounded">
	 	<form method="post" 
	 	      action="app/http/signup.php"
	 	      enctype="multipart/form-data">
	 		<div class="d-flex
	 		            justify-content-center
	 		            align-items-center
	 		            flex-column">

	 		<img src="imagens/a.jpg" 
	 		     class="w-25">
	 		<h3 class="display-4 fs-1 
	 		           text-center">
	 			       Aguia Branca</h3>   
	 		</div>

	 		<?php if (isset($_GET['error'])) { ?>
	 		<div class="alert alert-warning" role="alert">
			  <?php echo htmlspecialchars($_GET['error']);?>
			</div>
			<?php } 
              
              if (isset($_GET['name'])) {
              	$name = $_GET['name'];
              }else $name = '';

              if (isset($_GET['username'])) {
              	$username = $_GET['username'];
              }else $username = '';
			?>

	 	  <div class="mb-3">
		    <label class="form-label">
		           Seu nome</label>
		    <input type="text"
		           name="name"
		           value="<?=$name?>" 
		           class="form-control">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">
		           Nome de usuario</label>
		    <input type="text" 
		           class="form-control"
		           value="<?=$username?>" 
		           name="username">
		  </div>


		  <div class="mb-3">
		    <label class="form-label">
		           palavra-passe</label>
		    <input type="password" 
		           class="form-control"
		           name="password">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">
		        Carrega foto de perfil</label>
		    <input type="file" 
		           class="form-control"
		           name="pp">
		  </div>
		  
		  <button type="submit" 
		          class="btn btn-success">
		          Criar a conta</button>
		  <a href="princi.php" class="btn btn-primary">Iniciar sessão</a>
		</form>
	 </div>
	 <div class="d-flex
    		            mb-3 p-3 bg-success
			            justify-content-between
			            align-items-center">
		<p class="form-label">Chat do Aguia Branca todos direitos <strong>Pedro Cristo</strong></p>
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
 <script src="../"></script>
 <script src="../assets/js/color-modes.js"></script>
 <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</html>
<?php
  }else{
  	header("Location: home.php");
   	exit;
  }
 ?>