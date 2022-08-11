//-- [form-name]
add_filter( 'gform_pre_submission_filter_[form-id]', 'populate_city_state_[form-name]_form' );

function populate_city_state_[form-name]_form( $form ) {
	
	$response = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$_POST["input_[zipcode-id]"].'&sensor=true&key=[api-key]');
	$response = json_decode($response);
	

	
 	$city = $response->results[0]->address_components[1]->long_name;
 	$longState = $response->results[0]->address_components[2]->long_name;
 	$shortState = $response->results[0]->address_components[2]->short_name;
	
	if (in_array("administrative_area_level_1", $response->results[0]->address_components[2]->types)) {
 		$longState = $response->results[0]->address_components[2]->long_name;
 		$shortState = $response->results[0]->address_components[2]->short_name;
	} else if (in_array("administrative_area_level_1", $response->results[0]->address_components[3]->types)) {
 		$longState = $response->results[0]->address_components[3]->long_name;
 		$shortState = $response->results[0]->address_components[3]->short_name;
	} else if (in_array("administrative_area_level_1", $response->results[0]->address_components[4]->types)) {
 		$longState = $response->results[0]->address_components[4]->long_name;
 		$shortState = $response->results[0]->address_components[4]->short_name;
	} else if (in_array("administrative_area_level_1", $response->results[0]->address_components[5]->types)) {
 		$longState = $response->results[0]->address_components[5]->long_name;
 		$shortState = $response->results[0]->address_components[5]->short_name;
	} else {
 		$longState = '';
 		$shortState = '';
	}
	
	
 	$_POST["input_[city-id]"] = $city;
	$_POST["input_[shortState-id]"] = $shortState;
 	$_POST["input_[longState-id]"] = $longState;
      
    return $form;
}
