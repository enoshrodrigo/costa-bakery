<?php
include_once("../opearations/operation.php");
  if(isset($_POST['valueId'])){
    $ingredientvalue_id = $_POST['valueId'];
  $checkIngredientMeasure = new Operation();
  $checkIngredientMeasure->setTable('ingredientvalue');
  $result=$checkIngredientMeasure->selectOData('ingredientvalue_id='.$ingredientvalue_id.'','DISTINCT ingredientvalue_measure AS measure');
  if($result){
    echo json_encode($result);
  }else{
    echo "measure error";
  }
}else{
//get ingredient data from database
$Operation = new Operation;
$Operation->setTable("ingredient,ingredientvalue");
$result=$Operation->selectOData('ingredientvalue_ingredient_id=ingredient_id','DISTINCT ingredient_id AS data,ingredient_name AS name,ingredientvalue_ingredient_id AS ingID ,ingredientvalue_measure AS measure,ingredientvalue_price AS price,ingredientvalue_id AS valueId'); 
if($result){
echo json_encode($result);
}else{
    echo"error";
}

}
?>