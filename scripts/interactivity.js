/**
 * Created by eric on 10/26/2015.
 */

$(function(){
    $("h2").click(function(){
        var itemToShow = $(this).data("itemtoshow");
        $('nav.'+itemToShow).slideToggle();
    });

    $(".deactivate input[type='checkbox']").click(function(){

        this.checked ? $(this).parent().parent().removeClass("inactive").addClass("active") :  $(this).parent().parent().removeClass("active").addClass("inactive")

    });

    $("select#associatedRestaurantName").change(function(){
        var value = $(this).val(),
        groupNameDropdown = $("select#associatedGroupName");
        groupNameDropdown.children("option").css({display:"none"});
        groupNameDropdown.children("option[data-restaurantassociation='"+value+"']").css({display:"block"});
        groupNameDropdown.css({display:"inline"});
    });

    $("select#associatedGroupName").change(function(){
        var value = $(this).val(),
            categoryNameDropdown = $("select#associatedCategoryName");
        categoryNameDropdown.children("option").css({display:"none"});
        categoryNameDropdown.children("option[data-groupassociation='"+value+"']").css({display:"block"});
        categoryNameDropdown.css({display:"inline"});
    });

    $("select.restaurantSep").change(function(){
       var value = $(this).val();
        $(".restaurantItems").css({display:"none"});
        $(".restaurantItems[data-id='"+value+"']").css({display:"flex"})
    });


    $("select.groupSep").change(function(){
        var value = $(this).val();
        var restId = $(this).find(':selected').data('restaurantassociation');

        $(".restaurantItems > article, .restaurantCategories > article").css({display:"none"});
        $(".restaurantCategories[data-restid='"+restId+"']").css({"display":"block"});
        $(".restaurantItems > article[data-groupid='"+value+"'], .restaurantCategories[data-restid='"+restId+"'] > article[data-associatedgroup='"+value+"'").css({display:"block"});
        //NEED TO TURN ON THE CATEGORY SEP DROPDOWN WITH PROPER VALUES SHOWING
    });

    $("select.categorySep").change(function(){
        var value = $(this).val();
        $(".restaurantItems > article > article").css({display:"none"});
        $(".restaurantItems > article > article[data-catid='"+value+"']").css({display:"block"});
        //NEED TO TURN ON THE CATEGORY SEP DROPDOWN WITH PROPER VALUES SHOWING
    });

});

