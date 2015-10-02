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
    });
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

formSubmits.prototype.updateSelectDropdowns = function(associateID, selectClass){
    $.ajax({
        type:'post',
        url:'/menuCreator/controllers/databaseController.php',
        data:element,
        success: function(){
            //TODO: get id to pass to method, which will return the groups with restaurant name
        }
    })
};