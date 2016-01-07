PortaText\Command\Descriptor
===============

A command factory implementation.




* Class name: Descriptor
* Namespace: PortaText\Command





Properties
----------


### $uri

    public string $uri

The full complete URI for the request.



* Visibility: **public**


### $method

    public string $method

The HTTP method.



* Visibility: **public**


### $headers

    public string $headers

The HTTP headers.



* Visibility: **public**


### $body

    public string $body

The body of the request.



* Visibility: **public**


### $outputFile

    public string $outputFile

File where to write result to.



* Visibility: **public**


Methods
-------


### __construct

    mixed PortaText\Command\Descriptor::__construct(string $uri, string $method, array $headers, string $body, string $outputFile)

Constructor.



* Visibility: **public**


#### Arguments
* $uri **string** - &lt;p&gt;The full complete URI for the request.&lt;/p&gt;
* $method **string** - &lt;p&gt;The HTTP method.&lt;/p&gt;
* $headers **array** - &lt;p&gt;The HTTP headers.&lt;/p&gt;
* $body **string** - &lt;p&gt;The body of the request.&lt;/p&gt;
* $outputFile **string** - &lt;p&gt;File where to write result to.&lt;/p&gt;


