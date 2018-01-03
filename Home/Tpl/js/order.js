function looks(code){
    var url = img_path+"/index.php/getOrderResult?code="+code;
    $.get(url,function(res){
        var result = JSON.parse(res);
        $('#result').hide();
        $('#resultDetails').show();
        $('#resultDetails').addClass('animated swing');

        $("#danH").html('订单号：'+result.mergeNumber);
        $("#status").html('订单状态：'+result.status);
        $("#acceptDate").html('受理时间：'+result.acceptDate);
        $("#planMaterialDate").html('打款时间：'+result.planMaterialDate);
        $("#quotedPriceDate").html('生产时间：'+result.quotedPriceDate);
        $("#expectStorageDate").html('入库时间：'+result.expectStorageDate);
        $("#expectDeliverDate").html('发货时间：'+result.expectDeliverDate);

    });
}
$(function(){
    //回到列表
    $('.rList').click(function(){
        $('#resultDetails').hide();
        $('#result').show();
        $('#result').addClass('animated tada');
    });
    //回到搜索
    $('.rSearch').click(function(){
        $('#result').hide();
        $('#order').show();
        $('#order').addClass('animated bounceInUp');
    });

    //搜索
    $('.sbtn button').click(function(){
        var phone = $("#phone").val();
        if(phone == ''){
            layer.msg('请输入手机号码');
            return false;
        }
        var url = img_path+"/index.php/getOrder?phone="+phone;
        $.get(url,function(res){
            var datas = JSON.parse(res);
            var data1 = datas.data;
            var html="";
            $('#order').hide();
            $('#result').show();
            $('#result').addClass('animated bounceInDown');
            if(data1 != ''){
                html +='<tr>';
                html +='<td>序号</td>';
                html +='<td>订单号</td>';
                html +='<td>状态</td>';
                html +='<td>生产信息</td>';
                html +='</tr>';
                var index=0;
                for(item in data1){
                    index += 1;
                    html +='<tr>';
                    html +='<td>'+index+'</td>';
                    html +='<td>'+data1[item].orderno+'</td>';
                    html +='<td>'+data1[item].status+'</td>';
                    html +='<td><button class="look" onclick="looks(\''+data1[item].orderno+'\')">点击查看</button></td>';
                    html +='</tr>';
                }
                $('#shop_y').html(html);
                //点击查看

            }else{
                $('#shop_n').show();
            }
        });
    });

    //$('.look').click(function(){
    //    $('#result').hide();
    //    $('#resultDetails').show();
    //    $('#resultDetails').addClass('animated swing');
    //});
});
