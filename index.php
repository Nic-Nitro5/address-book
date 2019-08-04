<?php require_once("includes/db.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php require_once("includes/session.php"); ?>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
    <title>Address Book</title>

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
      <div class="col-sm-2 bg-dark pt-4">
        
        <ul id="side_menu" class="nav nav-pills">
          <li class="nav-item"><a class="nav-link text-white" data-toggle="pill" href="index.php"><i class="fas fa-th pr-2"></i>Contacts</a></li>
          <li class="nav-item"><a class="nav-link text-white" data-toggle="pill" href="addcontact.php"><i class="far fa-plus-square pr-2"></i>New Contact</a></li>
        </ul>
      </div>
      <div class="col-sm-10">
      <div><?php echo Message(); echo SuccessMessage(); ?></div>
        <h1>Contacts</h1>
          <div class="table-responsive">
          <table class="table table-striped table-hover"> 
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Surname</th>
              <th>Email</th>
              <th>Address</th>
              <th>Date & Time</th>
              
            </tr>
            <?php 
              $connection;
              $ViewQuery = "SELECT * FROM `address-book`.`contacts` ORDER BY `name` desc";
              $Execute = mysqli_query($connection, $ViewQuery);
              $SrNo = 0;
              while($DataRows=mysqli_fetch_array($Execute)){
                $Id = $DataRows["id"];
                $Name = $DataRows["name"];
                $Surname = $DataRows["surname"];
                $Email = $DataRows["email"];
                $Address = $DataRows["address"];
                $DateTime = $DataRows["datetime"];
                $SrNo ++;
              
            ?>
            <tr>
              <td><?php echo $SrNo; ?></td>
              <td class="text-info"><?php 
              if(strlen($Name)>20){$Name = substr($Name,0,20). '...';}
              echo $Name; ?></td>
              <td><?php 
              if(strlen($Surname)>11){$Surname = substr($Surname,0,20). '...';}
              echo $Surname; ?></td>
              <td><?php 
              if(strlen($Email)>6){$Email = substr($Email,0,20). '...';}
              echo $Email; ?></td>
              <td><?php 
              if(strlen($Address)>8){$Address = substr($Address,0,20). '...';}
              echo $Address; ?></td>
               <td><?php 
              if(strlen($DateTime)>8){$DateTime = substr($DateTime,0,20). '...';}
              echo $DateTime; ?></td>
              
              
              <td>
                <a href="editcontact.php?Edit=<?php echo $Id; ?>" target="_blank"><span class="btn btn-sm btn-warning">Edit</span></a>
                <a href="deletecontact.php/?delete=<?php echo $Id; ?>" target="_blank"><span class="btn btn-sm btn-danger">Delete</span></a>
              </td>
              <td>
                <a href="viewcontact.php?id=<?php echo $Id; ?>" target="_blank"><span class="btn btn-sm btn-success">Preview</span></a>
              </td>
            </tr>
              <?php } ?>
          </table>
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
