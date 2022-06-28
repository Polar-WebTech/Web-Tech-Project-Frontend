<?php



function goto2 ($to,$Message){
	echo "<script language=\"JavaScript\">alert(\"".$Message."\") \n window.location = \"".$to."\"</script>";
}

function alert1 ($str){
	print "<script>alert(\"".$str."\")</script>";
}


function logincheck($u,$p){

    require_once('setting.php');
    require_once('db.php');
    $conn=new mysqli($servername,$user,$passw);
    mysqli_select_db($conn,$database);
    $sql=" SELECT count(userid) as L FROM `tbl_user`  where userid='".$u."'  and password='".$p."'";


    $stmt = mysqli_query($conn,$sql);
    if ($stmt===false){

    }

    $row=mysqli_fetch_assoc($stmt);

    if ($row['L']==1){
        return 1;
    }
    else {
        return 0;
    }
}



?>