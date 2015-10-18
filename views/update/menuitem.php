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
        Pick Your Restaurant
        <select class="restaurantSep">
            <?php foreach($restaurantInfo as $restaurant) {
                echo '<option value='.$restaurant["rid"].'>'.$restaurant["rname"].'</option>';
            }; ?>
        </select>

        <!-- TODO: add drop downs for each resaurant list of category and each category list of groups-->

        <br />
        <br />

        <?php foreach($restaurantInfo as $restaurant) {
            $restaurantName = strtolower(str_replace(" ", "-", $restaurant["rname"]));

            $restGroups = databaseController::getGroupListByRestaurantId($restaurant["rid"]);
            echo $restaurant["rname"]." Items";
            //NEED TO SEPARATE OUT BY CATEGORY WITHIN RESTAURANT
            echo '<article class="'.$restaurantName.'">';
            //SPIT OUT EACH GROUP
            foreach($restGroups as $restGroup){
                $groupID=$restGroup["gid"];
                $groupCategories = databaseController::getCategoryListByGroupId($groupID);

                echo "<article data-groupID='".$groupID."' class='restaurantGroup'>";
                    echo "<strong>".$restGroup['gname']."</strong><br />";
                    //SPIT OUT EACH CATEGORY
                    foreach($groupCategories as $groupCategory){
                        $catID = $groupCategory["cid"];
                        $menuItems = databaseController::getItemListByCategoryId($catID);

                        echo "<article data-catID='".$catID."'>";
                            echo "<strong>".$groupCategory['cname']."</strong><br />";
                            //SPIT OUT EACH MENU ITEM
                            foreach($menuItems as $menuItem){?>

                                <article class="restaurants mainParent" data-groupID="<?php echo $menuItem["groupassociation"]?>" data-restaurantID="<?php echo $menuItem["restaurantassociation"]?>" data-categoryID="<?php echo $menuItem["categoryassociation"]?>" data-dbName="menuitem"  data-idType="iid" data-neededId="<?php echo $menuItem["iid"]; ?>">
                                    <div class="iname mainName">Item Name: <input rel="iname" type="text" value="<?php echo $menuItem["iname"]?>" /></div>
                                    <div class="idescription mainDescription">Item Description: <textarea rel="idescription"><?php echo $menuItem["idescription"]?></textarea></div>
                                    <div class="iprice mainDescription">Item Price: <input type="text" rel="iprice" value="<?php echo $menuItem["iprice"]?>" /></div>
                                    <div class="item_order mainDescription">Item Order: <input type="text" rel="item_order" value="<?php echo $menuItem["item_order"]?>" /></div>
                                </article>

                            <?php } ?>

<?php                        echo "</article>";
                    }

                echo "</article>";
            }

        }?>
    </section>

</section>

<script>
    new formSubmits();
</script>