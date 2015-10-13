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

            $catGroups = databaseController::getCategoryListByRestaurantId($restaurant["rid"]);
            echo $restaurant["rname"]." Categories";
            echo '<article class="'.$restaurantName.'">';

            foreach($catGroups as $catGroup){ ?>
                <article class="restaurants mainParent"  data-dbName="menucategory"  data-idType="cid" data-neededId="<?php echo $catGroup["cid"]; ?>">
                    <div class="cname mainName"><input rel="cname" type="text" value="<?php echo $catGroup["cname"]?>" /></div>
                    <div class="cdescription mainDescription"><textarea rel="cdescription"><?php echo $catGroup["cdescription"]?></textarea></div>
                </article>
            <?php }

            echo '</article>';
        }?>
    </section>

</section>

<script>
    new formSubmits();
</script>