## PHP Client for Barchart OnDemand
Get access to Barchart's market data through Barchart OnDemand.

https://www.barchart.com/ondemand

### Installation
```
composer require barchart/ondemand-client
```

### Usage
```php
use Barchart\OnDemand\Client;

$ondemand = new Client('YOUR API KEY');
$results = $ondemand->getQuote(['symbols' => 'AAPL,AMZN']);

// Generic request
$results = $ondemand->makeRequest('getQuote', ['symbols' => 'AAPL,AMZN']);
```

#### Free API
If you're using Barchart's free OnDemand API's, you need to overwrite the host on initialization:
```php
$ondemand = new Client('YOUR API KEY', ['host' => 'marketdata.websol.barchart.com']);
```

https://www.barchart.com/ondemand/free-market-data-api

