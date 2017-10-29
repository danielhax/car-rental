$(function(){
	
});

function get_cars(){
	$.ajax({
		url: 'cars/get_cars',
		type: 'GET',
		dataType: 'JSON',
		success: function(data){
			return data[0];
		},
		error: function(xhr){
			console.log(xhr);
		}
	});
}