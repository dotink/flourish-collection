A Super Simple Collection Class
=======

This is a super simple collection class which is designed to be extended. It is mostely useful where
you need selective collection querying or default values with ease.

## Basic Usage

```php
$collection = new Dotink\Flourish\Collection([
	'a' => 'apple',
	'b' => 'banana',
	'c' => 'carrot'
]);
```

### Get a Value

```php
$collection->get('a'); // returns 'apple'
```

### Get a Value + Default

```php
$collection->get('d', 'date'); // returns 'date'
```


### Get Multiple Values

```php
$collection->get(['a', 'c']); // returns ['a' => 'apple', 'c' => 'carrot']
```


### Set a Value

```php
$collection->set('d', 'date');
```

### Set Multiple Values

```php
$collection->set([
	'e' => 'eggplant',
	'f' => 'fig'
]);
```

### Iterate Over the Collection

```php
foreach ($collection as $letter => $fruit_or_vegetable) {
	echo sprintf(
		'The letter "%s" is for "%s"',
		$letter,
		$fruit_or_vegetable
	);
}
```

## Compound Keys

It is possible to use compound keys to access data (both getting and setting) in nested arrays.

### Set Nested Data

```php
$collection->set('foo.bar', 'foobar');
```

This would result in `$collection->get('foo')` returning `['bar' => 'foobar']`.

### Get Nested Data

```php
$collection->get('foo.bar');
```

Will return `'foobar'`.
