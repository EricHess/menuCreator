<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:03 AM
 */

include('./config/config.php');
require('./controllers/urlController.php');
require('./controllers/pageController.php');
require('./controllers/databaseController.php');

//Place a check for the API Key and kill if it is not there.

?>
<!doctype html>
<html>

<head>
<script src="/menuCreator/scripts/jquery.js"></script>
<script src="/menuCreator/scripts/formSubmits.js"></script>
</head>

<body>
<nav>
<h2>Add New Items</h2>
    <a href="/menuCreator/create/restaurant">+ Add A Restaurant</a>
    <a href="/menuCreator/create/menugroup">+ Add A Menu Group (Lunch, Dinner, etc..)</a>
    <a href="/menuCreator/create/menucategory">+ Add A Menu Category (Appetizer, Entree, etc..)</a>
    <a href="/menuCreator/create/menuitem">+ Add A Menu Item</a>
    <h2>Update Existing Items</h2>
    <a href="/menuCreator/update/restaurant">+ Update A Restaurant</a>
    <a href="/menuCreator/update/menugroup">+ Update A Menu Group (Lunch, Dinner, etc..)</a>
    <a href="/menuCreator/update/menucategory">+ Update A Menu Category (Appetizer, Entree, etc..)</a>
    <a href="/menuCreator/update/menuitem">+ Update A Menu Item</a>

    HANDLE MULTIPLE PRICES

</nav>

<?php

//Include the necessary page from the path
if(pageController::createPath() === false){
    http_response_code(404);
    include './views/404.php';
}else{
    include pageController::createPath().'';
}
?>

</body>

</html>