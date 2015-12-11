PortaText\Command\Api\DidSearch
===============

The dids/search endpoint.




* Class name: DidSearch
* Namespace: PortaText\Command\Api
* Parent class: [PortaText\Command\Base](PortaText-Command-Base.md)





Properties
----------


### $args

    private array $args

Arguments for endpoint invokation.



* Visibility: **private**


Methods
-------


### forCountry

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::forCountry(string $isoCode)

Set Name.



* Visibility: **public**


#### Arguments
* $isoCode **string** - &lt;p&gt;The 2 letter country ISO code.&lt;/p&gt;



### tollFree

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::tollFree()

Search only for toll free numbers.



* Visibility: **public**




### local

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::local()

Search only for local numbers.



* Visibility: **public**




### national

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::national()

Search only for national numbers.



* Visibility: **public**




### mobile

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::mobile()

Search only for mobile numbers.



* Visibility: **public**




### page

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::page(integer $page)

Return the specific page of results.



* Visibility: **public**


#### Arguments
* $page **integer** - &lt;p&gt;Page number.&lt;/p&gt;



### startsWith

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::startsWith(string $pattern)

Searches numbers that start with the specific pattern.



* Visibility: **public**


#### Arguments
* $pattern **string** - &lt;p&gt;The pattern.&lt;/p&gt;



### endsWith

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::endsWith(string $pattern)

Searches numbers that ends with the specific pattern.



* Visibility: **public**


#### Arguments
* $pattern **string** - &lt;p&gt;The pattern.&lt;/p&gt;



### contains

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\DidSearch::contains(string $pattern)

Searches numbers that contains the specific pattern.



* Visibility: **public**


#### Arguments
* $pattern **string** - &lt;p&gt;The pattern.&lt;/p&gt;



### endpoint

    string PortaText\Command\ICommand::endpoint(string $method)

Returns a string with the endpoint for the given command.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### setArgument

    array PortaText\Command\Base::setArgument(string $key, string $value)

Returns an associative array with the arguments.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $key **string** - &lt;p&gt;Name of the argument.&lt;/p&gt;
* $value **string** - &lt;p&gt;Value of the argument.&lt;/p&gt;



### delArgument

    array PortaText\Command\Base::delArgument(string $key)

Deleted an argument.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $key **string** - &lt;p&gt;Name of the argument.&lt;/p&gt;



### getArgument

    mixed|null PortaText\Command\Base::getArgument(string $key)

Returns the value for the given argument name.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $key **string** - &lt;p&gt;Name of the argument.&lt;/p&gt;



### arguments

    array PortaText\Command\ICommand::arguments(string $method)

Returns an associative array with the arguments.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### body

    string PortaText\Command\ICommand::body(string $method)

Returns the body for this endpoint.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### contentType

    string PortaText\Command\ICommand::contentType(string $method)

Returns the content type for this endpoint.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### get

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::get()

Runs this command with a GET method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### post

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::post()

Runs this command with a POST method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### put

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::put()

Runs this command with a PUT method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### delete

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::delete()

Runs this command with a DELETE method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### patch

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::patch()

Runs this command with a PATCH method and returns the result.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)




### run

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\Base::run(string $method)

Runs this command with the given method and returns the result.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $method **string** - &lt;p&gt;HTTP Method to use.&lt;/p&gt;



### setClient

    \PortaText\Command\PortaText\Api\Api PortaText\Command\ICommand::setClient(\PortaText\Command\PortaText\Client\Client $client)

Sets the API client to use.



* Visibility: **public**
* This method is defined by [PortaText\Command\ICommand](PortaText-Command-ICommand.md)


#### Arguments
* $client **PortaText\Command\PortaText\Client\Client** - &lt;p&gt;New injected client.&lt;/p&gt;



### __construct

    mixed PortaText\Command\Base::__construct()

Standard constructor.



* Visibility: **public**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)



