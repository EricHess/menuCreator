<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:40 AM
 */

$restaurantInfo = databaseController::getRestaurantList();
$groupInfo = databaseController::getGroupList();
$categoryInfo = databaseController::getCategoryList();
?>

<section class="menuItemCreator menuCreator">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can create a new Menu Item. Simply fill in the form below.</p>
    <p>In this tool, menu items are defined as the actual items people will order.</p>


    <form id="menuItem" name="menuItem" class="menuItem">
        <input type="hidden" name="creationType" value="menuitem" />
        <label for="associatedRestaurantName">Associated Restaurant Name: </label>
        <select id="associatedRestaurantName" class="associatedRestaurantName" name="associatedRestaurantName">
            <option value="">Select A Restaurant...</option>
            <?php foreach($restaurantInfo as $restaurants){
                echo '<option value="'.$restaurants["rid"].'">'.$restaurants["rname"].'</option>';
            }?>
        </select>

        <label for="associatedGroupName">Associated Group Name: </label>
        <select id="associatedGroupName" class="associatedGroupName" name="associatedGroupName">
            <option value="">Select A Group...</option>
            <?php foreach($groupInfo as $groups){
                echo '<option data-restaurantassociation="'.$groups["restaurantassociation"].'" value="'.$groups["gid"].'">'.$groups["gname"].'</option>';
            }?>
        </select>

        <label for="associatedGroupName">Associated Category Name: </label>
        <select id="associatedCategoryName" class="associatedCategoryName" name="associatedCategoryName">
            <option value="">Select A Category...</option>
            <?php foreach($categoryInfo as $categories){
                echo '<option data-groupassociation="'.$categories["groupassociation"].'" data-restaurantassociation="'.$categories["restaurantassociation"].'" value="'.$categories["cid"].'">'.$categories["cname"].'</option>';
            }?>
        </select>
        <br />
        <label for="menuItemName">Menu Item Name: </label>
        <input type="text" name="menuItemName" placeholder="Enter Menu Item Name Here" /><br />
        <label for="menuItemName">Menu Item Description: </label>
        <textarea cols="50" rows="15" name="menuItemDescription" placeholder="Enter Menu Item Description Here"></textarea>
        <br />
        <label for="pricingOption1">Price Or Pricing Options (If multiple, separate by commas)</label>
        <input type="text" name="pricingOption" id="pricingOption1" placeholder="Enter Price Text" />
        <input class="savemenuItemAndClose" type="submit" value="Save Menu Item And Close"/>
        <input class="savemenuItemAndAdd" type="submit" value="Save Menu Item And Add Another"/>

        <button type="reset" value="Clear Form" >Clear Form</button>
    </form>

</section>


<script>
    new formSubmits();
</script>