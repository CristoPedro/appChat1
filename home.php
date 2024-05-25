<?php 
  session_start();

  if (isset($_SESSION['username'])) {
  	# database connection file
    
  	include 'app/db.conn.php';

  	include 'app/helpers/user.php';
  	include 'app/helpers/conversations.php';
    include 'app/helpers/timeAgo.php';
    include 'app/helpers/last_chat.php';


  	# Getting User data data
  	$user = getUser($_SESSION['username'], $conn);

  	# Getting User conversations
  	$conversations = getConversation($user['user_id'], $conn);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Chat App - Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" 
	      href="css/style.css">
    <link rel="shortcut icon" href="imagens/a.jpg" type="image/x-icon">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css2/style.css">
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
.story1{
    background-image: linear-gradient(transparent, rgba(0,0,0.4)), url('uploads/<?=$user["p_p"]?>');
}

#postPerf{
    background-image: linear-gradient(transparent, rgba(0,0,0.4)), url('uploads/<?=$user["p_p"]?>');
    border-radius: 10px;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}
    /*  Carregamento do conteudo*/
    
@media only screen and (max-width: 700px){
  nav{
       display: none;
    }
}
	</style>
</head>
<body onload="load()">
<!---------------------------limite de conteudo------------------------>
<!-------------------------------------------->
    <div id="cont">
      
	  <div class="spinner-grow text-success" role="status">
			
		  </div>
		  <h2 >A abrir o chat..</h2>
		   <br>
			  <div class="spinner-border text-primary" role="status">
			  
			  </div>
		  
		  </div>
  
		
	  <!-------------------------------------------->

  <!------------------------------------------------------------------->
  <div  id="conteudo">
  <nav>
        <!-- inicio logo e icones -->
   <div class="nav-left">
      <img src="imagens/logo.png" alt="Nome do site" class="logo2">
      <ul>
          <li><a href="index.php"><img src="imagens/profile-home.png" alt="video"></a></li>
          <li><img src="imagens/notification.png" alt="Notificações"></li>
          <li><img src="imagens/inbox.png" alt="inbox"></li>
      </ul> 
    </div>
    <!-- Fim logo  e icones-->

     <!-- inicio menu e busca -->
   <div class="nav-right">

     <!-- inicio  busca -->
       <div class="search-box">
          <img src="imagens/search.png" alt="icone de busca">
          <input type="text" name="p" placeholder="Pesquisa">

	   </div>
    
    <!-- fim busca -->

     <!-- inicio perfil foto -->
     
	 <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropLive"><img class="user1" src="uploads/<?=$user['p_p']?>"></a>
     
     <!-- fim perfil foto -->
   </div>
    <!-- fim menu e busca -->

    </nav>

   <!-- inicio corpo do site -->
  
    <div class="container">

        <!-- inicio Barra lateral esquerda do site -->
        <div class="left-sidebar">
          <div class="imp-links">
            <a href="#"><img src="imagens/news.png" alt="Noticias">Aulas online</a>
            <a href="#"><img src="imagens/friends.png" alt="Amigos">Amigos</a>
            <a href="#"><img src="imagens/group.png" alt="Grupos">Estudar em grupo</a>
            <a href="#"><img src="imagens/marketplace.png" alt="">Comprar Livros</a>
            <a href="#"><img src="imagens/watch.png" alt="video">Videos</a>
            <a href="#">Veja Mais</a>
          </div>
            <div class="shortcut-links">
                <p>Seus atalho</p>
                <a href="#" title="Perfil"><img src="imagens/upload.png" alt="cursos">Actualizar perfil</a>
                <a href="#" title="Desafios de programação"><img src="imagens/profile-job.png" alt="cursos">Desafios</a>
                <a href="#" title="Livro para ler"><img src="imagens/profile-study.png" alt="cursos">Materiais PDF</a>
                <a href="definicoes.html" title="definicoes"><img src="imagens/setting.png" alt="cursos">definicoes</a>
            </div>
        </div>
       <!-- fim Barra lateral esquerda do site -->

       <!-- inicio conteudo do site -->
        <div class="main-content">
        <!-- inicio story galeria do site -->
        <div class="story-gallery">

         <!-- inicio story -->
         <div class="story story1">
         <img src="uploads/<?=$user['p_p']?>">
          <p><?=$user['name']?></p>
         </div>
         <!-- fim story -->

        
         <div class="story story2">
          <img src="imagens/transferir.jpg" alt="">
          <p>#Aguia Branca</p>
         </div>
         <!-- fim story -->

         <!-- inicio story -->
         <div class="story story3">
          <img src="imagens/transferir.jpg" alt="">
          <p>#Aguia Branca</p>
         </div>
         <!-- fim story -->

         <!-- inicio story -->
         <div class="story story4">
          <img src="imagens/transferir.jpg" alt="">
          <p>#Aguia Branca</p>
         </div>
         <!-- fim story -->

         <!-- inicio story -->
         <div class="story story5">
          <img src="imagens/transferir.jpg" alt="">
          <p>#Aguia Branca</p>
         </div>
         <!-- fim story -->
         

        </div>
        <!-- inicio story galeria do site -->

         <!-- inicio post user perfil -->
        <div class="write-post-container">
			<h2>Mensagens do Chat</h2>
       
        </div>
        <!-- fim post user perfil -->

        <!-------------------------- inicio post feed Pedro Sassa Garcia --------------------------->
        <div class="post-container">
		    <div id="contentChat" class="p-2 w-400
                rounded shadow">
    	<div>
    		<div class="d-flex
    		            mb-3 p-3 bg-light
			            justify-content-between
			            align-items-center">
    			<div class="d-flex
    			            align-items-center">
    			    <img src="uploads/<?=$user['p_p']?>"
    			         class="user">
                    <h3 class="fs-xs m-2"><?=$user['name']?></h3> 
    			</div>
    			<a href="logout.php"
    			   class="btn btn-dark">Terminar</a>
    		</div>

    		<div class="input-group mb-3">
    			<input type="text"
    			       placeholder="Pesquisar amigos para conversar..."
    			       id="searchText"
    			       class="form-control">
    			<button class="btn btn-primary" 
    			        id="serachBtn">
    			        <i class="fa fa-search"></i>	
    			</button>       
    		</div>
    		<ul id="chatList"
    		    class="mvh-50 overflow-auto">
    			<?php if (!empty($conversations)) { ?>
    			    <?php 

    			    foreach ($conversations as $conversation){ ?>
	    			<li class="list-group-item1">
	    				<a href="chat.php?user=<?=$conversation['username']?>"
	    				   class="d-flex
	    				          justify-content-between
	    				          align-items-center p-2">
	    					<div class="d-flex
	    					            align-items-center">
	    					    <img src="uploads/<?=$conversation['p_p']?>"
	    					         class="user">
	    					    <h3 class="fs-xs m-2">
	    					    	<?=$conversation['name']?><br>
                      <small>
                        <?php 
                          echo lastChat($_SESSION['user_id'], $conversation['user_id'], $conn);
                        ?>
                      </small>
	    					    </h3>            	
	    					</div>
	    					<?php if (last_seen($conversation['last_seen']) == "Active") { ?>
		    					<div title="online">
                    agora
		    						<div class="online"></div>
		    					</div>
	    					<?php } ?>
	    				</a>
	    			</li>
            <hr class="my-4">
    			    <?php } ?>
    			<?php }else{ ?>
    				<div class="alert alert-info 
    				            text-center">
					   <i class="fa fa-comments d-block fs-big"></i>
                       Ainda não tens nenhuma conversa.
					</div>
    			<?php } ?>
    		</ul>
    	</div>
    </div>
	  
   </div>
         <!-------------------------- fim post feed Pedro Sassa Garcia --------------------------->

         <button type="button" class="load-more-btn">Fim da lista</button>
        </div>
        <!-- fim conteudo do site -->

        <!-- inicio Barra lateral direita do site -->
        <div class="right-sidebar">

          <!-- inicio titulo Barra lateral direita do site -->
          <div class="sidebar-title">
            <h4>Eventos</h4>
            <a href="#">Veja Todos</a>
          </div>
         <!-- fim titulo Barra lateral direita do site -->

           <!-- inicio evento Barra lateral direita do site -->
         <div class="event">
          <div class="left-event">
            <h3>04</h3>
            <span>Abril</span>
  
          </div>
  
          <div class="right-event">
            <h4>Rede Social</h4>   
             <p>SHOWS MF 111</p>
             <a href="#">Mais Informações</a>
          </div> 
             
         </div>
           <!-- fim evento Barra lateral direita do site -->
           
          
         <!-- inicio evento Barra lateral direita do site -->
         <div class="event">
          <div class="left-event">
            <h3>07</h3>
            <span>Março</span>
  
          </div>
  
          <div class="right-event">
            <h4>Máfia 111</h4>   
             <p>Trap (music)</p>
             <a href="#">Mais Informações</a>
          </div> 
             
         </div>
           <!-- fim evento Barra lateral direita do site -->

           <!-- inicio titulo Barra lateral direita do site -->
          <div class="sidebar-title">
            <h4>Patrocinados</h4>
            <a href="#">feichar</a>
          </div>
         <!-- fim titulo Barra lateral direita do site -->
		 <div class="online"></div>
		<img class="side-ads" src="uploads/<?=$user['p_p']?>">
        

           <!-- inicio titulo Barra lateral direita do site -->
           <div class="sidebar-title">
            <h4>contatos</h4>
            <a href="#">Feichar chats</a>
          </div>
         <!-- fim titulo Barra lateral direita do site -->

         <!-- inicio usuarios online Barra lateral direita do site -->
        <div class="online-list">
          <div class="online">
            <img src="imagens/member-1.png" alt="">
          </div>
          <p>Kids Wannable</p>
        </div>
        <!-- fim usuarios online Barra lateral direita do site -->

        <!-- inicio usuarios online Barra lateral direita do site -->
        <div class="online-list">
          <div class="online">
            <img src="imagens/member-3.jfif" alt="">
          </div>
          <p>Crak Kid</p>
        </div>
        <!-- fim usuarios online Barra lateral direita do site -->
       

        </div>
       <!-- fim Barra lateral direita do site -->
	   <div class="modal fade" id="staticBackdropLive" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLiveLabel" aria-hidden="true">
        <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLiveLabel">Perfil</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <canvas class="my-4 w-100" id="myChart" height="30"></canvas>
        <div class="d-flex justify-content-center align-items-center">

      <div id="postPerf" class="shadow w-350 p-3 text-center">

        <a href="#">
          <img src="uploads/<?=$user['p_p']?>"
               class="testsperf">
        </a>
            <h4 class="display-5 "><?=$user['name']?></h4>
            <a href="edit.php" class="btn btn-primary">
            Editar Perfil
            </a>
             <a href="logout.php" class="btn btn-danger">
                Terminar
            </a>
        </div>
    </div>
        <canvas class="my-4 w-100" id="myChart" height="30"></canvas>
      <a href="definicoes.html" class="icon"><img src="imagens/setting.png" class="icon" alt="">Setting</a>
      <br>
      <a href="home.php" class="icon"><img src="imagens/a.jpg" class="icon" alt="">chat aguia branca</a>
      <br>
      <a href="video.php" class="icon"><img src="imagens/video.png" class="icon" alt="">video aulas</a>
        </div>
      </div>
        </div>
      </div>
       <!-- fim Barra lateral direita do site -->


    </div>
    </div>
 <!-- fim corpo do site -->


<!--------------------------------------------------------------->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	$(document).ready(function(){
      
      // Search
       $("#searchText").on("input", function(){
       	 var searchText = $(this).val();
         if(searchText == "") return;
         $.post('app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });

       // Search using the button
       $("#serachBtn").on("click", function(){
       	 var searchText = $("#searchText").val();
         if(searchText == "") return;
         $.post('app/ajax/search.php', 
         	     {
         	     	key: searchText
         	     },
         	   function(data, status){
                  $("#chatList").html(data);
         	   });
       });


      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);

    });
</script>

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
</body>
<!--------------------------------------------------------------------------->

<script>
	var scrollDown = function(){
        let chatBox = document.getElementById('chatBox');
        chatBox.scrollTop = chatBox.scrollHeight;
	}

	scrollDown();

	$(document).ready(function(){
      
      $("#sendBtn").on('click', function(){
      	message = $("#message").val();
      	if (message == "") 
		 return;

      	$.post("app/ajax/insert.php",
      		   {
      		   	message: message,
      		   	to_id: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#message").val("");
                  $("#chatBox").append(data);
                  scrollDown();
      		   });
      });

      /** 
      auto update last seen 
      for logged in user
      **/
      let lastSeenUpdate = function(){
      	$.get("app/ajax/update_last_seen.php");
      }
      lastSeenUpdate();
      /** 
      auto update last seen 
      every 10 sec
      **/
      setInterval(lastSeenUpdate, 10000);



      // auto refresh / reload
      let fechData = function(){
      	$.post("app/ajax/getMessage.php", 
      		   {
      		   	id_2: <?=$chatWith['user_id']?>
      		   },
      		   function(data, status){
                  $("#chatBox").append(data);
                  if (data != "") scrollDown();
      		    });
      }

      fechData();
      /** 
      auto update last seen 
      every 0.5 sec
      **/
      setInterval(fechData, 500);
    
    });
</script>
<!--------------------------------------------------------------------------->
</script><script src="dashboard.js"></script>
 <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
 <script src="../assets/js/color-modes.js"></script>
 <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</html>
<?php
  }else{
  	header("Location: princi.php");
   	exit;
  }
 ?>

