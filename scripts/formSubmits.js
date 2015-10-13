var formSubmits = function(){
    this.bindEvents();
};

formSubmits.prototype.bindEvents = function(){
    $("body").on("click","input[class$='AndClose']", function(){
        var formSerialized = $(this).parents("form").serialize();
        formSubmits.prototype.saveAndDelegate("close", formSerialized);
        return false
    })
        .on("click","input[class$='AndAdd']", function(){
            var formSerialized = $(this).parents("form").serialize();
            formSubmits.prototype.saveAndDelegate("add", formSerialized);
            return false;
            //TODO: Add in what page to go to.
    })

        .on("blur", ".updateContainer input, .updateContainer textarea", function(){
            var newText = $(this).val() || $(this).text();
            var restaurantID = $(this).parents(".mainParent").attr("data-neededid");
            var IDType = $(this).parents(".mainParent").attr("data-idType");
            var dbName = $(this).parents(".mainParent").attr("data-dbName");
            var nameOrDescription = $(this).attr("rel");
            formSubmits.prototype.updateItem(nameOrDescription, dbName, newText, restaurantID, IDType);
        })

};


formSubmits.prototype.saveAndDelegate = function(delegate, element){
    $.ajax({
        type:'post',
        url:'/menuCreator/controllers/databaseController.php',
        data:element,
        success: function(){
            if(delegate === "close"){
                window.location = "/menuCreator";
            }else if(delegate ==="add"){
                location.reload();
            }

        }
    })
};

formSubmits.prototype.updateItem = function(updateType, updateDB, updateText, updatingID, IDType){
    $.ajax({
        type:'post',
        url:'/menuCreator/controllers/updateController.php',
        data:{"type": updateType, "db":updateDB, "text": updateText, "id":updatingID, "idType":IDType},
        success: function(data){
            console.log(data)
        }
    })
};