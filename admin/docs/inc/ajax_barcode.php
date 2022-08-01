<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once ('../conf/connaction.php'); 
date_default_timezone_set("Asia/Colombo");

$sid = trim($_POST['sid']);
$sub = trim($_POST['sub']);
$lec = trim($_POST['lec']);
$dep= trim($_POST['dep']);
$cor = trim($_POST['cor']);
$selectQuery = "SELECT * FROM student_table WHERE st_status=1 AND st_index_number='".$sid."'";
$runQuery = $conn->query($selectQuery);
$row=mysqli_fetch_array($runQuery);
$row_cnt = mysqli_num_rows($runQuery);

if($row_cnt>0){
    $indexNo = $sid;
    $subCode = $sub;
    $lecCode = $lec;
    $depCode = $dep;
    $corCode = $cor;
    $name = $row['st_name'];
    $currentDate = date('d-m-Y');
    $currentTime = date('H:i:s'); //exit();
    $attandance = "Present";
    
    //insert attendence
   $sql="INSERT INTO attandance_table (st_index_number,sub_code,lec_code,cur_date,cur_time,attandance,status,dcode,cid) VALUES
             ('".$indexNo."','".$subCode."','".$lecCode."','".$currentDate."','".$currentTime."','".$attandance."','1','".$depCode."','".$corCode."')";
    if($conn->query($sql)){
        echo "Y"."^".$indexNo."^".$subCode."^".$lecCode."^".$name."^".$currentDate."^".$currentTime."^".$attandance;
    }else{
        echo "N";
    }
}else{
    echo "N";
}
    


