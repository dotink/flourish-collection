<?php namespace Dotink\Flourish
{
	class Collection implements Iterator
	{
		/**
		 *
		 */
		private $data;


		/**
		 *
		 */
		public function __construct($data = array())
		{
			$this->data = $data;
		}


		/**
		 *
		 */
		public function rewind()
		{
			return reset($this->data);
		}


		/**
		 *
		 */
		public function current()
		{
			return current($this->data);
		}


		/**
		 * Get a value from the collection
		 *
		 * @param string $name The name of the item
		 * @param mixed $default A default value if the item is not found
		 * @return mixed The value set for the item or the default if not found
		 */
		public function get($name, $default = NULL)
		{
			if (isset($this->data[$name])) {
				return $this->data[$name];
			}

			return $default;
		}



		/**
		 *
		 */
		public function key()
		{
			return key($this->data);
		}


		/**
		 *
		 */
		public function next()
		{
			return next($this->data);
		}


		/**
		 *
		 */
		public function set($name, $value = NULL)
		{
			if ($value === NULL) {
				if (isset($this->data[$name])) {
					unset($this->data[$name]);
				}

			} else {
				$this->data[$name] = $value;
			}
		}


		/**
		 *
		 */
		public function valid()
		{
			return key($this->data) !== null;
		}
	}
}

