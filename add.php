<?php

include_once('config/db.php');

// create data
if(isset($_POST['submit']) && isset($_POST['submit']) != ''){

 $id = (!empty($_GET['id'])) ?$_GET['id'] : '';

 // validation
//  checking for empty... if input is empty it will not save to database
 $name = (!empty($_POST['name'])) ? $_POST['name'] : '';
 $market_value = (!empty($_POST['market_value'])) ? $_POST['market_value'] : '';
 $club = (!empty($_POST['club'])) ? $_POST['club'] : '';
 $position = (!empty($_POST['position'])) ? $_POST['position'] : '';



 if($id){
  $query = "UPDATE players SET name= '$name', market_value= '$market_value', club='$club', position='$position' WHERE id='$id' ";
  $msg = 'updated';
 }else{
   // Insert our query to the database
   $query = "INSERT INTO players(name,market_value,club,position) VALUES('$name','$market_value','$club','$position')";
   $msg = 'inserted successfuly';
 }
 
   
  if(mysqli_query($conn,$query)){
      echo 'successfully';
      //redirect to homepage  
      header('location: index.php?data_record '.$msg);
  }
}


if(isset($_GET['id']) != ''){

    $player_id = $_GET['id'];
    $query = "SELECT * FROM `players` WHERE id = $player_id";
    $result = mysqli_query($conn,$query);
    $records = mysqli_fetch_row($result);

    $name = $records[1];
    $market_value = $records[2];
    $club = $records[3];
    $position = $records[4];
}


?>





<!-- import head,navbar, footer from partials folder -->

<?php require_once("partials/head.php");?>
<?php require_once("partials/navbar.php");?>

<!-- import database from config folder -->


  <!-- Start your project here--> 



     <div class="container mt-5 shadow p-5">
        <h2 class="text-center">Enter Players Information</h2>

        <form action="add.php" method="post">
           <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="name">Player Name</label>
                  <input type="text" name="name" value="<?php echo $name;?>" class="form-control" placeholder="Enter player name" id="">
                </div>
              </div>
              <div class="col">
                <label for="market_value">Market Value</label>
                <input type="text" name="market_value" value="<?php echo $market_value;?>"  class="form-control" placeholder="Enter Market Value" id="">
              </div>
           </div>

           <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="position">Position</label>
                  <input type="text" name="position" value="<?php echo $position;?>" class="form-control" placeholder="Enter player position" id="">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="club">Club</label>
                  <input type="text" name="club" value="<?php echo $club;?>" class="form-control" placeholder="Enter Club Name">
                </div>
              </div>
           </div>
           <div class="form-group">
             <input type="submit" name="submit" class="form-control">
           </div>
        </form>
        <br><br>
     </div>
   <?php require_once("partials/footer.php"); ?>