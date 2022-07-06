<?php
    require 'config/postgresqlDB.php';
    require 'config/urlSummary.php';
    $latitude=doubleval($_POST["latitude"]);

    $longitude=doubleval($_POST["longitude"]);
    $location=$_POST["location"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $sql="UPDATE tbl_contact SET latitude=$latitude,longitude=$longitude,location='".$location."', email='".$email."',phone='".$phone."' WHERE id=1";

    $result=pg_query($db,$sql);
    if ($result)
    {
        echo "<script>alert('Update successfully')</script>";

    }
    else
    {
        echo "<script>alert('Failed to update')</script>";

    }

    redirectHeader ( $ToEditContactHTML);



?>