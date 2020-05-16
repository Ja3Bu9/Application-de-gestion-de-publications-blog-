<?php
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
      <li class="nav-item active">
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


<div class="container">
<h1 class="title">My Posts</h1>

<div >


<?php

require('config.php');
require('class.php');


$sql = "SELECT * FROM post WHERE id_user = '{$_SESSION[ "id" ]}'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row

while($row = $result->fetch_assoc()) {
//   echo "Username: " . $_SESSION['username']. " <br /> " . $row["date"]. " <br /> title: " . $row["title"]. " <br /> content: " . $row["content"]. "<br>";
//   foreach ($row as $key => $value) {
//     echo "Key: $key; Value: $value\n";
//     echo "<br>";
//   }

echo ' 
  <div class="blog-card alt flex">
    <div class="meta">
      <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-2.jpg)"></div>
      
        </li>
      </ul>
    </div>
    <div class="description">
      <h1>'. $row["title"].' </h1>
      <h2>' . $_SESSION['username'].' , '. $row["date"].'</h2>
      <p>' . $row["content"].'</p>
      <p class="read-more">
        <a href="editpost.php?id='.$row['id'].'">Edit</a>
        <a class="delete" href="mypub.php?del='.$row['id'].'">Delete</a>
      </p>
    </div>
  </div>';
  

  
}
} else {
echo '<p class="d-flex justify-content-center">No Publications Available  </p>';
}

  if (isset($_GET['del'])) {
    $id = $_GET['del'];
    $sqldel = "DELETE FROM post WHERE id=$id";
$result = $conn->query($sqldel);
    header('location: mypub.php');
  }




 ?>
 <div class="flexx">
 <a class="btn btn-info" href="addpost.php" >Add Post</a>



 </div>
</div>

</div>


  </body>
</html>




































<!-- BY Ja3Bu9 -->