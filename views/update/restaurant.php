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

<link href="/menuCreator/css/restaurantStyling.css" rel="stylesheet" />

<section class="restaurantCreator menuCreator updateContainer">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can update your restaurants to add groups, categories and menu items to. Simply click the edit button next to the desired field.</p>

    <section class="restaurantInfo">
    <?php foreach($restaurantInfo as $restaurant) {?>

        <article class="restaurants mainParent" data-dbName="restaurants" data-idType="rid" data-neededId="<?php echo $restaurant["rid"]; ?>">
            <h2><?php echo $restaurant["rname"]?></h2>
            <div class="rname mainName"><input rel="rname" type="text" value="<?php echo $restaurant["rname"]?>" /></div>
            <div class="rdescription mainDescription"><textarea rel="rdescription"><?php echo $restaurant["rdescription"]?></textarea></div>
            <div class="deactivate">Active? <input  rel="activeStatus" <?php if($restaurant["activeStatus"] == 1) echo "checked = checked"; ?> type="checkbox" /></div>

        </article>
    <?php }?>
    </section>

</section>

<script>
    new formSubmits();
</script>