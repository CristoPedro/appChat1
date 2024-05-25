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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css2/style.css">
    <link rel="shortcut icon" href="imagens/a.jpg" type="image/x-icon">
    <title>Chat do Pedro</title>   
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
        }
            /*  Carregamento do conteudo*/
    </style> 
</head>
<body onload="load()">
 <!---------------------------limite de conteudo------------------------------------>

    <div id="cont">
      
	  <div class="spinner-grow text-success" role="status">
			
		  </div>
		  <h2 > pagina o de boas vinda..</h2>
		   <br>
			  <div class="spinner-border text-primary" role="status">
			  
			  </div>
		  
		  </div>
  
		
	  <!-------------------------------------------->
 <div id="conteudo">
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
            <a href="#"><img src="imagens/news.png" alt="Noticias">Últimas Noticias</a>
            <a href="#"><img src="imagens/friends.png" alt="Amigos">Amigos</a>
            <a href="#"><img src="imagens/group.png" alt="Grupos">Grupos</a>
            <a href="#"><img src="imagens/marketplace.png" alt="">MF</a>
            <a href="#"><img src="imagens/watch.png" alt="video">Videos</a>
            <a href="#">Veja Mais</a>
          </div>
            <div class="shortcut-links">
                <p>Seus atalho</p>
                <a href="#" title="pedro"><img src="imagens/shortcut-1.png" alt="cursos">Teste da prova</a>
                <a href="#" title="TLP"><img src="imagens/shortcut-2.png" alt="cursos">TLP</a>
                <a href="#" title="SEAC"><img src="imagens/shortcut-3.png" alt="cursos">SEAC</a>
                <a href="#" title="TIC"><img src="imagens/shortcut-4.png" alt="cursos">TIC</a>
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
           <p><?=$user['name']?></p>
           <img class="upload" src="imagens/upload.png">
         </div>
         <!-- fim story -->

         <!-- inicio story -->
		 
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
    
           <!-- inicio foto post user perfil -->
          <div class="user-profile">
            <img class="user1" src="uploads/<?=$user['p_p']?>" alt="">
            <div>
              <p>Em que esta a pensar, <?=$user['name']?></p>
              <small>Público</small>
            </div>

          </div>
           <!-- fim foto post user perfil -->
          
            <!-- inicio  post textarea -->
           <div class="post-input-container">
            <textearea placeholder="o que você esta pensando , Pedro?"></textarea>
             
             <!-- inicio  links do post  -->
            <div class="add-post-links">
              <a href="#"><img src="imagens/live-video.png" alt="">Ao Vivio</a>
              <a href="#"><img src="imagens/photo.png" alt="">Foto</a>
              <a href="#"><img src="imagens/feeling.png" alt="">Actividades</a>

            </div>
              <!-- fim  links do post  -->

           </div>
             <!-- fim  post textarea -->

       
        </div>
        <!-- fim post user perfil -->

        <!-------------------------- inicio post feed Pedro Sassa Garcia --------------------------->
        <div class="post-container">

          <!-- inicio post perfil -->
     
        <div class="post-row">

           <!-- inicio foto post user perfil -->
           <div class="user-profile">
            <img class="user1" src="uploads/<?=$user['p_p']?>">
            <div>
              <p><?=$user['name']?></p>
              <small>Carregaste a sua foto de perfil</small>
            </div>

          </div>
           <!-- fim foto post user perfil -->
           <a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>

        </div>
        <!-- fim post  perfil -->

        <p class="post-text">
          Grupo Official Máfia 111 music <span>@Máfia</span> e elementor- Administrador padrão
          <a href="#">PedroCristo</a>
          <a href="#">Armando Afonso</a>
          <a href="#">Gomilson</a>
          <a href="#">Kenio by</a>
        </p>
        <h1 class="display-5">Bem-vindo <?=$user['name']?><h1>     
        <!-- fim post  icones feed -->
        <hr class="my-4">
        <div class="post-row">           
          <div class="activity-icons">
          <div><img src="imagens/like.png" alt=""></div>
          <div><img src="imagens/comments.png" alt=""></div>
          <div><img src="imagens/share.png" alt=""></div>
          </div>

          <div class="post-profile-icon">
          <img src="uploads/<?=$user['p_p']?>">
            <i class="fa-solidfa-caret-down"></i>
          </div>

        </div>
        <!-- fim post  icones feed -->

        </div>
         <!-------------------------- fim post feed Pedro Sassa Garcia --------------------------->
        <!-------------------------- inicio post feed Pedro Sassa Garcia --------------------------->
        <div class="post-container">

          <!-- inicio post perfil -->
        <div class="post-row">

           <!-- inicio foto post user perfil -->
           <div class="user-profile">
            <img src="imagens/member-1.png" alt="">
            <div>
              <p>Administrador padrão</p>
              <small>5 de novembro de 2024 as 09:12hs</small>
            </div>

          </div>
           <!-- fim foto post user perfil -->
           <a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>

        </div>
        <!-- fim post  perfil -->

        <p class="post-text">
          Grupo Official Máfia 111 music <span>@Máfia</span> e elementor- Administrador padrão
          <a href="#">PedroCristo</a>
          <a href="#">Armando Afonso</a>
          <a href="#">Gomilson</a>
          <a href="#">Kenio by</a>
        </p>
        <img src="imagens/post1.png" alt="" class="post-img">

        <!-- fim post  icones feed -->
        <div class="post-row">
                              
          <div class="activity-icons">
          <div><img src="imagens/like.png" alt=""></div>
          <div><img src="imagens/comments.png" alt=""></div>
          <div><img src="imagens/share.png" alt=""></div>
          </div>

          <div class="post-profile-icon">
            <img src="imagens/member-1.png" alt="">
            <i class="fa-solidfa-caret-down"></i>
          </div>

        </div>
        <!-- fim post  icones feed -->

        </div>
         <!-------------------------- fim post feed Pedro Sassa Garcia --------------------------->
        <!-------------------------- inicio post feed Pedro Sassa Garcia --------------------------->
        <div class="post-container">

          <!-- inicio post perfil -->
        <div class="post-row">

           <!-- inicio foto post user perfil -->
           <div class="user-profile">
            <img src="imagens/member-1.png" alt="">
            <div>
              <p></p>
              <small>5 de novembro de 2024 as 09:12hs</small>
            </div>

          </div>
           <!-- fim foto post user perfil -->
           <a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>

        </div>
        <!-- fim post  perfil -->

        <p class="post-text">
          Grupo Official Máfia 111 music <span>@Máfia</span> e elementor- Administrador padrão
          <a href="#">PedroCristo</a>
          <a href="#">Armando Afonso</a>
          <a href="#">Gomilson</a>
          <a href="#">Kenio by</a>
        </p>
        <img src="imagens/post2.png" alt="" class="post-img">

        <!-- fim post  icones feed -->
        <div class="post-row">
                              
          <div class="activity-icons">
          <div><img src="imagens/like.png" alt=""></div>
          <div><img src="imagens/comments.png" alt=""></div>
          <div><img src="imagens/share.png" alt=""></div>
          </div>

          <div class="post-profile-icon">
            <img src="imagens/member-1.png" alt="">
            <i class="fa-solidfa-caret-down"></i>
          </div>

        </div>
        <!-- fim post  icones feed -->

        </div>
         <!-------------------------- fim post feed Pedro Sassa Garcia --------------------------->
        <!-------------------------- inicio post feed Pedro Sassa Garcia --------------------------->
        <div class="post-container">

          <!-- inicio post perfil -->
        <div class="post-row">

           <!-- inicio foto post user perfil -->
           <div class="user-profile">
            <img src="imagens/member-1.png" alt="">
            <div>
              <p>Administrador padrão</p>
              <small>5 de novembro de 2024 as 09:12hs</small>
            </div>

          </div>
           <!-- fim foto post user perfil -->
           <a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>

        </div>
        <!-- fim post  perfil -->

        <p class="post-text">
          Grupo Official Máfia 111 music <span>@Máfia</span> e elementor- Administrador padrão
          <a href="#">PedroCristo</a>
          <a href="#">Armando Afonso</a>
          <a href="#">Gomilson</a>
          <a href="#">Kenio by</a>
        </p>
        <img src="imagens/fundo11.jpg" alt="" class="post-img">

        <!-- fim post  icones feed -->
        <div class="post-row">
                              
          <div class="activity-icons">
          <div><img src="imagens/like.png" alt=""></div>
          <div><img src="imagens/comments.png" alt=""></div>
          <div><img src="imagens/share.png" alt=""></div>
          </div>

          <div class="post-profile-icon">
            <img src="imagens/member-1.png" alt="">
            <i class="fa-solidfa-caret-down"></i>
          </div>

        </div>
        <!-- fim post  icones feed -->

        </div>
         <!-------------------------- fim post feed Pedro Sassa Garcia --------------------------->
        <!-------------------------- inicio post feed Pedro Sassa Garcia --------------------------->
        <div class="post-container">

          <!-- inicio post perfil -->
        <div class="post-row">

           <!-- inicio foto post user perfil -->
           <div class="user-profile">
            <img src="imagens/member-1.png" alt="">
            <div>
              <p>Administrador padrão</p>
              <small>5 de novembro de 2024 as 09:12hs</small>
            </div>

          </div>
           <!-- fim foto post user perfil -->
           <a href="#"><i class="fa-solid fa-ellipsis-v"></i></a>

        </div>
        <!-- fim post  perfil -->

        <p class="post-text">
          Grupo Official Máfia 111 music <span>@Máfia</span> e elementor- Administrador padrão
          <a href="#">PedroCristo</a>
          <a href="#">Armando Afonso</a>
          <a href="#">Gomilson</a>
          <a href="#">Kenio by</a>
        </p>
        <img src="imagens/post4.png" alt="" class="post-img">

        <!-- fim post  icones feed -->
        <div class="post-row">
                              
          <div class="activity-icons">
          <div><img src="imagens/like.png" alt=""></div>
          <div><img src="imagens/comments.png" alt=""></div>
          <div><img src="imagens/share.png" alt=""></div>
          </div>

          <div class="post-profile-icon">
            <img src="imagens/member-1.png" alt="">
            <i class="fa-solidfa-caret-down"></i>
          </div>

        </div>
        <!-- fim post  icones feed -->

        </div>
         <!-------------------------- fim post feed Pedro Sassa Garcia --------------------------->

         <button type="button" class="load-more-btn">Mais Publicações</button>
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
         <p>Meu perfil</p>
        <img class="side-ads" src="uploads/<?=$user['p_p']?>">

           <!-- inicio titulo Barra lateral direita do site -->
           <div class="sidebar-title">
            <h4>contatos</h4>
            <a href="home.php">Abrir chat</a>
          </div>
         <!-- fim titulo Barra lateral direita do site -->

        <!-- inicio usuarios online Barra lateral direita do site -->
        <div class="online-list">
          <div class="online">
            <img src="imagens/member-3.jfif" alt="">
          </div>
          <p>Crak Kid</p>
        </div>
        <!-- fim usuarios online Barra lateral direita do site -->
       
        <!-- inicio usuarios online Barra lateral direita do site -->
        <div class="online-list">
          <div class="online">
            <img src="imagens/member-6.png" alt="">
          </div>
          <p>Jany Lucas</p>
        </div>
        <!-- fim usuarios online Barra lateral direita do site -->

        </div>
       <!-- fim Barra lateral direita do site -->

 <!-- fim corpo do site -->
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
      <a href="home.php" class="icon"><img src="imagens/a.jpg" class="icon" alt="">chat #aguia branca</a>
      <br>
      <a href="video.php" class="icon"><img src="imagens/video.png" class="icon" alt="">video aulas</a>
        </div>
      </div>
        </div>
      </div>
 <!-- fim corpo do site -->
    </div>
    </div>

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
<!----------------------------------------------------->

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
<!----------------------------------------------------->
<script src="http://kit.fontawesome.com/58b7504213.js" crossorigin="anonymous"></script>
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