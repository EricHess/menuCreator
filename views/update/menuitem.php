<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:39 AM
 */

$restaurantInfo = databaseController::getRestaurantList();
$groupInfo = databaseController::getGroupList();
$categoryInfo = databaseController::getCategoryList();
//TODO: Create edit functionality
//TODO: Filter by restaurant
//TODO: CLick on restaurant name first and then refresh the section with that restaurants groups
?>

<link href="/menuCreator/css/menuitemStyling.css" rel="stylesheet" />

<section class="restaurantCreator menuCreator">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can update your categories to add menu items to. Simply click the edit button next to the desired field.</p>

    <select class="restaurantSep" id="associatedRestaurantName">
        <option>Select A Restaurant...</option>
        <?php foreach($restaurantInfo as $restaurant) {
            echo '<option value='.$restaurant["rid"].'>'.$restaurant["rname"].'</option>';
        }; ?>
    </select>

    <select class="groupSep" id="associatedGroupName">
        <option>Select A Group...</option>
        <?php foreach($groupInfo as $group) {
            //NEED TO FILTER FROM RESTAURANT ASSOCIATIONS
            echo '<option style="display:none" data-restaurantassociation="'.$group["restaurantassociation"].'" value='.$group["gid"].'>'.$group["gname"].'</option>';
        }; ?>
    </select>


    <select class="categorySep" id="associatedCategoryName">
        <option>Select A Category...</option>
        <?php foreach($categoryInfo as $category) {
            //NEED TO FILTER FROM GROUP ASSOCIATION
            echo '<option  style="display:none"  data-groupassociation="'.$category["groupassociation"].'" value='.$category["cid"].'>'.$category["cname"].'</option>';
        }; ?>
    </select>



    <section class="restaurantInfo menuCreator updateContainer">

        <!-- TODO: add drop downs for each resaurant list of category and each category list of groups-->

        <br />
        <br />

        <?php foreach($restaurantInfo as $restaurant) {
            $restaurantName = strtolower(str_replace(" ", "-", $restaurant["rname"]));

            $restGroups = databaseController::getGroupListByRestaurantId($restaurant["rid"]);

            //NEED TO SEPARATE OUT BY CATEGORY WITHIN RESTAURANT
            echo '<article data-id="'.$restaurant["rid"].'" class="restaurantItems '.$restaurantName.'">';
            echo '<h3>'.$restaurant["rname"].' Items</h3>';
            //SPIT OUT EACH GROUP
            foreach($restGroups as $restGroup){
                $groupID=$restGroup["gid"];
                $groupCategories = databaseController::getCategoryListByGroupId($groupID);

                echo "<article data-restaurant='".$restGroup['restaurantassociation']."' data-groupID='".$groupID."' class='restaurantGroup'>";
                    echo "<strong>".$restGroup['gname']."</strong><br />";
                    //SPIT OUT EACH CATEGORY
                    foreach($groupCategories as $groupCategory){
                        $catID = $groupCategory["cid"];
                        $menuItems = databaseController::getItemListByCategoryId($catID);

                        echo "<article data-catID='".$catID."'>";
                            echo "<strong>".$groupCategory['cname']."</strong><br />";
                            //SPIT OUT EACH MENU ITEM
                            foreach($menuItems as $menuItem){
                                $menuItem["activeStatus"] == 1 ? $activeStatus = "active" : $activeStatus = "inactive";

                                ?>

                                <article class="restaurants mainParent <?php echo $activeStatus; ?>" data-groupID="<?php echo $menuItem["groupassociation"]?>" data-restaurantID="<?php echo $menuItem["restaurantassociation"]?>" data-categoryID="<?php echo $menuItem["categoryassociation"]?>" data-dbName="menuitem"  data-idType="iid" data-neededId="<?php echo $menuItem["iid"]; ?>">
                                    <div class="iname mainName">Item Name: <input rel="iname" type="text" value="<?php echo $menuItem["iname"]?>" /></div>
                                    <div class="idescription mainDescription">Item Description: <textarea rel="idescription"><?php echo $menuItem["idescription"]?></textarea></div>
                                    <div class="iprice mainDescription">Item Price: <input type="text" rel="iprice" value="<?php echo $menuItem["iprice"]?>" /></div>
                                    <div class="item_order mainDescription">Item Order: <input type="text" rel="item_order" value="<?php echo $menuItem["item_order"]?>" /></div>
                                    <div class="deactivate">Active? <input  id="deactivate" rel="activeStatus" <?php if($menuItem["activeStatus"] == 1) echo "checked = checked"; ?> type="checkbox" /></div>
                                    <div class="deleteMe"><button id="delete" rel="del" type="checkbox" data-genus="menuitem">Delete This Menu Item</button></div>
                                    <div class="changeCategory">Change parent category to:
                                        <select id="changeCategory">
                                            <option value="">Select One...</option>
                                        <?php
                                            foreach($groupCategories as $groupCategory){
                                                echo "<option rel='categoryassociation' value='".$groupCategory['cid']."'>".$groupCategory['cname']."</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                </article>

                            <?php } ?>

<?php                        echo "</article>";
                    }

                echo "</article>";
            }
            echo "</article>";
        }?>
    </section>

</section>

<script>
    new formSubmits();
</script>