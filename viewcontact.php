
<?php require_once("includes/db.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="css/site.css">
  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
  <a class="navbar-brand" href="index.php">Address Book</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <form class="form-inline my-2 my-lg-0 ml-auto">
        <input class="form-control mr-sm-2 ml-2" type="search" placeholder="Search" aria-label="Search" name="Search">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="SearchButton" >Search</button>
    </form>
   
  </div>
</nav>

<section>
    <!-- <div class="container"> -->
     
        <div class="row">
        <div class="col-sm-2 bg-dark pt-4">
        
        <ul id="side_menu" class="nav nav-pills">
          <li class="nav-item"><a class="nav-link text-white" data-toggle="pill" href="index.php"><i class="fas fa-th pr-2"></i>Contacts</a></li>
          <li class="nav-item"><a class="nav-link text-white" data-toggle="pill" href="addcontact.php"><i class="far fa-plus-square pr-2"></i>New Contact</a></li>
        </ul>
      </div>
            <div class="col-sm-10 bg-white p-3 rounded shadow-sm">
            <h1>Contact</h1>
            <?php 
            global $connection;

            if(isset($_GET["SearchButton"])){
              $Search = $_GET["Search"];
              $ViewQuery = "SELECT * FROM `address-book`.`contact` WHERE `date_time` LIKE '%$Search%' OR `name` LIKE '%$Search%' OR `surname` LIKE '%$Search%' OR `email` LIKE '%$Search%' OR `address` LIKE '%Search%'";
            }else{
                $PostIdFromURL = $_GET["id"];
              $ViewQuery = "SELECT * FROM `address-book`.`contacts` WHERE `id`='$PostIdFromURL' ORDER BY `name` desc";
            }
              $Execute = mysqli_query($connection, $ViewQuery);
             
              while($DataRows=mysqli_fetch_array($Execute)){
              $PostId = $DataRows["id"];
              $Name = $DataRows["name"];
              $Surname = $DataRows["surname"];
              $Email = $DataRows["email"];
              $Address = $DataRows["address"];
             
            ?>
       
                
         
          <div class="figure-caption">
              
                <p class="lead font-weight-bold p-4 bg-success text-white rounded w-50"><?php echo($Name); ?><br />
                <?php echo($Surname); ?><br />
                <?php echo($Email); ?><br />
                <?php echo($Address); ?></p> 
               
          </div>

          <?php } ?>
   
        </div>
            
        </div>
    <!-- </div> -->
</section>
<footer class="pt-3 pb-2 border-top bg-dark">
 <div class="container">
    <div class="row">
      <div class="col-12 col-md">
        <span class="text-white">Address Book <small class="pr-4">&copy; 2019</small></span>
      </div>
    </div>
   </div>
</footer>
</body>
</html>