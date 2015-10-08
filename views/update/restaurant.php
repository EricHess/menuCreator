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


<section class="restaurantCreator menuCreator updateContainer">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can update your restaurants to add groups, categories and menu items to. Simply click the edit button next to the desired field.</p>

    <section class="restaurantInfo">
    <?php foreach($restaurantInfo as $restaurant) {?>

        <article class="restaurants mainParent" data-idType="rid" data-restaurantId="<?php echo $restaurant["rid"]; ?>">
            <div class="rname mainName"><input rel="rname" type="text" value="<?php echo $restaurant["rname"]?>" /></div>
            <div class="rdescription mainDescription"><textarea rel="rdescription"><?php echo $restaurant["rdescription"]?></textarea></div>
        </article>
    <?php }?>
    </section>

</section>

<script>
    new formSubmits();
</script>