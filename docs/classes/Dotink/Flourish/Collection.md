# Collection
## An extremely simple collection which is meant to be extended

_Copyright (c) 2015, Matthew J. Sahagian_.
_Please reference the LICENSE.md file at the root of this distribution_

#### Namespace

`Dotink\Flourish`

#### Imports

<table>

	<tr>
		<th>Alias</th>
		<th>Namespace / Class</th>
	</tr>
	
	<tr>
		<td>Iterator</td>
		<td>Iterator</td>
	</tr>
	
</table>

#### Authors

<table>
	<thead>
		<th>Name</th>
		<th>Handle</th>
		<th>Email</th>
	</thead>
	<tbody>
	
		<tr>
			<td>
				Matthew J. Sahagian
			</td>
			<td>
				mjs
			</td>
			<td>
				msahagian@dotink.org
			</td>
		</tr>
	
	</tbody>
</table>

## Properties

### Instance Properties
#### <span style="color:#6a6e3d;">$data</span>

The data in the collection

#### <span style="color:#6a6e3d;">$cache</span>

A simple dereference cache




## Methods

### Instance Methods
<hr />

#### <span style="color:#3e6a6e;">__construct()</span>

Create a new collection

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$data
			</td>
			<td>
									<a href="http://php.net/language.types.array">array</a>
				
			</td>
			<td>
				The initial data for the collection
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">rewind()</span>

Rewind the collection to the first element

###### Returns

<dl>
	
		<dt>
			mixed
		</dt>
		<dd>
			The first element in the collection
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">current()</span>

Get the current element

###### Returns

<dl>
	
		<dt>
			mixed
		</dt>
		<dd>
			The current element in the collection
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">get()</span>

Get values from the collection

##### Details

- If no name is passed, all data is returned
- If an array is passed, only the data whose keys match values in the array is returned
- If a string name is passed, the value for the key is returned, otherwise `$default`

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$name
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The name of the element
			</td>
		</tr>
					
		<tr>
			<td>
				$default
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				A default value if the item is not found
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			mixed
		</dt>
		<dd>
			The value set for the item or the default if not found
		</dd>
	
</dl>


###### Examples


```php
<?php

$collection = new Collection(['a' => 'apple', 'b' => 'banana', 'c' => 'carrot']);

$collection->get();

//
// RETURNS:
//
// ['a' => 'apple', 'b' => 'banana', 'c' => 'carrot']
//

```
			
```php
<?php

$collection = new Collection(['a' => 'apple', 'b' => 'banana', 'c' => 'carrot']);

$collection->get('b');

//
// RETURNS:
//
// 'banana'
//

```
			
```php
<?php

$collection = new Collection(['a' => 'apple', 'b' => 'banana', 'c' => 'carrot']);

$collection->get(['a', 'c']);

//
// RETURNS:
//
// ['a' => 'apple', 'c' => 'carrot']
//

```
			


<hr />

#### <span style="color:#3e6a6e;">has()</span>

Check to see if a value is set, explicitly

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$name
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The name of the element
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			TRUE if a value for the name is set, FALSE otherwise
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">key()</span>

Get the current element's name

###### Returns

<dl>
	
		<dt>
			string
		</dt>
		<dd>
			The name of the current element
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">next()</span>

Get and move to the next element

###### Returns

<dl>
	
		<dt>
			mixed
		</dt>
		<dd>
			The next elelment's value
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">set()</span>

Set the value of elements in the collection

##### Details

- If only an array is passed, the data is merged into the collection non-recursively
- If a name and value are passed but the value is NULL, the element is unset
- If a name and non-NULL value are passed, the element by that name is given the value

###### Parameters

<table>
	<thead>
		<th>Name</th>
		<th>Type(s)</th>
		<th>Description</th>
	</thead>
	<tbody>
			
		<tr>
			<td>
				$name
			</td>
			<td>
									<a href="http://php.net/language.types.string">string</a>
				
			</td>
			<td>
				The name of the element in the collection
			</td>
		</tr>
					
		<tr>
			<td>
				$value
			</td>
			<td>
									<a href="http://php.net/language.pseudo-types">mixed</a>
				
			</td>
			<td>
				The value for the element in the collection
			</td>
		</tr>
			
	</tbody>
</table>

###### Returns

<dl>
	
		<dt>
			void
		</dt>
		<dd>
			Provides no return value.
		</dd>
	
</dl>


<hr />

#### <span style="color:#3e6a6e;">valid()</span>

Check if the current element is valid

##### Details

This will look for a NULL key, which signifies the end of the element collection

###### Returns

<dl>
	
		<dt>
			boolean
		</dt>
		<dd>
			TRUE if the current element is valid, FALSE otherwise
		</dd>
	
</dl>






