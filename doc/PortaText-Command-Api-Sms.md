PortaText\Command\Api\Sms
===============

The SMS endpoint.




* Class name: Sms
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

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Sms::id(string $smsId)

Sets the sms operation id.



* Visibility: **public**


#### Arguments
* $smsId **string** - &lt;p&gt;SMS operation id.&lt;/p&gt;



### to

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Sms::to(string $target)

Sets the message destination number.



* Visibility: **public**


#### Arguments
* $target **string** - &lt;p&gt;Phone number to send message to.&lt;/p&gt;



### from

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Sms::from(string $number)

Sets the message source number.



* Visibility: **public**


#### Arguments
* $number **string** - &lt;p&gt;Phone number to send message from.&lt;/p&gt;



### useTemplate

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Sms::useTemplate(integer $templateId, array $variables)

Sets the message source number.



* Visibility: **public**


#### Arguments
* $templateId **integer** - &lt;p&gt;Use the given template as the message body.&lt;/p&gt;
* $variables **array** - &lt;p&gt;Variables to use in template.&lt;/p&gt;



### text

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Sms::text(string $text)

Sets the message text.



* Visibility: **public**


#### Arguments
* $text **string** - &lt;p&gt;Message text.&lt;/p&gt;



### clientRef

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Sms::clientRef(string $clientRef)

Set a specific custom client reference.



* Visibility: **public**


#### Arguments
* $clientRef **string** - &lt;p&gt;Your custom reference.&lt;/p&gt;



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



### arguments

    array PortaText\Command\Base::arguments(string $method)

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



