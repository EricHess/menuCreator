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

            $catGroups = databaseController::getCategoryListByRestaurantId($restaurant["rid"]);
            echo $restaurant["rname"]." Categories";
            echo '<article class="'.$restaurantName.'">';

            foreach($catGroups as $catGroup){
                echo '<div class="cname">'.$catGroup["cname"].'<button class="editBtn">Edit</button></div>';
                echo '<div class="cdesc">'.$catGroup["cdescription"].'<button class="editBtn">Edit</button></div>';
                echo '<hr />';
            }

            echo '</article>';
        }?>
    </section>

</section>