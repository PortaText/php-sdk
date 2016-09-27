PortaText\Command\Api\Campaigns
===============

The Campaigns endpoint.




* Class name: Campaigns
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

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::id(integer $campaignId)

Sets the campaign id.



* Visibility: **public**


#### Arguments
* $campaignId **integer** - &lt;p&gt;Campaign id.&lt;/p&gt;



### name

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::name(string $name)

The campaign name.



* Visibility: **public**


#### Arguments
* $name **string** - &lt;p&gt;Name.&lt;/p&gt;



### description

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::description(string $description)

The campaign description.



* Visibility: **public**


#### Arguments
* $description **string** - &lt;p&gt;Description.&lt;/p&gt;



### from

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::from(string|array $from)

Specifies source telephone number for the campaign.



* Visibility: **public**


#### Arguments
* $from **string|array** - &lt;p&gt;Telephone number (you must own this one).&lt;/p&gt;



### allSubscribers

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::allSubscribers()

Specifies all subscribers of the given SMS Service ID.



* Visibility: **public**




### toContactLists

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::toContactLists(array $contactLists)

Contact list IDs to use.



* Visibility: **public**


#### Arguments
* $contactLists **array** - &lt;p&gt;The contact list ids.&lt;/p&gt;



### csv

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::csv(string $filename)

Send a CSV file to import contacts.



* Visibility: **public**


#### Arguments
* $filename **string** - &lt;p&gt;Full absolute path to the csv file.&lt;/p&gt;



### saveTo

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::saveTo(string $filename)

Used to export the contacts to a CSV file on a GET.



* Visibility: **public**


#### Arguments
* $filename **string** - &lt;p&gt;The filename.&lt;/p&gt;



### contacts

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::contacts()

Query for campaign contacts.



* Visibility: **public**




### contact

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::contact(string $contact)

Selects a contact to operate with.



* Visibility: **public**


#### Arguments
* $contact **string** - &lt;p&gt;Contact ID.&lt;/p&gt;



### page

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::page(integer $page)

Return the specific page of results.



* Visibility: **public**


#### Arguments
* $page **integer** - &lt;p&gt;Page number.&lt;/p&gt;



### schedule

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::schedule(integer $type, array $details)

Schedule this campaign



* Visibility: **public**


#### Arguments
* $type **integer** - &lt;p&gt;Schedule type.&lt;/p&gt;
* $details **array** - &lt;p&gt;Schedule configuration.&lt;/p&gt;



### getEndpoint

    string PortaText\Command\Base::getEndpoint(string $method)

Returns a string with the endpoint for the given command.



* Visibility: **protected**
* This method is **abstract**.
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)


#### Arguments
* $method **string** - &lt;p&gt;Method for this command.&lt;/p&gt;



### setSetting

    \PortaText\Command\Api\PortaText\Command\ICommand PortaText\Command\Api\Campaigns::setSetting(string $name, mixed $value)

Set a campaign setting.



* Visibility: **protected**


#### Arguments
* $name **string** - &lt;p&gt;Setting name.&lt;/p&gt;
* $value **mixed** - &lt;p&gt;Setting value.&lt;/p&gt;



### __construct

    mixed PortaText\Command\Base::__construct()

Standard constructor.



* Visibility: **public**
* This method is defined by [PortaText\Command\Base](PortaText-Command-Base.md)




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


