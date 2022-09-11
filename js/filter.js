$(document).ready(function(){
$( ".genre" ).hide();
$( ".gfilter" ).hide();
$( ".title" ).show();
$( ".tfilter" ).show();

$("#title").click(function(){
  	$( ".genre" ).hide();
	$( ".gfilter" ).hide();
	$( ".title" ).show();
	$( ".tfilter" ).show();
});

$("#genre").click(function(){
  	$( ".title" ).hide();
	$( ".tfilter" ).hide();
	$( ".genre" ).show();
	$( ".gfilter" ).show();
});
});