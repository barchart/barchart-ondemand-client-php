## PHP Client for Barchart OnDemand
Get access to Barchart's market data through Barchart OnDemand.

https://www.barchart.com/ondemand

### Installation
```
composer require barchart/ondemand-client
```

### Usage
```php
require_once 'vendor/autoload.php';

use Barchart\OnDemand\Client;

$ondemand = new Client('YOUR API KEY');
$results = $ondemand->getQuote(['symbols' => 'AAPL,AMZN']);

// Generic request
$results = $ondemand->makeRequest('getQuote', ['symbols' => 'AAPL,AMZN']);
```
