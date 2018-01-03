
var urls = img_path+"index.php/getList";
function js_aup2(cat_id2,id){
    urls += "?cat_id2="+id;
    if(push_catid[1] != null){
        urls += "&cat_id3="+push_catid[1];
    }
    if(push_catid[2] != null){
        urls += "&cat_id4="+push_catid[2];
    }
    window.location.href = urls;
}
function js_aup3(cat_id3,id){
    urls += "?cat_id3="+id;
    if(push_catid[0] != null){
        urls += "&cat_id2="+push_catid[0];
    }
    if(push_catid[2] != null){
        urls += "&cat_id4="+push_catid[2];
    }
    window.location.href = urls;
}
function js_aup4(cat_id4,id){
    urls += "?cat_id4="+id;
    if(push_catid[0] != null){
        urls += "&cat_id2="+push_catid[0];
    }
    if(push_catid[1] != null){
        urls += "&cat_id3="+push_catid[1];
    }
    window.location.href = urls;
}

$('.cat_id2').on('click',function(){
    $(this).parent('.schoice').animate({'width':'0%','padding':'0%'},400,function(){
        $(this).remove();
    });
    var cat_id3 = $('.cat_id3').attr('index');
    var cat_id4 = $('.cat_id4').attr('index');
    if(cat_id3 && cat_id4){
        urls += "?cat_id3="+cat_id3+"&cat_id4="+cat_id4;
    }else if(cat_id3){
        urls += "?cat_id3="+cat_id3;
    }else if(cat_id4){
        urls += "?cat_id4="+cat_id4;
    }
    window.location.href = urls;
});
$('.cat_id3').on('click',function(){
    $(this).parent('.schoice').animate({'width':'0%','padding':'0%'},400,function(){
        $(this).remove();
    });
    var cat_id2 = $('.cat_id2').attr('index');
    var cat_id4 = $('.cat_id4').attr('index');
    if(cat_id2 && cat_id4){
        urls += "?cat_id2="+cat_id2+"&cat_id4="+cat_id4;
    }else if(cat_id2){
        urls += "?cat_id2="+cat_id2;
    }else if(cat_id4){
        urls += "?cat_id4="+cat_id4;
    }
    window.location.href = urls;
});
$('.cat_id4').on('click',function(){
    $(this).parent('.schoice').animate({'width':'0%','padding':'0%'},400,function(){
        $(this).remove();
    });
    var cat_id2 = $('.cat_id2').attr('index');
    var cat_id3 = $('.cat_id3').attr('index');
    if(cat_id2 && cat_id3){
        urls += "?cat_id2="+cat_id2+"&cat_id3="+cat_id3;
    }else if(cat_id2){
        urls += "?cat_id2="+cat_id2;
    }else if(cat_id3){
        urls += "?cat_id3="+cat_id3;
    }
    window.location.href = urls;
});

function details(id) {
    window.location.href = img_path+"index.php/getGoodsDetail?id="+id;
}
