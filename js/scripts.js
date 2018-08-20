$(document).ready(function () {
	$('.menu-icon').on('click', function (e) {
		e.preventDefault();
		$('menu').toggleClass('menu-active');
	});
});