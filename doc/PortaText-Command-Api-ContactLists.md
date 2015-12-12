PortaText\Command\Api\ContactLists
===============

The ContactLists endpoint.




* Class name: ContactLists
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


### id

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\ContactLists::id(integer $contactListId)

Sets the contact list id.



* Visibility: **public**


#### Arguments
* $contactListId **integer** - &lt;p&gt;Contact list id.&lt;/p&gt;



### name

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\ContactLists::name(string $name)

The contact list name.



* Visibility: **public**


#### Arguments
* $name **string** - &lt;p&gt;Name.&lt;/p&gt;



### description

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\ContactLists::description(string $description)

The contact list description.



* Visibility: **public**


#### Arguments
* $description **string** - &lt;p&gt;Description.&lt;/p&gt;



### csv

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\ContactLists::csv(string $filename)

Send a CSV file to blacklist contacts.



* Visibility: **public**


#### Arguments
* $filename **string** - &lt;p&gt;Full absolute path to the csv file.&lt;/p&gt;



### endpoint

    string PortaText\Command\Base::endpoint(string $method)

Returns a string with the endpoint for the given command.



* Visibility: **protected**
* This method is **abstract**.
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


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



### getArguments

    array PortaText\Command\Base::getArguments(string $method)

Returns an associative array with the arguments.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### body

    string PortaText\Command\Base::body(string $method)

Returns the body for this endpoint.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### contentType

    string PortaText\Command\Base::contentType(string $method)

Returns the content type for this endpoint.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


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



