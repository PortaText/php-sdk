PortaText\Command\Result
===============

All executed commands returns an instance of this class.




* Class name: Result
* Namespace: PortaText\Command





Properties
----------


### $data

    public array $data

Returned data.



* Visibility: **public**


### $headers

    public array $headers

Returned headers.



* Visibility: **public**


### $success

    public boolean $success

Whether the request was successful or not.



* Visibility: **public**


### $code

    public integer $code

HTTP status code



* Visibility: **public**


Methods
-------


### __construct

    mixed PortaText\Command\Result::__construct(integer $code, array $headers, array $data)

Class constructor.



* Visibility: **public**


#### Arguments
* $code **integer** - &lt;p&gt;HTTP status code.&lt;/p&gt;
* $headers **array** - &lt;p&gt;HTTP headers as an associative array.&lt;/p&gt;
* $data **array** - &lt;p&gt;Returned data as an associative array.&lt;/p&gt;


