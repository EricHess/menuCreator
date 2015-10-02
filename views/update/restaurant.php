<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:38 AM
 */

$restaurantInfo = databaseController::getRestaurantList();
//TODO: Create edit functionality
?>


<section class="restaurantCreator menuCreator">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can update your restaurants to add groups, categories and menu items to. Simply click the edit button next to the desired field.</p>

    <section class="restaurantInfo">
    <?php foreach($restaurantInfo as $restaurant) {?>

        <article class="restaurants" data-restaurantId="<?php echo $restaurant["rid"]; ?>">
            <div class="rname"><?php echo $restaurant["rname"]?> <button class="editBtn">Edit</button></div>
            <div class="rdescription"><?php echo $restaurant["rdescription"]?> <button class="editBtn">Edit</button></div>
        </article>
    <?php }?>
    </section>

</section>