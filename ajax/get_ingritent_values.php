<?php
include_once("../opearations/operation.php");

//get ingredient data from database
$Operation = new Operation;
$Operation->setTable("ingredient,ingredientvalue");
$result=$Operation->selectOData(); 
if($result){
echo json_encode($result);
}else{
    echo"error";
}
 
?>