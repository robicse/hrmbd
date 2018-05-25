$(function() {
	function onClickHandler(date, obj) {
		/**
		 * @date is an array which be included dates(clicked date at first index)
		 * @obj is an object which stored calendar interal data.
		 * @obj.calendar is an element reference.
		 * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
		 */

		var $calendar = obj.calendar;
		var $box = $calendar.parent().siblings('.box').show();
		var text = 'You choose date ';

		if(date[0] !== null) {
			text += date[0].format('YYYY-MM-DD');
		}

		if(date[0] !== null && date[1] !== null) {
			text += ' ~ ';
		} else if(date[0] === null && date[1] == null) {
			text += 'nothing';
		}

		if(date[1] !== null) {
			text += date[1].format('YYYY-MM-DD');
		}

		$box.text(text);
		console.log(text);
	}

	// Default Calendar
	$('.calendar').pignoseCalendar({
		select: onClickHandler
	});

	// Input Calendar
	$('.input-calendar').pignoseCalendar({
		buttons: true, // It means you can give bottom button controller to the modal which be opened when you click.
	});

	// Calendar modal
	var $btn = $('.btn-calendar').pignoseCalendar({
		modal: true, // It means modal will be showed when you click the target button.
		buttons: true,
		apply: function(date) {
			$btn.next().show().text('You applied date ' + date + '.');
		}
	});

	// Color theme type Calendar
	$('.calendar-dark').pignoseCalendar({
		theme: 'dark', // light, dark
		select: onClickHandler
	});

	// Multiple picker type Calendar
	$('.multi-select-calendar').pignoseCalendar({
		multiple: true,
		select: onClickHandler
	});

	// Toggle type Calendar
	$('.toggle-calendar').pignoseCalendar({
		toggle: true,
		select: function(date, obj) {

			var $target = obj.calendar.parent().next().show().html('You selected ' + 
			(date[0] === null? 'null':date[0].format('YYYY-MM-DD')) + 
			'.' +
			'<br /><br />' +
			'<strong>Active dates</strong><br /><br />' +
			'<div class="active-dates"></div>');

			for(var idx in obj.storage.activeDates) {
				var date = obj.storage.activeDates[idx];
				if(typeof date !== 'string') {
					continue;
				}
				$target.find('.active-dates').append('<span class="label label-default">' + date + '</span>');
			}
		}
	});

	// Disabled date settings.
	!(function() {
		// IIFE Closure
		var times = 30;
		var disabledDates = [];
		for(var i=0; i<times; /* Do not increase index */) {
			var year = moment().year();
			var month = 0;
			var day = parseInt(Math.random() * 364 + 1);
			var date = moment().year(year).month(month).date(day).format('YYYY-MM-DD');
			if($.inArray(date, disabledDates) === -1) {
				disabledDates.push(date);
				i++;
			}
		}

		disabledDates.sort();

		var $dates = $('.disabled-dates-calendar').siblings('.guide').find('.guide-dates');
		for (var idx in disabledDates) {
			$dates.append('<span>' + disabledDates[idx] + '</span>');
		}

		$('.disabled-dates-calendar').pignoseCalendar({
			select: onClickHandler,
			disabledDates: disabledDates
		});
	} ());

	// I18N Calendar
	$('.language-calendar').each(function() {
		var $this = $(this);
		var lang = $this.data('lang');
		$this.pignoseCalendar({
			lang: lang
		});
	});
});

var ajaxUrl = null;

$('.data-target-url').click(function(){
	ajaxUrl = $(this).data('url');
	console.log(ajaxUrl);
});

$('#synchronize-action').click(function(){
	var date 	= $('.pignose-calendar-unit-first-active').data();
	if(date){
		ajaxUrl = ajaxUrl+'/'+date.date;
		var message = 'Sync Date : '+date.date;
		$('#synchronize-message').text(message).css({
			margin: '10px 0px 0px',
			padding: '10px',
			background:'#00A65A',
			color:'white',
			display:'block'
		});
		$.ajax({
			url 	: ajaxUrl,
			type 	: 'GET',
			success : function(resp,xhr,status){
				console.log(resp);
			},
			error : function(resp,xhr,status){
				console.log(resp);
			}
		});
	}else{
		$('#synchronize-message').text('Select a date').css({
			margin: '10px 0px 0px',
			padding: '10px',
			background:'#DD4B39',
			color:'white',
			display:'block'
		});
	}
});