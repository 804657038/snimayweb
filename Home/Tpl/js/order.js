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
		$('#order').hide();
		$('#result').show();
		$('#result').addClass('animated bounceInDown');
	});
	//点击查看
	$('.look').click(function(){
		$('#result').hide();
		$('#resultDetails').show();
		$('#resultDetails').addClass('animated swing');
	});
});