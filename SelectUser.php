<?php
include 'Config.php';
$negative="";
$insufficient="";
$zero="";
$success="";
$row1="";
$row2="";
$sender="";
$receiver="";
$sid = $_GET['id'];
$sql = "select * from user where id=$sid";
$result=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($result);
if(isset($_POST['submit']))
{
    $from = $_GET['id'];
    $to = $_POST['to'];
    $amount = $_POST['Amount'];
    $sql ="select * from user where id=$from";
    $query= mysqli_query($conn,$sql);
    $row1= mysqli_fetch_array($query);

    $sql1 ="select * from user where id=$to";
    $query2= mysqli_query($conn,$sql1);
    $row2= mysqli_fetch_array($query2);
    if(($amount)<0)
    {
        $negative= " Negative Values Cannot Be Transferred";
        echo '<script type="text/javascript">';
        echo 'alert("Oops! Negative Values Are Not Allowed")';
        echo '</script>';

    }
    else if ($amount > $row1['Balance'])
    {
        $insufficient= "Insufficient Balance";
        echo '<script type="text/javascript">';
        echo 'alert("Bad Luck! Insufficient Balance")';
        echo '</script>';
    }
    else if ($amount ==0)
    {
        
        $insufficient= "Zero value Cannot be entered";
        echo '<script type="text/javascript">';
        echo 'alert("Oops! Zero Values cannot be entered")';
        echo '</script>';

    }
    else
    {
        $newbal = $row1['Balance'] - $amount;
        $sql = "update users set Balance=$newbal where id=$from";
        mysqli_query($conn,$sql);

        $newbal1 = $row2['Balance'] + $amount;
        $sql = "update users set Balance = $newbal1 where id=$to";
        mysqli_query($conn,$sql);


        $sender = $row1['Name'];
        $receiver = $row2['Name'];
        $sql3 ="insert into transactions (Sender,Receiver,Balance) values ('{$sender}','{$receiver}','{$amount}')";
        $result2=mysqli_query($conn,$sql3);
        if($result2)
        {
             
        $_SESSION['success']= "Transaction Successfull..!";
        echo "<script> alert('Transaction Successful'); 
     window.location='transactionhis.php';</script>";
       
       
       
        }
        $newbal1=0;
        $amount=0;

    }
}
?>

<!doctype html>
<html lang="en">

    <link rel="stylesheet" href="BankCss.css">
 

</head>
<body>
<?php
  include 'navbar.php';
?>
    
     

  

 <!-- user table-->
 <div class="container">
        <h2 class="text-center" style="color : black;">USER DETAILS</h2>
            <?php
                include 'Config.php';
                $sid =  $_GET['id'] ;
             
                $sql = "select * from user where id=$sid";
                
                $result1 = mysqli_query($conn,$sql);
                if(!$result1)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
                $rows = mysqli_fetch_assoc($result1);
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
        <div>
        <table class="table table-bordered table-info  table-hover">

                <div class="container" style="overflow-x:auto;">
                <thead class="thead-warning">
                <th class="text-center"> ID</th>
        <th class="text-center"> NAME</th>
      <th class="text-center"> E-MAIL</th>
      <th class="text-center">BALANCE</th>
                </tr>
                <tr style="color : black;">
                    <td class=" text-center"><?php echo $rows['id'] ?></td>
                    <td class=" text-center"><?php echo $rows['Name'] ?></td>
                    <td class=" text-center"><?php echo $rows['Email'] ?></td>
                    <td class=" text-center "><?php echo $rows['Balance'] ?></td>
                </tr>
            </table>
        </div><!--transfer money to second user(users list)  -->
        <h2 class="text-center" style="color : black;">TRANSFER MONEY HERE !</h2>
        <label style="color : black;"><strong>TRANSFER TO:</strong></label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
                include 'Config.php';
                $sid=$_GET['id'];
                $sql = "select * from user where id!=$sid";
                $result1=mysqli_query($conn,$sql);
                if(!$result1)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result1)) {
            ?>
                <option class="table" value="<?php echo $rows['id'];?>" >
                
                    <?php echo $rows['Name'] ;?> (Balance: 
                    <?php echo $rows['Balance'] ;?> ) 
               
                </option>
            <?php 
                } 
            ?>
            <div>
        </select>
        <br>
        <br>
            <label style="color : black;"><strong>AMOUNT:</strong></label>
            <input type="number" class="form-control" name="Amount" required>   
            <br>
                <div class="text-center" >
                <button class="btn btn-danger btn-lg"  name="submit" type="submit" id="myBtn" >TRANSFER</button>
            </div>
        </form>
    </div>    


    <!-- footer -->
    <div class="justify-content-center">
<?php include('footer.php') ?>
</div>
   
</body>

</html>