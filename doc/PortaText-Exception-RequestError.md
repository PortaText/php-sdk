PortaText\Exception\RequestError
===============

Thrown on HTTP request error.




* Class name: RequestError
* Namespace: PortaText\Exception
* Parent class: [PortaText\Exception\Base](PortaText-Exception-Base.md)





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




### getDescriptor

    \PortaText\Exception\PortaText\Command\Descriptor PortaText\Exception\RequestError::getDescriptor()

Returns the request descriptor.



* Visibility: **public**




### __construct

    mixed PortaText\Exception\RequestError::__construct(string $message, \PortaText\Exception\PortaText\Command\Descriptor $descriptor, \PortaText\Exception\PortaText\Command\Result $result)

Constructor.



* Visibility: **public**


#### Arguments
* $message **string** - &lt;p&gt;Error message.&lt;/p&gt;
* $descriptor **PortaText\Exception\PortaText\Command\Descriptor** - &lt;p&gt;The Command descriptor.&lt;/p&gt;
* $result **PortaText\Exception\PortaText\Command\Result** - &lt;p&gt;Request result.&lt;/p&gt;


