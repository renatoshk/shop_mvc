$(document).ready(function(){
    $("#delete-product-button").click(function() {
        var url=$(this).val();
        var values = [];
        $('.delete-checkbox:checkbox:checked').each(function(i){
            values[i] = parseInt($(this).val());
        });
        values=JSON.stringify(values);
        console.log(values)
        $.ajax({
            type:"POST",
            url:url,
            data:{
             'product_ids':values
            },
            dataType: 'JSON',
            success: function(data){
                   console.log(data);
            }
        });
    });
});
function loadAttributes(selector,url){
    var selectedValue=$(selector).find(":selected").val();
    $.ajax({
        type:"GET",
        url:url+"/attributes/getByProductTypeId/"+selectedValue,
        dataType: 'JSON',
        success: function(data){
            if(data.length>0){
                $template = '';
                $.each(data, function(index, value ) {
                    $template += '<div class="form-group d-flex align-items-center"><label for="price">'+value.attributeName+ '('+value.attributeUnit+')</label><input type="'+value.attributeType+'" class="form-control ml-3" id="'+value.attributeName.toLowerCase()+'" name="attribute_id_'+value.attributeId+'"></div><small>'+value.attributeDescription+'</small>';
                });
                $(".js-append-attributes").html($template);
            }
        }
    });
}