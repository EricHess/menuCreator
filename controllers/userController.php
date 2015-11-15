<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 11/14/2015
 * Time: 9:25 PM
 */
require('databaseController.php');
userController::userVerify($_POST);

class userController {

    public static function userVerify($usertest){

        $username = $usertest["username"];
        $apikey = $usertest["apikey"];

        $connect = databaseController::connectToDatabase();
        $sqlStatement = "SELECT * from ehess84_ivars.menu_users WHERE username='".$username."' AND apikey='".$apikey."'";
        $arr = array();
        $result = mysqli_query($connect,$sqlStatement);
        while($row = mysqli_fetch_assoc($result)) {
            $arr[] = $row;
        }

        if(count($arr) != 1){
            return false;
        }else{
            session_start();
            $_SESSION["loggedin"] = "loggedin";
            echo "clear";
        }

    }

}