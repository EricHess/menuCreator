<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:40 AM
 */

$restaurantInfo = databaseController::getRestaurantList();
$groupInfo = databaseController::getGroupList();
?>

<link href="/menuCreator/css/menucategoryStyling.css" rel="stylesheet" />
<section class="menuCategoryCreator  menuCreator">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can create a new Menu Category to add menu items to. Simply fill in the form below.</p>
    <p>In this tool, menu categories are defined as Appetizer, Entrees, Desserts etc...</p>


    <form id="menuCategory" name="menuCategory" class="menuCategory">
        <input type="hidden" name="creationType" value="menucategory" />
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
        <br />
        <label for="menuCategoryName">Menu Category Name: </label>
        <input type="text" name="menuCategoryName" placeholder="Enter Menu Category Name Here" /><br />
        <label for="menuCategoryName">Category Description: </label>
        <textarea cols="50" rows="15" name="menuCategoryDescription" placeholder="Enter Menu Category Description Here"></textarea>
        <br />
        <input class="savemenuCategoryAndClose" type="submit" value="Save Menu Group And Close"/>
        <input class="savemenuCategoryAndAdd" type="submit" value="Save Menu Group And Add Another`"/>
        <button type="reset" value="Clear Form" >Clear Form</button>
    </form>

</section>


<script>
    new formSubmits();
</script>