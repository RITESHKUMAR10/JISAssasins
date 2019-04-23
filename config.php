<?php
        define("HOSTNAME","localhost");
        define("USERNAME","root");
        define("PASSWORD","Ritesh@123");
        define("DBNAME","phpapp");

       $con = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME) or die("can not connect to database");

       if($con)  echo "You are connected.";
       


?>