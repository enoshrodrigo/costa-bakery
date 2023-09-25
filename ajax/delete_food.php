<?php 
include_once("../opearations/operation.php");

if(isset($_POST['deleteFood'])){
    $food_id=$_POST['deleteFood'];
    $check = new Operation();
    $check->setTable('food'); 
    $result=$check->deleteOData('food_id="'.$food_id.'"');
if($result){
        echo "success";
    }else{
        echo "fail";
    }
}



?>