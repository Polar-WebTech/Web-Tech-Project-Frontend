<?php
  $host        = "host=ec2-3-219-229-143.compute-1.amazonaws.com";
  $port        = "port=5432";
  $dbname      = "dbname = d8gik6dof142l6";
  $credentials = "user = cjqnqmlixpgjhm password=19257d5213ddea5031e620afb32c0ed5b61d07a09f8c455ade361995f3243c44";



  $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
     $message="Error : Unable to open database\n";
      echo $message ;
   } else {
      $message="Opened database successfully\n";
      echo $message ;
   }
?>