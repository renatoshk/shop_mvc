$(document).ready(function(){
    //validation fields
    $('#product_form').validate({
        subject: {
            sku: {
                required: true
            },
            name: {
                required: true
            },
            price: {
                required: true
            },
            product_type_id: {
                required: true
            },
            attribute_id_2: {
                required: true
            },
            attribute_id_1: {
                required: true
            },
            attribute_id_3: {
                required: true
            },
            attribute_id_4: {
                required: true
            },
            attribute_id_5: {
                required: true
            },
        },
        messages: {
            sku: {
                required: 'Please, provide sku.',
            },
            name: {
                required: 'Please, provide name.',
            },
            price: {
                required: 'Please, provide name.',
            },
            product_type_id: {
                required: 'Please, provide product type.',
            },
            attribute_id_2: {
                required: 'Please, provide weight.',
            },
            attribute_id_1: {
                required: 'Please, provide size.',
            },
            attribute_id_3: {
                required: 'Please, provide height.',
            },
            attribute_id_4: {
                required: 'Please, provide width.',
            },
            attribute_id_5: {
                required: 'Please, provide length.',
            },
        },
        submitHandler: function (form) {
            form.submit();
        }
    });

    //mass delete
    $("#delete-product-button").click(function() {
        var url=$(this).val();
        var values = [];
        $('.delete-checkbox:checkbox:checked').each(function(i){
            values[i] = parseInt($(this).val());
        });
        values=JSON.stringify(values);
        $.ajax({
            type:"POST",
            url:url,
            data:{
             'product_ids':values
            },
            dataType: 'JSON',
            success: function(data){
                if(data.length>0){
                    $.each(data, function(index, value) {
                        $('#product_id_'+value).remove();
                    });
                }
            }
        });
    });
});
//load dynamic attributes function
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
                    $template += '<div class="form-group d-flex align-items-center"><label for="price">'+value.attributeName+ '('+value.attributeUnit+')</label><input required type="'+value.attributeType+'" class="form-control ml-3" id="'+value.attributeName.toLowerCase()+'" name="attribute_id_'+value.attributeId+'"></div><small>'+value.attributeDescription+'</small></br><label id="'+value.attributeName.toLowerCase()+'-error" class="error" for="'+value.attributeName.toLowerCase()+'"></label>';
                });
                $(".js-append-attributes").html($template);
            }
        }
    });
}