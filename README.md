## Installation
Install the latest version with:
```
$ composer require -
```

## Examples
Initialize object:
```
$logger = new \Y\Logger(__DIR__ . '/logs/log.log');

//$logger->setPath(__DIR__ . '/logs/log.log');
```
Write logs to a file:
```
$logger->write($var);
```