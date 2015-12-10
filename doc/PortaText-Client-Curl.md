PortaText\Client\Curl
===============

All API client implementations should extend this class.

The PHPMD.CouplingBetweenObjects warning is suppressed here. It is triggered
because of the number of @throws declarations :\


* Class name: Curl
* Namespace: PortaText\Client
* Parent class: [PortaText\Client\Base](PortaText-Client-Base.md)





Properties
----------


### $defaultEndpoint

    public string $defaultEndpoint = "https://rest.portatext.com"

Default API REST Endpoint.



* Visibility: **public**
* This property is **static**.


### $endpoint

    protected string $endpoint = null

REST endpoint in use.



* Visibility: **protected**


### $apiKey

    protected string $apiKey = null

API Key



* Visibility: **protected**


### $sessionToken

    protected string $sessionToken = null

Session Token.



* Visibility: **protected**


### $credentials

    protected array $credentials = null

Username and password.



* Visibility: **protected**


### $commandFactory

    protected \PortaText\Client\PortaText\Command\IFactory $commandFactory = null

Holds the command factory implementation.



* Visibility: **protected**


### $logger

    protected \PortaText\Client\Psr\Log\LoggerInterface $logger = null

Holds the logger implementation.



* Visibility: **protected**


### $currentCommand

    protected \PortaText\Client\PortaText\Command\ICommand $currentCommand

Current command to run.



* Visibility: **protected**


Methods
-------


### execute

    array PortaText\Client\Base::execute(\PortaText\Client\PortaText\Command\Descriptor $descriptor)

Executes the request. Will depend on the client implementation.

Returns an array with code, headers, and body.

* Visibility: **public**
* This method is **abstract**.
* This method is defined by [PortaText\Client\Base](PortaText-Client-Base.md)


#### Arguments
* $descriptor **PortaText\Client\PortaText\Command\Descriptor** - &lt;p&gt;Command descriptor.&lt;/p&gt;



### parseCurlResult

    array PortaText\Client\Curl::parseCurlResult(string $result)

Given a curl result, will return headers and body.



* Visibility: **protected**


#### Arguments
* $result **string** - &lt;p&gt;The CURL result.&lt;/p&gt;



### setLogger

    \PortaText\Client\PortaText\Client\IClient PortaText\Client\IClient::setLogger(\PortaText\Client\Psr\Log\LoggerInterface $logger)

Sets the logger implementation.



* Visibility: **public**
* This method is defined by [PortaText\Client\IClient](PortaText-Client-IClient.md)


#### Arguments
* $logger **PortaText\Client\Psr\Log\LoggerInterface** - &lt;p&gt;The PSR3-Logger&lt;/p&gt;



### __call

    \PortaText\Client\PortaText\Command\ICommand PortaText\Client\Base::__call(string $name, array $args)

This magic method is used to spawn commands on demand.



* Visibility: **public**
* This method is defined by [PortaText\Client\Base](PortaText-Client-Base.md)


#### Arguments
* $name **string** - &lt;p&gt;Name of the invoked method.&lt;/p&gt;
* $args **array** - &lt;p&gt;Array of arguments for invocation.&lt;/p&gt;



### run

    \PortaText\Client\PortaText\Command\Result PortaText\Client\IClient::run(string $endpoint, string $method, string $contentType, string $body, string $authType)

Runs the given command.



* Visibility: **public**
* This method is defined by [PortaText\Client\IClient](PortaText-Client-IClient.md)


#### Arguments
* $endpoint **string** - &lt;p&gt;Endpoint to invoke.&lt;/p&gt;
* $method **string** - &lt;p&gt;HTTP method to use.&lt;/p&gt;
* $contentType **string** - &lt;p&gt;Content-Type value.&lt;/p&gt;
* $body **string** - &lt;p&gt;Payload to send.&lt;/p&gt;
* $authType **string** - &lt;p&gt;One of &quot;apiKey&quot;, &quot;sessionToken&quot;, or &quot;basic&quot;&lt;/p&gt;



### authType

    string PortaText\Client\Base::authType()

Deduce an authorization type.



* Visibility: **protected**
* This method is defined by [PortaText\Client\Base](PortaText-Client-Base.md)




### assertResult

    void PortaText\Client\Base::assertResult(\PortaText\Client\PortaText\Command\Descriptor $descriptor, \PortaText\Client\PortaText\Command\Result $result)

Will assert that the request finished successfuly.



* Visibility: **protected**
* This method is defined by [PortaText\Client\Base](PortaText-Client-Base.md)


#### Arguments
* $descriptor **PortaText\Client\PortaText\Command\Descriptor** - &lt;p&gt;The Command execution
descriptor.&lt;/p&gt;
* $result **PortaText\Client\PortaText\Command\Result** - &lt;p&gt;Request execution result.&lt;/p&gt;



### login

    void PortaText\Client\Base::login()

Logs in and stores session token on success.



* Visibility: **protected**
* This method is defined by [PortaText\Client\Base](PortaText-Client-Base.md)




### setApiKey

    \PortaText\Client\PortaText\Client\IClient PortaText\Client\IClient::setApiKey(string $apiKey)

Sets the API Key to use.



* Visibility: **public**
* This method is defined by [PortaText\Client\IClient](PortaText-Client-IClient.md)


#### Arguments
* $apiKey **string** - &lt;p&gt;Your PortaText API Key.&lt;/p&gt;



### setCredentials

    \PortaText\Client\PortaText\Client\IClient PortaText\Client\IClient::setCredentials(string $username, string $password)

Sets a username and password for basic and webbasic auth.



* Visibility: **public**
* This method is defined by [PortaText\Client\IClient](PortaText-Client-IClient.md)


#### Arguments
* $username **string** - &lt;p&gt;The username.&lt;/p&gt;
* $password **string** - &lt;p&gt;The password.&lt;/p&gt;



### setEndpoint

    \PortaText\Client\PortaText\Client\IClient PortaText\Client\IClient::setEndpoint(string $endpoint)

Sets the endpoint to use.



* Visibility: **public**
* This method is defined by [PortaText\Client\IClient](PortaText-Client-IClient.md)


#### Arguments
* $endpoint **string** - &lt;p&gt;You can optionally specify a different endpoint.&lt;/p&gt;



### __construct

    mixed PortaText\Client\Base::__construct()

Class constructor.



* Visibility: **public**
* This method is defined by [PortaText\Client\Base](PortaText-Client-Base.md)



