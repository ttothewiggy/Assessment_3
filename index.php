<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!--Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Stylesheet-->
    <link href="style.css" rel="stylesheet">
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
    
    <header class="navbar">
  <div class="nav-center">
    <div class="nav-header">
        <a href="index.php">
        <img src="images/logo.png" class='logo' alt="logo">
        </a>
        <button class="nav-toggle">
            <i class="fas fa-bars"></i>
        </button>
    </div> 
    <!-- links -->
       
   <?php include 'connection.php'; ?>
   
      <ul class="links">
          
          <!-- run php loop through table and display model field here-->
          <?php foreach($result as $link): ?>
          
          <li class="nav-item active"><a href="index.php?link='<?php echo $link['item']; ?>'" class="nav-link text-light"><?php echo $link['item']; ?></a></li>
          
          <?php endforeach; ?>
          
          <li class="nav-item active"><a href="form.php" class="nav-link text-light">Add a new SCP Story</a></li>
      </ul>
</header>
    <title>SCP</title>
  </head>
  <body class="main-content">
   
  
   <h1 class='welcome'>Welcome to The SCP</h1>
   
   <div>
       <?php
       
            if(isset($_GET['link']))
            {
                $item = trim($_GET['link'], "'");
                
                // run sql command to retrieve record based on GET value
                $record = $connection->query("select * from scp where item='$item'");
                
                // turn record into an associative array
                $array = $record->fetch_assoc();
                
                 // variables to hold our update and delete url strings
                $id = $array['id'];
                $update = "update.php?update=" . $id;
                $delete = "connection.php?delete=" . $id;
                
                echo "
                <div class='card card-body shadow mb-3'>
                    <h2 class='card-title'>{$array['item']}</h2>
                    <h4>{$array['scp']}</h3>
                    
                    <p class='text-center'><img class='responsive' src='{$array['image']}'></p>
                    <p class='card-text'>{$array['description']}</p>
                    </div>
                    <p>
                        <a href='{$update}' class='btn btn-warning'>Update Record</a>
                        <a href='{$delete}' class='btn btn-danger'>Delete Record</a>
                    </p>
                </div>
                
                
                ";
            }
            else
            {
                //default view that the user sees when visiting for the first time
                echo "
                
                <p><img class='main-image' src='images/logo.png'></p>
                <p class='blurb'>   Click on the links in the nav-bar to read our stories.</p>
                
                ";
            }
       
       ?>
   </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="app.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>