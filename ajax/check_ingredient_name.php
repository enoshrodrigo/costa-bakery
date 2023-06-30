<?php
if(isset($_POST['ingredient_name'])){
include_once("../opearations/operation.php");
$checkIngredient = new Operation();
$checkIngredient->setTable('ingredient');
 
$ingredient = $checkIngredient->selectOData('ingredient_name="'.$_POST['ingredient_name'].'"');
if($ingredient){
    echo 1;
    
}
else{
    echo 0;
}
}
 
?>