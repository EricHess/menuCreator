/**
 * Created by eric on 10/26/2015.
 */

$(function(){
    $("h2").click(function(){
        var itemToShow = $(this).data("itemtoshow");
        $('nav.'+itemToShow).slideToggle();
    });

    $("select#associatedRestaurantName").change(function(){
        var value = $(this).val(),
        groupNameDropdown = $("select#associatedGroupName");

        groupNameDropdown.children("option[data-restaurantassociation='"+value+"']").css({display:"block"});
        groupNameDropdown.css({display:"inline"});
    });

    $("select#associatedGroupName").change(function(){
        var value = $(this).val(),
            categoryNameDropdown = $("select#associatedCategoryName");

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
        $(".restaurantItems article[data-groupid='"+value+"']").css({display:"block"});
    });

});

