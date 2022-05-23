
function loadAttributes(selector,url){
    var selectedValue=$(selector).find(":selected").val();
    $.ajax({
        type:"GET",
        url:url+"/attributes/getByProductTypeId/"+selectedValue,
        success: function(data){
        }
    });
}