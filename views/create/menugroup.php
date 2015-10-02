<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:39 AM
 */

//TODO: Create database table for menugroup
//TODO: Grab Restaurant Names for dropdown
$restaurantInfo = databaseController::getRestaurantList();
?>

<section class="menuGroupCreator menuCreator">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can create a new Menu Group to add categories and menu items to. Simply fill in the form below.</p>
    <p>In this tool, menu groups are defined as Lunch, Dinner, Fresh Sheet etc...</p>


    <form id="menuGroup" name="menuGroup" class="menuGroup">
        <input type="hidden" name="creationType" value="menugroup" />
        <label for="associatedRestaurantName">Associated Restaurant Name: </label>
        <select id="associatedRestaurantName" class="associatedRestaurantName" name="associatedRestaurantName">
            <option value="">Select A Restaurant...</option>
            <?php foreach($restaurantInfo as $restaurants){
                echo '<option value="'.$restaurants["rid"].'">'.$restaurants["rname"].'</option>';
            }?>
        </select>
        <br />
        <label for="menuGroupName">Menu Group Name: </label>
        <input type="text" name="menuGroupName" placeholder="Enter Menu Group Name Here" /><br />
        <label for="menuGroupName">Menu Group Description: </label>
        <textarea cols="50" rows="15" name="menuGroupDescription" placeholder="Enter Menu Group Description Here"></textarea>
            <br />
        <input class="saveMenuGroupAndClose" type="submit" value="Save Menu Group And Close"/>
        <input class="saveMenuGroupAndAdd" type="submit" value="Save Menu Group And Add Another"/>
        <button type="reset" value="Clear Form" >Clear Form</button>
    </form>

</section>

<script>
    new formSubmits();
</script>