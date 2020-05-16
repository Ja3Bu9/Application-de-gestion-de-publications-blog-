<?php
  // $id = isset($_GET['edit']) ? $_GET['edit'] : die('ERROR: missing ID.');

  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Application By Ja3Buu9</title>
<!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.18.0/css/mdb.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark ">
<div class="collapse navbar-collapse d-flex justify-content-center">
  <ul class="navbar-nav ">
      <li class="nav-item ">
        <a class="nav-link" href="index.php">Accueil </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="mypub.php">Mes publications</a>
      </li>
    </ul>
    </div>
  <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarText">
    
    <span class="navbar-text white-text">
          <?php
        
      
        
        
        if(!isset($_SESSION["username"])){
         
          echo '<a href="login.php"> Se connecter !</a>';
          
        }else {
          echo '<span style="color:#AFA;text-align:center;"> '. $_SESSION["username"].'  </span>';
          echo '&nbsp;<a href="logout.php">Déconnexion</a>';
        }
      ?>
    </span>
  </div>
</nav>

<?php
require('config.php');

    if(isset($_POST['title']) && isset($_POST['text'])){

    // check username and email empty or not
    if(!empty($_POST['title']) && !empty($_POST['text'])){

        // Escape special characters.
        $title = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
        $text = mysqli_real_escape_string($conn, htmlspecialchars($_POST['text']));

        //CHECK EMAIL IS VALID OR NOT

            $id = $_GET['id'];


                // UPDATE USER DATA
                $update_query = mysqli_query($conn,"UPDATE post SET title = '" . $title . "', content = '" . $text . "' WHERE id = '" . $id . "'");
    }
  
    if($update_query){
      
      header("Location: mypub.php");
    }
}else{
?>
<div class="form-container">
<h1 class="title">Update Post</h1>

<form class="text-center border border-light p-5 form" action="" method="post">
    
    <input type="text" class="form-control mb-4 input"  name="title" placeholder="Titre" required />
    <textarea name="text" placeholder="Text Here"  class="form-control rounded-0 input"></textarea>
    <input type="submit" name="submit" value="Publier !" class="btn btn-info btn-block my-4" />
    


</div>
<?php } ?> 
</body>
</html>



































<!-- BY Ja3Bu9 -->