
jQuery(document).ready(function ($) {

    var ff=function() {

    jQuery('.all_prod').html("");
    var bonuse=[];
    /*var type=[];
    var style=[];
    var fit=[];*/
    var term_id=jQuery('#cat_id').text();
    
    jQuery(".bonuse_filter input:checked").each(function(){
        var bonuse_id=jQuery(this).attr('name');
        bonuse.push(bonuse_id);
    });
    
    /*jQuery(".type_filter input:checked").each(function(){
        var type_id=jQuery(this).attr('name');
        type.push(type_id);
    });
    jQuery(".style_filter input:checked").each(function(){
        var style_id=jQuery(this).attr('name');
        style.push(style_id);
    });
    jQuery(".fit_filter input:checked").each(function(){
        var fit_id=jQuery(this).attr('name');
        fit.push(fit_id);
    });*/
    
    var data={
        'filter':1,
        'term_id':term_id,
        'bonuse':bonuse
        /*'type':type,
        'style':style,
        'fit':fit*/
    }

    var url="http://ludolos.local/ajax.php";
    
    jQuery.post(url,data,function(data){
            jQuery('.all_prod').append(data);
        });
    }

});

