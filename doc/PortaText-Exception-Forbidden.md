PortaText\Exception\Forbidden
===============

Thrown on 403 error.




* Class name: Forbidden
* Namespace: PortaText\Exception
* Parent class: [PortaText\Exception\RequestError](PortaText-Exception-RequestError.md)





Properties
----------


### $result

    protected \PortaText\Exception\PortaText\Command\Result $result

The request result.



* Visibility: **protected**


### $descriptor

    protected \PortaText\Exception\PortaText\Command\Descriptor $descriptor

The request descriptor.



* Visibility: **protected**


Methods
-------


### getResult

    \PortaText\Exception\PortaText\Command\Result PortaText\Exception\RequestError::getResult()

Returns the request result.



* Visibility: **public**
* This method is defined by [PortaText\Exception\RequestError](PortaText-Exception-RequestError.md)




### getDescriptor

    \PortaText\Exception\PortaText\Command\Descriptor PortaText\Exception\RequestError::getDescriptor()

Returns the request descriptor.



* Visibility: **public**
* This method is defined by [PortaText\Exception\RequestError](PortaText-Exception-RequestError.md)




### __construct

    mixed PortaText\Exception\RequestError::__construct(string $message, \PortaText\Exception\PortaText\Command\Descriptor $descriptor, \PortaText\Exception\PortaText\Command\Result $result)

Constructor.



* Visibility: **public**
* This method is defined by [PortaText\Exception\RequestError](PortaText-Exception-RequestError.md)


#### Arguments
* $message **string** - &lt;p&gt;Error message.&lt;/p&gt;
* $descriptor **PortaText\Exception\PortaText\Command\Descriptor** - &lt;p&gt;The Command descriptor.&lt;/p&gt;
* $result **PortaText\Exception\PortaText\Command\Result** - &lt;p&gt;Request result.&lt;/p&gt;


