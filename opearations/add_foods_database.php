<?php
include_once 'operation.php';
if (isset($_POST['food_name']) && isset($_POST['food_price']) && isset($_POST['ingredient_value']) && isset($_POST['food_measure']) && isset($_POST['ingredient_name'])) {
    $food_name = $_POST['food_name'];
    $food_price = $_POST['food_price'];
    $food_value_ingrident_id = $_POST['ingredient_name'];
    $food_value_volume = $_POST['ingredient_value'];
    $autoIncrement = 0;

    $addDataToFood = new Operation;
    $addDataToFood->setTable('food');
    $addDataToFood->setFields(array(
        'food_name' => $food_name,
        'food_price' => $food_price
    ));
    $result = $addDataToFood->insertOData();
    if ($result) {
        $addDataToFood->setTable('food');
        $selectData = $addDataToFood->selectOData('food_name="' . $food_name . '"', 'food_id AS foodId');
        if ($selectData) {
            $addDataToFood->setTable('foodvalue');
            foreach ($selectData as $data) {
                foreach ($food_value_ingrident_id as $ingId) {
                    $addDataToFood->setFields(array(
                        'food_value_food_id' => $data['foodId'],
                        'food_value_ingrident_id' => $ingId,
                        'food_value_volume' => $food_value_volume[$autoIncrement++],
                    ));
                    $inserted=$addDataToFood->insertOData();
                    // var_dump($data['foodId']."  ".$ingId."  ".$food_value_volume[$autoIncrement]."\n");


                }
            }
            if($inserted){
                header('Location:../add_foods.php');
                exit();
            }else{
                header('Location:../add_foods.php');
            }

        }
    } else {
        echo "Something wrong duplicate entry";
    }
} else {
}
