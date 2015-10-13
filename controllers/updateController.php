<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 10/7/2015
 * Time: 9:23 PM
 */

require("databaseController.php");

updateController::updateItem($_POST);
print_r($_POST);

class updateController {

    public static function updateItem($updatePackage){

        $connect = databaseController::connectToDatabase();
        $type = mysqli_real_escape_string($connect, $updatePackage['type']);
        $db = mysqli_real_escape_string($connect, $updatePackage['db']);
        $text = mysqli_real_escape_string($connect, $updatePackage['text']);
        $id = mysqli_real_escape_string($connect, $updatePackage['id']);
        $idType = mysqli_real_escape_string($connect, $updatePackage['idType']);
        $sqlStatement = "UPDATE ".$db." SET ".$type."='".$text."' WHERE ".$idType."=".$id;
        mysqli_query($connect,$sqlStatement);

    }

}