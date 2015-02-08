<?php namespace Dotink\Flourish
{
	use Iterator;

	class Collection implements Iterator
	{
		/**
		 *
		 */
		protected $data;


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
		public function get($name = NULL, $default = NULL)
		{
			if ($name === NULL) {
				return $this->data;
			}

			if (is_array($name)) {
				$data = array();

				foreach ($name as $key) {
					$data[$key] = $this->get($key);
				}

				return $data;
			}

			if ($this->has($name)) {
				return $this->data[$name];
			}

			return $default;
		}


		/**
		 *
		 */
		public function has($name) {
			return array_key_exists($name, $this->data);
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
				if (is_array($params = $name)) {
					$this->data = array_merge($this->data, $params);

				} elseif (array_key_exists($name, $this->data)) {
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
