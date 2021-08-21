<?php
include 'Config.php';
if(isset($_POST['submit']))
{
  $name=$_POST['Name'];
  $email=$_POST['Email'];
  $balance=$_POST['Balance'];
  $sql = "insert into user (Name,Email,Balance) values ('{$name}','{$email}','{$balance}')";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    $_SESSION['status'] = "Account Created Successfully";
   echo "<script> alert('Account Created Successfully'); 
   window.location='Transfer.php';</script>";
   
  }
  else
  {
    $_SESSION['status'] = "Something Went Wrong";
   $_SESSION['status']="Something Went Wrong";
    $_SESSION['status_code']="error";
    header('Location: Users.php');

  }
  
}
?>
<!DOCTYPE html>
<html>
<head>
<title>view users</title>
  
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="BankCss.css">
</head>
<body>
<?php
include 'navbar.php';
?>
<center><h2 class="text-center pt-4" style="color:Red;"> Create a User </h2><center>
  <!--form-->
  <center>
  <div class="background mt-4">
      <div class="container">
          <form class="form-group" method="post">
              <div class="name pt-3">
              <input class="form-control" placeholder="name" name="name" type="text" required style="width:20%; border-radius:15px;"></div><br>
              <div class="name pt-3">
              <input class="form-control" placeholder="email" name="email" type="email" required style="width:20%; border-radius:15px;"></div><br>
              <div class="name pt-3">
              <input class="form-control" placeholder="balance" name="balance" type="number" required style="width:20%; border-radius:15px;"></div><br>
              <br>
              <div class="buttons">
              <input class="reset" type="submit" style="width:10%; border-radius:20px;" name="submit" value="Submit">
                <input class="reset" type="reset" style="width:10%; border-radius:20px;" name="reset" value="Reset">
              </div>
          </form>
      </div>
  </div>

</center>


<br><br>
<?php
include 'Config.php';
$sql = "SELECT * FROM user";

 $result1 = mysqli_query($conn,$sql);
?>

<h1>
  USER DETAILS</h1>
<div class="container" style="overflow-x:auto;">
  <table class="table table-bordered table-info table-hover">
  <thead class="thead-danger">
    <tr>
     <th class="text-center"> S.no</th>
      <th class="text-center"> NAME</th>
      <th class="text-center"> E-MAIL</th>
      <th class="text-center">BALANCE</th>
    </tr>
    </thead>
    <tbody>
    <?php
	if (mysqli_num_rows($result1) > 0) {
     while($row = mysqli_fetch_assoc($result1)){
    ?>
    <tr>
     <td class="text-center"> <?php echo $row['id'] ?> </td>
     <td class="text-center"> <?php echo $row['Name'] ?> </td>
     <td class="text-center"> <?php echo $row['Email'] ?> </td>
     <td class="text-center"> <?php echo $row['Balance'] ?> </td>
    </tr>
    <?php
	 }
	}
    ?>
    </tbody>
    
  </table>
</div>

<br>
 </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<div class="justify-content-center">
<script>
  var send = document.getElementById('send');
  send.addEventListener('click',
  function()
  {
    document.querySelector('.modals').style.display="block";
  });
  close= document.getElementById('ok');
  close.addEventListener('click',
  function()
  {
    document.querySelector('.modals').style.display="none";
  })
  </script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<?php include('footer.php') ?>
</div>

</body>
</html>