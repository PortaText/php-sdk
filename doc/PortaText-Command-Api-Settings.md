PortaText\Command\Api\Settings
===============

The me/settings endpoint.




* Class name: Settings
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


### dontAlertOnLowCredit

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::dontAlertOnLowCredit()

Dont send an alert by email on low credit.



* Visibility: **public**




### alertWhenCreditLessThan

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::alertWhenCreditLessThan(integer $value)

Sends an alert by email when credit reaches the given threshold.



* Visibility: **public**


#### Arguments
* $value **integer** - &lt;p&gt;Credit threshold.&lt;/p&gt;



### dontSendInboundByEmail

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::dontSendInboundByEmail()

Don't send emails on inbound messages.



* Visibility: **public**




### sendInboundByEmail

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::sendInboundByEmail(string $email)

Set email where to send inbound messages to.



* Visibility: **public**


#### Arguments
* $email **string** - &lt;p&gt;Use this email to send inbound messages.&lt;/p&gt;



### enableAutoRecharges

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::enableAutoRecharges(integer $whenCredit, float $total)

Enables auto recharges.



* Visibility: **public**


#### Arguments
* $whenCredit **integer** - &lt;p&gt;Autorecharge when credit reaches this amount.&lt;/p&gt;
* $total **float** - &lt;p&gt;Total credits to autorecharge.&lt;/p&gt;



### disableAutoRecharges

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::disableAutoRecharges()

Disables auto recharges.



* Visibility: **public**




### defaultCreditCard

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::defaultCreditCard(integer $cardId)

Sets default credit card id.



* Visibility: **public**


#### Arguments
* $cardId **integer** - &lt;p&gt;Credit Card ID to use by default.&lt;/p&gt;



### amdMaxWordLength

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdMaxWordLength(integer $maxWordLength)

The minimum duration of Voice considered to be a word (milliseconds).



* Visibility: **public**


#### Arguments
* $maxWordLength **integer** - &lt;p&gt;Value in milliseconds.&lt;/p&gt;



### amdSilenceThreshold

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdSilenceThreshold(integer $silenceThreshold)

How long do we consider silence (milliseconds).



* Visibility: **public**


#### Arguments
* $silenceThreshold **integer** - &lt;p&gt;Value in milliseconds.&lt;/p&gt;



### amdMaxWords

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdMaxWords(integer $maxWords)

The maximum number of words in a greeting.



* Visibility: **public**


#### Arguments
* $maxWords **integer** - &lt;p&gt;Number of words.&lt;/p&gt;



### amdBetweenWordsSilence

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdBetweenWordsSilence(integer $silenceBetweenWords)

The minimum duration of silence after a word to consider the
audio that follows to be a new word (milliseconds).



* Visibility: **public**


#### Arguments
* $silenceBetweenWords **integer** - &lt;p&gt;Value in milliseconds.&lt;/p&gt;



### amdMinWordLength

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdMinWordLength(integer $minWordLength)

The minimum duration of Voice considered to be a word (milliseconds).



* Visibility: **public**


#### Arguments
* $minWordLength **integer**



### amdTotalTime

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdTotalTime(integer $totalTime)

The maximum time allowed for the algorithm (milliseconds).



* Visibility: **public**


#### Arguments
* $totalTime **integer** - &lt;p&gt;Value in milliseconds.&lt;/p&gt;



### amdAfterGreetingSilence

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdAfterGreetingSilence(integer $greetingSilence)

Is the silence after detecting a greeting (milliseconds).



* Visibility: **public**


#### Arguments
* $greetingSilence **integer** - &lt;p&gt;Value in milliseconds.&lt;/p&gt;



### amdMaxGreetingLength

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdMaxGreetingLength(integer $greetingLength)

Is the maximum length of a greeting (milliseconds).



* Visibility: **public**


#### Arguments
* $greetingLength **integer** - &lt;p&gt;Value in milliseconds.&lt;/p&gt;



### amdInitialSilence

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::amdInitialSilence(integer $initialSilence)

Is maximum initial silence duration before greeting (milliseconds).



* Visibility: **public**


#### Arguments
* $initialSilence **integer** - &lt;p&gt;Value in milliseconds.&lt;/p&gt;



### publishEventsToSns

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::publishEventsToSns(string $key, string $secret, string $topicArn)

Enables publishing of events to an SNS topic.



* Visibility: **public**


#### Arguments
* $key **string** - &lt;p&gt;Amazon AWS access key.&lt;/p&gt;
* $secret **string** - &lt;p&gt;Amazon AWS access secret.&lt;/p&gt;
* $topicArn **string** - &lt;p&gt;SNS Topic ARN.&lt;/p&gt;



### dontPublishEventsToSns

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Settings::dontPublishEventsToSns()

Disables publishing of events to an SNS topic.



* Visibility: **public**




### getEndpoint

    string PortaText\Command\Base::getEndpoint(string $method)

Returns a string with the endpoint for the given command.



* Visibility: **protected**
* This method is **abstract**.
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### setArgument

    array PortaText\Command\Base::setArgument(string $key, string $value)

Sets the given argument to the given value.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $key **string** - &lt;p&gt;Name of the argument.&lt;/p&gt;
* $value **string** - &lt;p&gt;Value of the argument.&lt;/p&gt;



### delArgument

    array PortaText\Command\Base::delArgument(string $key)

Deletes an argument.



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

    array PortaText\Command\Base::getArguments()

Returns an associative array with the arguments.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)




### getBody

    string PortaText\Command\Base::getBody(string $method)

Returns the body for this endpoint.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### getContentType

    string PortaText\Command\Base::getContentType(string $method)

Returns the content type for this endpoint.



* Visibility: **protected**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### getAcceptContentType

    string PortaText\Command\Base::getAcceptContentType(string $method)

Returns the accepted content type for this endpoint.



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



