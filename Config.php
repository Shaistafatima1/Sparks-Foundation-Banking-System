<?php 
   $servername = "localhost";
   $username="root";
   $password="";
   $dbname="sparksbank";
   $conn = mysqli_connect($servername,$username,$password,$dbname);
 
   if(!$conn)
   {
       die("could not connect to the database due to the following error".mysqli_connect_error());
   }
   ?>