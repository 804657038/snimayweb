$('[name="cat_id[]"]').each(function(){
    if($(this).is(':checked')){
        var cat_id=$(this).val();
        $('.parent_'+cat_id).show();
    }
});
function parent_(obj){
    var cat_id=$(obj).val();
    if($(obj).is(':checked')){
        $('.parent_'+cat_id).show();
    }else{

        $('.parent_'+cat_id).hide();
        $('.parent_'+cat_id).children('[name="cat_id[]"]:checkbox').prop("checked", false);

    }
}