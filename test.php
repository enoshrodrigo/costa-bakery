<?php
include_once 'operation.php';
 $k = new Operation();
 $k->setTable('test');
    $k->setFields(array(
        'name' => 'test',
        'price' => 12.245
    ));
   if( $k->insertOData()){
         echo 'succes';

   }
    else{
         echo 'fail';
    }




//     <table class=" table table-striped table-bordered" id="toogelTabel">
//     <thead>
//         <tr>
//             <th>NAME</th>
//             <th>Volume</th>

//         </tr>
//     </thead>
//     <tbody>
//         <tr>
//             <td>1</td>
//             <td>1</td>
//         </tr>
//     </tbody>
// </table>

?>