<?php
/**
 * Created by PhpStorm.
 * User: eric
 * Date: 8/29/2015
 * Time: 11:39 AM
 */

$restaurantInfo = databaseController::getRestaurantList();
$groupInfo = databaseController::getGroupList();


//TODO: Filter by restaurant
//TODO: Filter by group
?>

<link href="/menuCreator/css/menucategoryStyling.css" rel="stylesheet" />


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
            echo '<option style="display:none" data-restaurantassociation="'.$group["restaurantassociation"].'" value='.$group["gid"].'>'.$group["gname"].'</option>';
        }; ?>
    </select>

    <section class="restaurantInfo menuCreator updateContainer">
        <?php foreach($restaurantInfo as $restaurant) {
            $restaurantName = strtolower(str_replace(" ", "-", $restaurant["rname"]));

            $catGroups = databaseController::getCategoryListByRestaurantId($restaurant["rid"]);

            echo '<article data-restid="'.$restaurant['rid'].'" class="restaurantCategories '.$restaurantName.'">';
            echo $restaurant["rname"]." Categories";
            foreach($catGroups as $catGroup){
                ?>
                
                <?php  $catGroup["activeStatus"] == 1 ? $activeStatus = "active" : $activeStatus = "inactive"; ?>
                <article data-associatedgroup="<?php echo $catGroup['groupassociation']; ?>" class="restaurants mainParent <?php echo $activeStatus; ?>"  data-dbName="menucategory"  data-idType="cid" data-neededId="<?php echo $catGroup["cid"]; ?>">
                    <div class="cname mainName"><input rel="cname" type="text" value="<?php echo $catGroup["cname"]?>" /></div>
                    <div class="cdescription mainDescription"><textarea rel="cdescription"><?php echo $catGroup["cdescription"]?></textarea></div>
                    <div class="deactivate">Active? <input  rel="activeStatus" <?php if($catGroup["activeStatus"] == 1) echo "checked = checked"; ?> type="checkbox" /></div>

                </article>
            <?php }

            echo '</article>';
        }?>
    </section>

</section>

<script>
    new formSubmits();
</script>