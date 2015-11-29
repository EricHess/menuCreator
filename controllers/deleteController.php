<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 10/7/2015
 * Time: 9:23 PM
 */

require("databaseController.php");


/* TODO: Also need to delete items downstream
    Restaurants: Delete Category, Group, Items with association
    Category: Delete Group, Items with association
    Group: Delete Items with association
*/

if($_POST["genus"] == "restaurant"){

    //TODO: Delete Category, Group, Items with restaurantassociation of the provided rid

}elseif($_POST["genus"] == "category") {

    //TODO: Delete Group, Items with categoryassociation of the provided cid

}elseif($_POST["genus"] == "group") {

    //TODO: Delete Items with groupassociation of the provided gid

}else{
    //If item, delete item
    deleteController::deleteItem($_POST);
}

class deleteController {

    public static function deleteItem($updatePackage){

        $connect = databaseController::connectToDatabase();
        $db = mysqli_real_escape_string($connect, $updatePackage['db']);
        $id = mysqli_real_escape_string($connect, $updatePackage['id']);
        $idType = mysqli_real_escape_string($connect, $updatePackage['idType']);
        $sqlStatement = "DELETE FROM ".$db." WHERE ".$idType."= ".$id;
        mysqli_query($connect,$sqlStatement);
        echo 'deleted';

    }

}