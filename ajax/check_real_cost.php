<?php
include_once("../opearations/operation.php");
$total = 0;

if (isset($_POST['ingredient_value'])) {
    $value = $_POST['ingredient_value'];
    $ingridentId = $_POST['ingredient_name'];
    $check = new Operation();
    $combineArray = $ingridentId;
    $autoIncreamnt = 0;
    $check->setTable('ingredientvalue');
    // var_dump($combineArray);

    foreach ($combineArray as $key) {
        $result = $check->selectOData('ingredientvalue_id="' . $key . '"', 'DISTINCT ingredientvalue_price AS price,ingredientvalue_measure AS measure');
        if (!$result) {
            break;
        } else {
            foreach ($result as $data) {
                
                if(!is_numeric($value[$autoIncreamnt])){
                     $total=$total+0;
                }else
                if($data['measure']==='pcs'){
                $total = $total + ($value[$autoIncreamnt++] * $data['price']) ;
            }else{
                $total = $total + ($value[$autoIncreamnt++] * ($data['price'] / 1000));
            }
            
        }
    }
    
}
echo $total;
}