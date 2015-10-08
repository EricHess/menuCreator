<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/11/2015
 * Time: 7:54 AM
 */

require('createController.php');

if(!empty($_POST['creationType'])){
    $createType = $_POST['creationType'];
    databaseController::createNew($createType, $_POST);
}

//if(!empty($_POST["restaurantAssociation"])){
//    databaseController::getGroupListByRestaurantId($_POST["restaurantAssociation"]);
//}

class databaseController {



    public static function connectToDatabase(){
        $sql = mysqli_connect('localhost','ehess84_menu','slamclam!','ehess84_ivars');
        return $sql;
    }

    public static function createNew($creationType, $creationPackage){
        switch($creationType){
            case('restaurant'):
                createController::restaurantCreate($creationPackage);
                break;
            case('menugroup'):
                createController::groupCreate($creationPackage);
                break;
            case('menucategory'):
                createController::categoryCreate($creationPackage);
                break;
            case('menuitem'):
                createController::itemCreate($creationPackage);
                break;
        };
    }

    public static function getRestaurantList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_ivars.restaurants";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }

    public static function getGroupList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_ivars.menugroup";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;

    }

    public static function getGroupListByRestaurantId($restaurantID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_ivars.menugroup WHERE restaurantassociation =".$restaurantID;
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


    public static function getCategoryList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_ivars.menucategory";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;

    }


    public static function getCategoryListByRestaurantId($restaurantID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_ivars.menucategory WHERE restaurantassociation =".$restaurantID;
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


    public static function getItemList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_ivars.menuitem";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;

    }


    public static function getItemListByRestaurantId($restaurantID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ehess84_ivars.menuitem WHERE restaurantassociation =".$restaurantID;
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


}