var $ = jQuery;

$(document).ready(function () {
	$('button.c-hamburger').empty();
	$('<div />', {
		'id':'mobile-toggle-wrapper'
	}).appendTo('button.c-hamburger')

	$('<span />', {
		'class': 'fas fa-th'
	}).appendTo('#mobile-toggle-wrapper');



	/*$('<span />', {
		'class':'line one',
		'style': 'top:-5px'
	}).appendTo('button.c-hamburger')
	$('<span />', {
		'class':'line two',
		'style': 'top:0'
	}).appendTo('button.c-hamburger')
	$('<span />', {
		'class':'line three',
		'style': 'top:5px'
	}).appendTo('button.c-hamburger')
	*/
})