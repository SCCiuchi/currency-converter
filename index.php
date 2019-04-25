<?php
include('get_input.php');
?>
<html>
	<head>
		<meta charset="utf-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<title>Exchange rate</title>
	</head>

	<body>
		<h2>Exchange rate: sunt pe docker</h2>
		<form action="" method="post" autocomplete="off">
			<div class="form-group dropdown">
			  <select name="currency">
			    <option value="#" selected>Select Currency</option>
			        <option value="USD">USD</option>
					<option value="JPY">JPY</option>
					<option value="BGN">BGN</option>
					<option value="CZK">CZK</option>
					<option value="DKK">DKK</option>
					<option value="GBP">HUF</option>
					<option value="PLN">PLN</option>
					<option value="RON">RON</option>
					<option value="SEK">SEK</option>
					<option value="CHF">CHF</option>
					<option value="ISK">ISK</option>
					<option value="NOK">NOK</option>
					<option value="HRK">HRK</option>
					<option value="RUB">RUB</option>
					<option value="TRY">TRY</option>
					<option value="AUD">AUD</option>
					<option value="BRL">BRL</option>
					<option value="CAD">CAD</option>
					<option value="CNY">CNY</option>
					<option value="HKD">HKD</option>
					<option value="IDR">IDR</option>
					<option value="ILS">ILS</option>
					<option value="INR">INR</option>
					<option value="KRW">KRW</option>
					<option value="MXN">MXN</option>
					<option value="MYR">MYR</option>
					<option value="NZD">NZD</option>
					<option value="PHP">PHP</option>
					<option value="SGD">SGD</option>
					<option value="THB">THB</option>
					<option value="ZAR">ZAR</option>
			  </select>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
        <hr>
        <?php
            echo $values;
        ?>
	</body>
</html>
