<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transfer Money</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <link rel="stylesheet" type="text/css" href="BankCss.css">

  
</head>

<body >
<?php
  include 'navbar.php';
?>
<?php
    include 'Config.php';
    $sql = "select * from user";
    $result = mysqli_query($conn, $sql);
    
?>
<div class="container">
        <h2 class="text-center pt-4" style="color : black;">TRANSFER MONEY</h2>
        
            <div class="container" style="overflow-x:auto;">
  <table class="table table-bordered table-info  table-hover">
  <thead class="thead-warning">
                 
                            <tr>
                            <th  class="text-center ">Id</th>
                            <th class="text-center">NAME</th>
                            <th class="text-center">E-MAIL</th>
                            <th class="text-center ">BALANCE</th>
                            <th  class="text-center ">OPERATION</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php 
                    while($rows=  mysqli_fetch_assoc($result)){
                ?>
                    <tr style="color : black;">
                        <td class="text-center"><?php echo $rows['id'] ?></td>
                        <td class="text-center"><?php echo $rows['Name']?></td>
                        <td class="text-center"><?php echo $rows['Email']?></td>
                        <td class="text-center"><?php echo $rows['Balance']?></td>
                        <td class="text-center" ><a href="SelectUser?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn btn-success btn-lg" ">TRANSACT</button></a></td> 
                    </tr>
                <?php
                    }
                ?>
            
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> 
         </div>
         <div class="justify-content-center">
<?php include('footer.php') ?>
</div>
         
        
</body>
</html>