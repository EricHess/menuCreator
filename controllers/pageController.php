<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 5/3/2015
 * Time: 9:49 PM
 */

require_once('urlController.php');

class pageController {

    public static function determinePage(){
        $desiredPage = null;

        if(urlController::urlParametersCount() > 1){
            $desiredPage = end(urlController::returnURLParameters());
        }else{
            $desiredPage = pageController::createPath();
        }

        return $desiredPage;
    }

    public static function createPath(){
        $directPath = './views/';
        $params = urlController::returnURLParameters();
        //CHECK HERE IF IT BREAKS IN PROD THE THREE COULD BE A TWO
        for($i = 2; $i < urlController::urlParametersCount(); $i++ ){
            $directPath .= $params[$i];
            $directPath .= '/';

        }

        $directPath = rtrim($directPath, '/');

        if(file_exists($directPath.'.php')){
        return $directPath.'.php';
        } else{
            if($_SERVER['REQUEST_URI'] == '/menuCreator/' || $_SERVER['REQUEST_URI'] == '/menuCreator/' ){
                return './views/start.php';
            }else{
                return false;
            }

        }
    }

}