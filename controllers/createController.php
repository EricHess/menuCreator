<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/11/2015
 * Time: 10:45 PM
 */


class createController {

    public static function restaurantCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $name = mysqli_real_escape_string($connect, $createPackage['restaurantName']);
        $description =  mysqli_real_escape_string($connect, $createPackage['restaurantDescription']);
        $sqlStatement = "INSERT INTO `ehess84_menucreator`.`restaurants` (`rid`, `rname`, `rdescription`) VALUES ('','".$name."','".$description."')";
        mysqli_query($connect,$sqlStatement);
    }

    public static function groupCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $restaurantAssociation = $createPackage['associatedRestaurantName'];
        $name = mysqli_real_escape_string($connect, $createPackage['menuGroupName']);
        $description = mysqli_real_escape_string($connect, $createPackage['menuGroupDescription']);
        $sqlStatement = "INSERT INTO `ehess84_menucreator`.`menugroup` (`gid`, `restaurantassociation`, `gname`, `gdescription`) VALUES ('','".$restaurantAssociation."','".$name."','".$description."')";
        mysqli_query($connect,$sqlStatement);
    }

    public static function categoryCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $restaurantAssociation = $createPackage['associatedRestaurantName'];
        $groupAssociation = $createPackage['associatedGroupName'];
        $name = mysqli_real_escape_string($connect, $createPackage['menuCategoryName']);
        $description = mysqli_real_escape_string($connect, $createPackage['menuCategoryDescription']);
        $sqlStatement = "INSERT INTO `ehess84_menucreator`.`menucategory` (`cid`, `restaurantassociation`, `groupassociation`, `cname`, `cdescription`) VALUES ('','".$restaurantAssociation."','".$groupAssociation."','".$name."','".$description."')";
        mysqli_query($connect,$sqlStatement);

    }

    public static function itemCreate($createPackage){
        $connect = databaseController::connectToDatabase();
        $restaurantAssociation = $createPackage['associatedRestaurantName'];
        $groupAssociation = $createPackage['associatedGroupName'];
        $categoryAssociation = $createPackage['associatedCategoryName'];
        $name = mysqli_real_escape_string($connect, $createPackage['menuItemName']);
        $description = mysqli_real_escape_string($connect, $createPackage['menuItemDescription']);
        $price = mysqli_real_escape_string($connect, $createPackage['pricingOption1']);
        $sqlStatement = "INSERT INTO `ehess84_menucreator`.`menuitem` (`iid`, `restaurantassociation`, `groupassociation`,  `categoryassociation`, `iname`, `idescription`, `iprice`) VALUES ('','".$restaurantAssociation."','".$groupAssociation."','".$categoryAssociation."','".$name."','".$description."','".$price."')";
        mysqli_query($connect,$sqlStatement);

    }

}