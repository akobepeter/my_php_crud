


<!-- import head,navbar, footer from partials folder -->

<?php require_once("partials/head.php");?>
<?php require_once("partials/navbar.php");?>

<!-- import database from config folder -->
<?php include_once("config/db.php");?>

  <!-- Start your project here--> 



     <div class="container mt-5 shadow p-5">
        <h2 class="text-center">Enter Players Information</h2>

        <form action="add.php" method="POST">
           <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="name">Player Name</label>
                  <input type="text" name="name"  class="form-control" placeholder="Enter player name" id="">
                </div>
              </div>
              <div class="col">
                <label for="market_value">Market Value</label>
                <input type="text" name="market_value"   class="form-control" placeholder="Enter Market Value" id="">
              </div>
           </div>

           <div class="form-row">
              <div class="col">
                <div class="form-group">
                  <label for="position">Position</label>
                  <input type="text" name="position" class="form-control" placeholder="Enter player position" id="">
                </div>
              </div>

              <div class="col">
                <div class="form-group">
                  <label for="club">Club</label>
                  <input type="text" name="club"  class="form-control" placeholder="Enter Club Name">
                </div>
              </div>
           </div>
           <div class="form-group">
             <input type="submit" name="submit" class="form-control">
           </div>
        </form>
        <br><br>

        <?php

          //<!-- write a query to recieve data from our database -->

          $query = "SELECT * FROM players";
          $result = mysqli_query($conn,$query);
          $records = mysqli_num_rows($result);

        ?>

        <table class="table text-white bg-dark">
           <thead>
             <th>Name</th>
             <th>Market Value</th>
             <th>Position</th>
             <th>Club</th>
             <th>Action</th>
           </thead>

           <tbody>

             <?php
              if($records){
                while($rows = mysqli_fetch_assoc($result)){
                  ?>
                    
                    <tr>
                    <td><?php echo $rows['name'];?></td>
                    <td><?php echo $rows['market_value'];?></td>
                    <td><?php echo $rows['position'];?></td>
                    <td><?php echo $rows['club'];?></td>
                    <td>
                      <a href="add.php?id=<?php echo $rows['id'];?>" class="btn btn-primary">Edit</a>
                      <a href="delete.php?id=<?php echo $rows['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>

                  <?php
                }
              }
             ?>

           </tbody>
        </table>
     </div>
   <?php require_once("partials/footer.php"); ?>






