PortaText\Command\ICommand
===============

An API command interface.




* Interface name: ICommand
* Namespace: PortaText\Command
* This is an **interface**






Methods
-------


### arguments

    array PortaText\Command\ICommand::arguments(string $method)

Returns an associative array with the arguments.



* Visibility: **public**


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### endpoint

    string PortaText\Command\ICommand::endpoint(string $method)

Returns a string with the endpoint for the given command.



* Visibility: **public**


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### contentType

    string PortaText\Command\ICommand::contentType(string $method)

Returns the content type for this endpoint.



* Visibility: **public**


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### body

    string PortaText\Command\ICommand::body(string $method)

Returns the body for this endpoint.



* Visibility: **public**


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### get

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::get()

Runs this command with the given method and returns the result.



* Visibility: **public**




### post

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::post()

Runs this command with the given method and returns the result.



* Visibility: **public**




### put

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::put()

Runs this command with the given method and returns the result.



* Visibility: **public**




### delete

    \PortaText\Command\PortaText\Command\ICommand PortaText\Command\ICommand::delete()

Runs this command with the given method and returns the result.



* Visibility: **public**




### setClient

    \PortaText\Command\PortaText\Api\Api PortaText\Command\ICommand::setClient(\PortaText\Command\PortaText\Client\Client $client)

Sets the API client to use.



* Visibility: **public**


#### Arguments
* $client **PortaText\Command\PortaText\Client\Client** - &lt;p&gt;New injected client.&lt;/p&gt;


