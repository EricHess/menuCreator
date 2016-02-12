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
        $sql = mysqli_connect('localhost','ivars235_menu','slamclam!','ivars235_joomla');
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
        $sql = "SELECT * from ivars235_joomla.restaurants";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }

    public static function getGroupList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menugroup";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;

    }

    public static function getGroupListByRestaurantId($restaurantID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menugroup WHERE restaurantassociation =".$restaurantID." ORDER BY group_order asc";;
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


    public static function getGroupListByGID($gID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menugroup WHERE gid =".$gID;
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


    public static function getCategoryList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menucategory";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;

    }


    public static function getCategoryListByRestaurantId($restaurantID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menucategory WHERE restaurantassociation =".$restaurantID." ORDER BY category_order asc";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


    public static function getCategoryListByGroupId($groupID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menucategory WHERE groupassociation =".$groupID;
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


    public static function getItemList(){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menuitem";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;

    }


    public static function getItemListByRestaurantId($restaurantID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menuitem WHERE restaurantassociation =".$restaurantID." ORDER BY ivars235_joomla.menuitem.item_order ASC ";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


    public static function getItemListByCategoryId($categoryID){
        $connect = databaseController::connectToDatabase();
        $sql = "SELECT * from ivars235_joomla.menuitem WHERE categoryassociation =".$categoryID." ORDER BY ivars235_joomla.menuitem.item_order ASC ";
        $arr = array();
        $result = mysqli_query($connect,$sql);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }
        return $arr;
    }


}