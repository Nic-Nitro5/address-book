
<?php require_once("includes/db.php"); ?>
<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>

<?php 
if(isset($_POST["submit"])){
  $Name = mysqli_real_escape_string($connection, $_POST["Name"]);
  $Surname = mysqli_real_escape_string($connection, $_POST["Surname"]);
  $Email = mysqli_real_escape_string($connection, $_POST["Email"]);
  $Address = mysqli_real_escape_string($connection, $_POST["Address"]);

  date_default_timezone_set("Africa/Johannesburg");
  $CurrentTime = time();
  $DateTime = strftime("%d-%B-%Y %H:%M:%S", $CurrentTime);
  $DateTime;

  

  if(empty($Name)){
    $_SESSION["ErrorMessage"] = "Name cant be empty";
    Redirect_to("addcontact.php");
  }elseif(strlen($Name)<2){
    $_SESSION["ErrorMessage"] = "Name should be at least 2 characters";
    Redirect_to("addcontact.php");
  }else{
    global $connection;
    $Query = "INSERT INTO `address-book`.`contacts`(`name`,`surname`,`email`, `address`, `datetime`) VALUES ('$Name','$Surname','$Email', '$Address', '$DateTime')";
    $Execute = mysqli_query($connection, $Query);
    
    if($Execute){
      $_SESSION["SuccessMessage"]="Added successfully";
      Redirect_to("Index.php");
    }else{
      $_SESSION["ErrorMessage"]="Failed to add";
      Redirect_to("addcontact.php");
    }

  }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <title>Add New Contact</title>

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">

<!-- custom styles -->
<link href="css/site.css" rel="stylesheet">

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
  <!-- <div class="container"> -->
    <div class="row">
      <div class="col-sm-2 bg-dark">
   
        <ul id="side_menu" class="nav nav-pills">
          <li class="nav-item"><a class="nav-link text-white" data-toggle="pill" href="index.php"><i class="fas fa-th pr-2"></i>Contacts</a></li>
          <li class="nav-item active"><a class="nav-link text-white" data-toggle="pill" href="addnewpost.php"><i class="far fa-plus-square pr-2"></i>New Contact</a></li>
        </ul>
      </div>
      <div class="col-sm-10">
        <h1>Add New Contact</h1>
        <div><?php echo Message(); echo SuccessMessage(); ?></div>
        <div>
          <form action="addcontact.php" method="post">
          <label for="name" class="font-weight-bold">Name:</label>
            <input type="text" id="name" name="Name" class="form-control mt-1" placeholder="Enter Name" required>
            <label for="surname" class="font-weight-bold">Surname:</label>
            <input type="text" id="surname" name="Surname" class="form-control mt-1" placeholder="Enter Surname" required>
            <label for="email" class="font-weight-bold">Email:</label>
            <input type="text" id="email" name="Email" class="form-control mt-1" placeholder="Enter Email" required>
            <label for="address" class="font-weight-bold">Address:</label>
            <textarea class="form-control mt-1" name="Address" id="address"></textarea><br />

            <input class="btn btn-success btn-primary btn-block mt-1" type="submit" name="submit" value="Add New Contacts">
          </form>
        </div>
      
      
  
      </div>
    </div>
  <!-- </div> -->

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
