<?php
  $host        = "host=ec2-44-198-82-71.compute-1.amazonaws.com";
  $port        = "port=5432";
  $dbname      = "dbname = dfn5e2pnagp8vk";
  $credentials = "user = bnimcmqinuvakl password=eb4682865060905e60305e4cc6ca307995902b1330b3ae2996009758d5765805";



  $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
     $message="Error : Unable to open database\n";
      echo $message ;
   } else {
      $message="Opened database successfully\n";
      echo $message ;
   }
?>