<?php

$collection = new Collection(['a' => 'apple', 'b' => 'banana', 'c' => 'carrot']);

$collection->get(['a', 'c']);

//
// RETURNS:
//
// ['a' => 'apple', 'c' => 'carrot']
//
