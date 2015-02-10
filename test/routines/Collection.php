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
			}
		]
	];
}
