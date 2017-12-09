/* Chinese initialisation for the jQuery UI date picker plugin. */
/* Written by Cloudream (cloudream@gmail.com). */
jQuery(function($){
	$.datepicker.regional['zh-CN'] = {
		closeText: '关闭',
		prevText: '&#x3c;上月',
		nextText: '下月&#x3e;',
		currentText: '当前月份',
		monthNames: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],
		monthNamesShort: ['1','2','3','4','5','6','7','8','9','10','11','12'],
		dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
		dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],
		dayNamesMin: ['日','一','二','三','四','五','六'],
		weekHeader: '周',
		dateFormat: 'yy-mm-dd',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: true,
		changeYear: true,
		changeMonth: true,
		showButtonPanel: true,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['zh-CN']);


	/** 修改Done为Clear按钮，Current为Today按钮 start **/
	//用来存放当前正在操作的日期文本框的引用。
	var datepicker_CurrentInput;
	// 设置DatePicker 的默认设置
	$.datepicker.setDefaults({
		//currentText: '今天',
		closeText: '清除',
		beforeShow: function (input, inst) {
			datepicker_CurrentInput = input;
		
			setTimeout(function(){$('#ui-datepicker-div').css("z-index",9999)},10);//JQuery UI DatePicker中z-index默认为1的解决办法
		}
	});
	// 绑定“Done”按钮的click事件，触发的时候，清除文本框的值
	$(".ui-datepicker-close").live("click", function (){
		datepicker_CurrentInput.value = "";
	});
	
	// 绑定“Current”按钮的click事件，触发的时候，文本框的值为今天
	/*$(".ui-datepicker-current").live("click", function(){
		var currentMonth = parseInt($('.ui-datepicker-today').attr('data-month')) + 1;
		if (currentMonth < 10) {
			currentMonth = "0" + currentMonth;
		}
		datepicker_CurrentInput.value = $('.ui-datepicker-today').attr('data-year') + '-' + currentMonth + '-' + $('.ui-datepicker-today > a').html();
	});*/
	/** 修改Done为Clear按钮，Current为Today按钮 end **/

	$(".calendar").datepicker();	// class="calendar" 调用
});