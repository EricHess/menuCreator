/**
 * Created by eric on 10/26/2015.
 */

$(function(){
    $("h2").click(function(){
        $(this).next("nav").slideToggle()
    })
});