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

<link href="/menuCreator/css/menugroupStyling.css" rel="stylesheet" />

<section class="restaurantCreator menuCreator updateContainer">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can update your groups to add categories and menu items to. Simply click the edit button next to the desired field.</p>

    <section class="groupInfo">
        <?php foreach($restaurantInfo as $restaurant) {
            $restaurantName = strtolower(str_replace(" ", "-", $restaurant["rname"]));
            $restGroups = databaseController::getGroupListByRestaurantId($restaurant["rid"]);

            echo '<article class="restaurantGroups '.$restaurantName.'">';
            echo $restaurant["rname"]." Groups";
                foreach($restGroups as $restGroup){ ?>

                    <?php  $restGroup["activeStatus"] == 1 ? $activeStatus = "active" : $activeStatus = "inactive"; ?>

                    <article class="restaurants mainParent <?php echo $activeStatus; ?>"  data-dbName="menugroup"  data-idType="gid" data-neededId="<?php echo $restGroup["gid"]; ?>">
                        <div class="gname mainName"><input rel="gname" type="text" value="<?php echo $restGroup["gname"]?>" /></div>
                        <div class="gdescription mainDescription"><textarea rel="gdescription"><?php echo $restGroup["gdescription"]?></textarea></div>
                        <div class="deactivate">Active? <input  id="deactivate" rel="activeStatus" <?php if($restGroup["activeStatus"] == 1) echo "checked = checked"; ?> type="checkbox" /></div>
                        <div class="deleteMe"><button id="delete" rel="del" type="checkbox" data-genus="menugroup">Delete This Menu Group</button></div>

                    </article>
                <?php }

            echo '</article>';
        }?>
    </section>

</section>

<script>
    new formSubmits();
</script>