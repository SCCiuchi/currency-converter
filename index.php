<?php
require_once(dirname(__FILE__).'/src/get_input.php');
require_once('database/db_connection.php');
?>
<!doctype html>
<html lang="en">
<head>
    <title>Currency Converter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<body class="text-center">
<div class="container">
    <div class="py-5 text-center">
        <img src="#" alt="#">
        <h2>Currency Converter</h2>
        <p class="lead">placeholder text for now...</p>
    </div>
    <div class="row row justify-content-center">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Currency Rate</span>
                <span class="badge badge-secondary badge-pill">19</span>
            </h4>
            <?= displayExchangeRate() ?>
        </div>
        <div class="col-md-8 order-md-1">
            <form action="" method="get" autocomplete="off">
                <div class="row justify-content-center">
                    <div class="col-md-8 mb-3">
                        <label for="currency">Converter</label>
                        <select class="custom-select d-block w-100" name="currency" id="currency" required>
                            <option value="None" disabled selected>Select your option</option>
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
                        <div class="invalid-feedback">
                            Please select a currency.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button type="submit" class="btn btn-primary col-md-4">Show Rate</button>
            </form>
        </div>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>