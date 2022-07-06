<?php
    require 'config/postgresqlDB.php';
    require 'config/urlSummary.php';

    $categoryid=$_POST["categoryid"];
    $description=$_POST["description"];
    $sqlcheck="SELECT * FROM tbl_category WHERE id='".$categoryid."'";
    $resultcheck=pg_query($sqlcheck);
    $numrow=pg_num_rows($resultcheck);
    // echo($numrow);
    if ($numrow==0)
    {
        $sql="INSERT INTO tbl_category (id,description)
        VALUES ('".$categoryid."', '".$description."') ";

    $result=pg_query($sql);

    }
    else
    {
        echo "<script>alert('The category id entered already existed. Please try with other unique category id')</script>";
    }

    redirectHeader ($ToViewCourseCategoryHTML);



?>