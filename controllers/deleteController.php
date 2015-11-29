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
    deleteController::deleteAllItems($_POST, "restaurantassociation");
    deleteController::deleteAllGroups($_POST, "restaurantassociation");
    deleteController::deleteAllCategories($_POST, "restaurantassociation");
    deleteController::deleteItem($_POST);

}elseif($_POST["genus"] == "category") {
    deleteController::deleteAllItems($_POST, "categoryassociation");
    deleteController::deleteAllGroups($_POST, "categoryassociation");
    deleteController::deleteItem($_POST);

}elseif($_POST["genus"] == "group") {
    deleteController::deleteAllItems($_POST, "groupassociation");
    deleteController::deleteItem($_POST);

}else{
    //If item, delete item
    deleteController::deleteItem($_POST);
}

class deleteController {

    public static function deleteAllCategories($updatePackage, $association){

        $connect = databaseController::connectToDatabase();
        $id = mysqli_real_escape_string($connect, $updatePackage['id']);
        $sqlStatement = "DELETE FROM menucategory WHERE ".$association."= ".$id;
        mysqli_query($connect,$sqlStatement);
        echo 'deleted';

    }


    public static function deleteAllGroups($updatePackage, $association){

        $connect = databaseController::connectToDatabase();
        $id = mysqli_real_escape_string($connect, $updatePackage['id']);
        $sqlStatement = "DELETE FROM menugroup WHERE ".$association."= ".$id;
        mysqli_query($connect,$sqlStatement);
        echo 'deleted';

    }


    public static function deleteAllItems($updatePackage, $association){

        $connect = databaseController::connectToDatabase();
        $id = mysqli_real_escape_string($connect, $updatePackage['id']);
        $sqlStatement = "DELETE FROM menuitem WHERE ".$association."= ".$id;
        mysqli_query($connect,$sqlStatement);
        echo 'deleted';

    }


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