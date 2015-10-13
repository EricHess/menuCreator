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

    <section class="restaurantInfo menuCreator updateContainer">
        <?php foreach($restaurantInfo as $restaurant) {
            $restaurantName = strtolower(str_replace(" ", "-", $restaurant["rname"]));

            $itemGroups = databaseController::getItemListByRestaurantId($restaurant["rid"]);
            echo $restaurant["rname"]." Items";
            echo '<article class="'.$restaurantName.'">';

            foreach($itemGroups as $itemGroup){?>
                <article class="restaurants mainParent"  data-dbName="menuitem"  data-idType="iid" data-neededId="<?php echo $itemGroup["iid"]; ?>">
            <div class="iname mainName"><input rel="iname" type="text" value="<?php echo $itemGroup["iname"]?>" /></div>
            <div class="idescription mainDescription"><textarea rel="idescription"><?php echo $itemGroup["idescription"]?></textarea></div>
            <div class="iprice mainDescription"><input type="text" rel="iprice" value="<?php echo $itemGroup["iprice"]?>" /></div>
            </article>
        <?php }

        echo '</article>';
        }?>
    </section>

</section>

<script>
    new formSubmits();
</script>