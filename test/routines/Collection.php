<?php namespace Dotink\Lab
{
	use Dotink\Flourish\Collection;

	return [

		/**
		 *
		 */
		'setup' => function($data, $shared)
		{
			needs($data['root'] . '/src/Collection.php');
			needs($data['root'] . '/test/shims/NotFoundException.php');
		},

		/**
		 *
		 */
		'tests' => [

			/**
			 *
			 */
			'Setting / Getting' => function($data, $shared)
			{
				$collection = new Collection([
					'a' => 'apple',
					'b' => 'banana'
				]);

				$collection->set('c', 'carrot');

				$assertion = assert('Dotink\Flourish\Collection::get')-> using($collection);

				$assertion
					-> with()
					-> equals([
						'a' => 'apple',
						'b' => 'banana',
						'c' => 'carrot',
					])

					-> with(['a', 'b'])
					-> equals([
						'a' => 'apple',
						'b' => 'banana'
					])

					-> with('c')
					-> equals('carrot')

					//
					// Repeat for cached query
					//

					-> with('c')
					-> equals('carrot')

					-> with(['d'], 'date')
					-> equals(['d' => 'date'])
				;

				$collection->set(['b' => 'blueberry']);

				$assertion
					-> with()
					-> equals([
						'a' => 'apple',
						'b' => 'blueberry',
						'c' => 'carrot',
					])
				;
			},

			'Iteration' => function($data, $shared) {
				$keys       = array();
				$values     = array();
				$collection = new Collection([
					'a' => 'apple',
					'b' => 'banana'
				]);


				foreach ($collection as $key => $value) {
					$keys[]   = $key;
					$values[] = $value;
				}

				assert($keys)->equals(['a', 'b']);
				assert($values)->equals(['apple', 'banana']);
			},

			'Compound Keys' => function($data, $shared) {
				$collection = new Collection([
					'foo' => ['bar' => 'foobar']
				]);

				$collection->set('bar.foo', 'test');

				assert('Dotink\Flourish\Collection::get')
					-> using($collection)
					-> with('foo.bar')
					-> equals('foobar')

					-> with('bar')
					-> equals(['foo' => 'test'])
				;
			},

			'Implicit Unset' => function($data, $shared) {

				$collection = new Collection([
					'foo' => ['bar' => 'foobar']
				]);

				$collection->set('foo.bar');
				$collection->set('no.data');

				assert('Dotink\Flourish\Collection::get')
					-> using($collection)
					-> with('foo.bar')
					-> equals(NULL)
				;
			}
		]
	];
}
