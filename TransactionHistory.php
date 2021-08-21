<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="BankCss.css">
</head>

<body>

<?php
  include 'navbar.php';
?>

	<div class="container">
        <h2 class="text-center pt-4">TRANSACTION HISTORY </h2>
        
       <br>
      
    <div class="container" style="overflow-x:auto;">
  <table class="table table-bordered table-info  table-hover">
  <thead class="thead-warning">
       
            <tr>
                <th class="text-center">S.no</th>
                <th class="text-center">SENDER</th>
                <th class="text-center">RECEIVER</th>
                <th class="text-center">AMOUNT</th>
                <th class="text-center">DATE & TIME</th>
            </tr>
        </thead>


        <tbody>
        <?php

            include 'Config.php';

            $sql ="select * from transactions";

            $result1= mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($result1))
            {
        ?>

            <tr>
            <td ><?php echo $rows['S.no']; ?></td>
            <td><?php echo $rows['Sender']; ?></td>
            <td ><?php echo $rows['Receiver']; ?></td>
            <td ><?php echo $rows['Amount']; ?> </td>
            <td ><?php echo $rows['Date and Time']; ?> </td>
                
        <?php
            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<div class="justify-content-center">
<?php include('footer.php') ?>
</div>

</body>