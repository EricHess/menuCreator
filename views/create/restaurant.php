<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:38 AM
 */

//Name of Restaurant
//Description of Restaurant

?>

<section class="restaurantCreator menuCreator">

    <h2>Welcome To The Restaurant Creator</h2>
    <p>From here you can create a new restaurant to add groups, categories and menu items to. Simply fill in the form below.</p>

    <form id="restaurant" name="restaurant" class="restaurant">
        <input type="hidden" name="creationType" value="restaurant" />
        <label for="restaurantName">Restaurant Name: </label>
        <input type="text" name="restaurantName" placeholder="Enter Restaurant Name Here" /><br />
        <label for="restaurantName">Restaurant Description: </label>
        <textarea cols="50" rows="15" name="restaurantDescription" placeholder="Enter Restaurant Description Here"></textarea>
            <br />
        <input class="saveRestaurantAndClose" type="submit" value="Save Restaurant And Close"/>
        <input class="saveRestaurantAndAdd" type="submit" value="Save Restaurant And Add Another"/>
        <button type="reset" value="Clear Form" >Clear Form</button>
    </form>

</section>

<script>
    new formSubmits();
</script>