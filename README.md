## Installation

Install the latest version with:

```
$ composer require yakiv-khorunzhyi/log
```

## Examples

How to use for database?:

```
// database
$logger = new \Y\Logger();

$logger->setStorage()->database(
    new PDO('mysql:dbname=test;host=localhost', 'test', 'test'), 
    'logs'    // table name
);
$logger->setFormatter()->database();

$logger->log([
    // db column => your value
    'name' => 'Yakov',
]);
```

Write log to file:

```
$logger->setStorage()->file(__DIR__ . '/logs/event.log');
$logger->setFormatter()->string(';');

$logger->log('Hello world');
```

## License
MIT license.