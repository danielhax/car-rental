//global functions
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

function get_car_details_array(base_url, id){
	$.ajax({
		url: base_url + 'cars/get_car/' + id,
		type: 'POST',
		dataType: 'JSON',
		data: {id: id},
		success: function(data){
			return data;
		},
		error: function(xhr){
			alert(xhr.responseText);
		}
	});
}

function serializedArrayRefine(arr){
	var refined_arr = {};
	for (i=0; i<arr.length; i++) {
		refined_arr[arr[i].name] = arr[i].value;
	}
	return refined_arr
}