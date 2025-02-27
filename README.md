# SMS API with Laravel
Laravel package to provide SMS API integration. Any SMS vendor that provides REST API can be used.

## Installation

### Install Package
Require this package with composer:
```
composer require gr8shivam/laravel-sms-api
```
### Add Service Provider & Facade

#### For Laravel 5.5+
Once the package is added, the service provider and facade will be autodiscovered.

#### For Older versions of Laravel
Add the ServiceProvider to the providers array in `config/app.php`:
```
SmsApi\SmsApiServiceProvider::class,
```

Add the Facade to the aliases array in `config/app.php`:
```
'SmsApi': Gr8Shivam\SmsApi\SmsApiFacade::class,
```

### Publish Config
Once done, publish the config to your config folder using:
```
php artisan vendor:publish --provider=SmsApi\SmsApiServiceProvider"
```

## Configuration
Once the config file is published, open `config/sms-api.php`

#### Global config
`country_code` : The default country code to be used

`default` : Default gateway 

#### Gateway Config
Use can define multiple gateway configs like this:-
```
//    Gateway Configuration
    'gateway_name' => [
        'method' => 'GET', //Choose Request Method (GET/POST) Default:GET
        'url' => 'BaseUrl', //Base URL
        'params' => [
            'send_to_param_name' => '', //Send to Parameter Name
            'msg_param_name' => '', //Message Parameter Name
            'others' => [
                'param1' => '',
                'param2' => '',
                'param3' => '',
                //More params can be added
            ],
        ],
        'headers' => [
            'header1' => '',
            'header2' => '',
            //More headers can be added
        ],
//        'json' => true
```

#### Special Parameters in Gateway Config

##### `json` Parameter
The `json` parameter accepts `true/false`. When `true`, it sends `params` as a JSON payload. It also takes care of `'Content-Type' => 'application/json'` header.

##### `jsonToArray` Parameter
The `jsonToArray` parameter accepts `true/false`. When `true`, it sends a single mobile number in an encapsulated array in the JSON payload. When `false`, a single mobile number is sent as text. Valid only when `json` parameter is `true`. 

##### `wrapper` Parameter
The `wrapper` is a special parameter which will be required only with some gateways. It wraps the JSON payload in the following structure:
```
"wrapper_name": [
    {
      "message": "Message",
      "to": [
        "Receipient1",
        "Receipient2"
      ]
    }
  ]
```

##### `wrapperParams` Parameter
Accepts array. Used to add custom Wrapper Parameters. Parameters can also be added while calling the `smsapi()` function like `smsapi()->addWrapperParams(['wrapperParam1'=>'paramVal'])->sendMessage("TO", "Message")`

## Usage
### Direct Use
Use the `smsapi()` helper function or `SmsApi` facade to send the messages.

`TO`: Single mobile number or Multiple comma-separated mobile numbers

`MESSAGE`: Message to be sent

#### Using Helper function
- Basic Usage `smsapi("TO", "Message");` or `smsapi()->sendMessage("TO","MESSAGE");`

- Adding extra parameters `smsapi("TO", "Message", ["param1" => "val"]);` or `smsapi()->sendMessage("TO", "Message", ["param1" => "val"]);`

- Adding extra headers `smsapi("TO", "Message", ["param1" => "val"], ["header1" => "val"]);` or `smsapi()->sendMessage("TO", "Message", ["param1" => "val"], ["header1" => "val"]);`

- Using a different gateway `smsapi()->gateway('GATEWAY_NAME')->sendMessage("TO", "Message");`

- Using a different country code `smsapi()->countryCode('COUNTRY_CODE')->sendMessage("TO", "Message");` 

- Sending message to multiple mobiles `smsapi(["Mobile1","Mobile2","Mobile3"], "Message");` or `smsapi()->sendMessage(["Mobile1","Mobile2","Mobile3"],"MESSAGE");`

#### Using SmsApi facade
- Basic Usage `SmsApi::sendMessage("TO","MESSAGE");`

- Adding extra parameters `SmsApi::sendMessage("TO", "Message", ["param1" => "val"]);`

- Adding extra headers `SmsApi::sendMessage("TO", "Message", ["param1" => "val"], ["header1" => "val"]);`

- Using a different gateway `SmsApi::gateway('GATEWAY_NAME')->sendMessage("TO", "Message");`

- Using a different country code `SmsApi::countryCode('COUNTRY_CODE')->sendMessage("TO", "Message");` 

- Sending message to multiple mobiles `SmsApi::sendMessage(["Mobile1","Mobile2","Mobile3"],"MESSAGE");`

### Use in Notifications

#### Setting up the Route for Notofication
Add the method `routeNotificationForSmsApi()` to your Notifiable model :
```
public function routeNotificationForSmsApi() {
        return $this->phone; //Name of the field to be used as mobile
    }    
```

By default, your User model uses Notifiable.

#### Setting up Notification

Add 

`use Gr8Shivam\SmsApi\Notifications\SmsApiChannel;`

and 

`use Gr8Shivam\SmsApi\Notifications\SmsApiMessage;`

to your notification. 

You can create a new notification with `php artisan make:notification NOTIFICATION_NAME`

In the `via` function inside your notification, add `return [SmsApiChannel::class];` and add a new function `toSmsApi($notifiable)` to return the message body and parameters.

Notification example:-
```
namespace App\Notifications;

use SmsApi\Notifications\SmsApiChannel;
use SmsApi\Notifications\SmsApiMessage;
use Illuminate\Notifications\Notification;

class ExampleNotification extends Notification
{
    public function via($notifiable)
    {
        return [SmsApiChannel::class];
    }
    
    public function toSmsApi($notifiable)
    {
        return (new SmsApiMessage)
            ->content("Hello");
    }
}
```
You can also use `->params(["param1" => "val"])` to add extra parameters to the request and `->headers(["header1" => "val"])` to add extra headers to the request.

### Getting Response
You can get response by using `->response()` or get the Response Code using `->getResponseCode()`. For example, `smsapi()->sendMessage("TO","MESSAGE")->response();`

## License
This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact
- **Email:** ourdarkchemistry@gmail.com
- **GitHub:** https://github.com/ourdarkchemistry
