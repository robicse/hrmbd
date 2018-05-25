$('.sidebar-toggle').click(function(){
	if($('.sidebar-collapse').length){
		localStorage.removeItem('expandCollapse');
	}else{
		localStorage.setItem('expandCollapse','sidebar-collapse');
	}
});

if (localStorage.expandCollapse){
	$('body').toggleClass('sidebar-collapse');
}

$(document).ajaxStart(function(){
	$('.main-header .logo-lg b').hide();
	$('#HeaderAjaxLoader').show();
});

$(document).ajaxComplete(function(){
	$('#HeaderAjaxLoader').hide();
	$('.main-header .logo-lg b').show();
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

$(document).ready(function() {
    $('.selectpicker').select2();
});
