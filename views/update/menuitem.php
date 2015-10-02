<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:39 AM
 */

$restaurantInfo = databaseController::getRestaurantList();
//TODO: Create edit functionality
//TODO: Filter by restaurant
//TODO: CLick on restaurant name first and then refresh the section with that restaurants groups
?>


<section class="restaurantCreator menuCreator">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can update your categories to add menu items to. Simply click the edit button next to the desired field.</p>

    <section class="restaurantInfo">
        <?php foreach($restaurantInfo as $restaurant) {
            $restaurantName = strtolower(str_replace(" ", "-", $restaurant["rname"]));

            $itemGroups = databaseController::getItemListByRestaurantId($restaurant["rid"]);
            echo $restaurant["rname"]." Items";
            echo '<article class="'.$restaurantName.'">';

            foreach($itemGroups as $itemGroup){
                echo '<div class="iname">'.$itemGroup["iname"].'<button class="editBtn">Edit</button></div>';
                echo '<div class="idesc">'.$itemGroup["idescription"].'<button class="editBtn">Edit</button></div>';
                echo '<div class="iprice">'.$itemGroup["iprice"].'<button class="editBtn">Edit</button></div>';
                echo '<hr />';
            }

            echo '</article>';
        }?>
    </section>

</section>