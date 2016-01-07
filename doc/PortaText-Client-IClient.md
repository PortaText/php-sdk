PortaText\Client\IClient
===============

Client interface.




* Interface name: IClient
* Namespace: PortaText\Client
* This is an **interface**






Methods
-------


### setLogger

    \PortaText\Client\PortaText\Client\IClient PortaText\Client\IClient::setLogger(\PortaText\Client\Psr\Log\LoggerInterface $logger)

Sets the logger implementation.



* Visibility: **public**


#### Arguments
* $logger **PortaText\Client\Psr\Log\LoggerInterface** - &lt;p&gt;The PSR3-Logger&lt;/p&gt;



### setApiKey

    \PortaText\Client\PortaText\Client\IClient PortaText\Client\IClient::setApiKey(string $apiKey)

Sets the API Key to use.



* Visibility: **public**


#### Arguments
* $apiKey **string** - &lt;p&gt;Your PortaText API Key.&lt;/p&gt;



### setCredentials

    \PortaText\Client\PortaText\Client\IClient PortaText\Client\IClient::setCredentials(string $username, string $password)

Sets a username and password for basic and webbasic auth.



* Visibility: **public**


#### Arguments
* $username **string** - &lt;p&gt;The username.&lt;/p&gt;
* $password **string** - &lt;p&gt;The password.&lt;/p&gt;



### setEndpoint

    \PortaText\Client\PortaText\Client\IClient PortaText\Client\IClient::setEndpoint(string $endpoint)

Sets the endpoint to use.



* Visibility: **public**


#### Arguments
* $endpoint **string** - &lt;p&gt;You can optionally specify a different endpoint.&lt;/p&gt;



### run

    \PortaText\Client\PortaText\Command\Result PortaText\Client\IClient::run(string $endpoint, string $method, string $contentType, string $acceptContentType, string $body, string $outputFile, string $authType)

Runs the given command.



* Visibility: **public**


#### Arguments
* $endpoint **string** - &lt;p&gt;Endpoint to invoke.&lt;/p&gt;
* $method **string** - &lt;p&gt;HTTP method to use.&lt;/p&gt;
* $contentType **string** - &lt;p&gt;Content-Type value.&lt;/p&gt;
* $acceptContentType **string** - &lt;p&gt;Accept value.&lt;/p&gt;
* $body **string** - &lt;p&gt;Payload to send.&lt;/p&gt;
* $outputFile **string** - &lt;p&gt;File where to write result to.&lt;/p&gt;
* $authType **string** - &lt;p&gt;One of &quot;apiKey&quot;, &quot;sessionToken&quot;, or &quot;basic&quot;&lt;/p&gt;


