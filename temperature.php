<?php 
   $req_url = 'https://v6.exchangerate-api.com/v6/61ca80361d8817d9d4c71963/latest/USD';
$response_json = file_get_contents($req_url);
$response=json_decode($response_json);
//echo '<pre>';print_r($response);

// Continuing if we got a result
if(false !== $response_json) {

    // Try/catch for json_decode operation
    try {

		// Decoding
		$response = json_decode($response_json);

		// Check for success
		if('success' === $response->result) {

			// YOUR APPLICATION CODE HERE, e.g.
			$base_price = 12; // Your price in USD
			$EUR_price = round(($base_price * $response->conversion_rates->EUR), 2);

		}

    }
    catch(Exception $e) {
        // Handle JSON parse error...
    }

}

if(isset($_POST['Name'])){
echo $_POST['Name'];
}
?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<h1>Currency Exchange</h1>

	<label>Name: </label><input type='text' name='name'>
	<input type="submit" name="submit" onclick="submit()">

	<script type="text/javascript">
		
   function submit()
    {
        $.ajax({
            url: 'http://localhost/Data/temperature.php',
           type: 'post',
           data: {Name:'Amit'}
      });
    }	</script>

</body>
</html>