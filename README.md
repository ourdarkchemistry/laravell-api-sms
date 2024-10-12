# Integrate SMS API with Laravel
Laravel package to provide SMS API integration. Any SMS vendor that provides REST API can be used.

## Installation

### Install Package
Require this package with composer:

### Add Service Provider & Facade

#### For Laravel 5.5+
Once the package is added, the service provider and facade will be autodiscovered.

#### For Older versions of Laravel
Add the ServiceProvider to the providers array in `config/app.php`:

Add the Facade to the aliases array in `config/app.php`:

### Publish Config
Once done, publish the config to your config folder using:

## Configuration
Once the config file is published, open `config/sms-api.php`

#### Global config
`country_code` : The default country code to be used

`default` : Default gateway 

#### Gateway Config
Use can define multiple gateway configs like this:-


#### Special Parameters in Gateway Config

##### `json` Parameter
The `json` parameter accepts `true/false`. When `true`, it sends `params` as a JSON payload. It also takes care of `'Content-Type' => 'application/json'` header.

##### `jsonToArray` Parameter
The `jsonToArray` parameter accepts `true/false`. When `true`, it sends a single mobile number in an encapsulated array in the JSON payload. When `false`, a single mobile number is sent as text. Valid only when `json` parameter is `true`. 

##### `wrapper` Parameter
The `wrapper` is a special parameter which will be required only with some gateways. It wraps the JSON payload in the following structure:

##### `wrapperParams` Parameter
Accepts array. Used to add custom Wrapper Parameters. Parameters can also be added while calling the `smsapi()` function like `smsapi()->addWrapperParams(['wrapperParam1'=>'paramVal'])->sendMessage("TO", "Message")`

## Usage
### Direct Use
Use the `smsapi()` helper function or `SmsApi` facade to send the messages.

`TO`: Single mobile number or Multiple comma-separated mobile numbers

`MESSAGE`: Message to be sent

License
This project is licensed under the MIT License. See the LICENSE file for details.

Contact
Email: ourdarkchemistry@gmail.com
GitHub: https://github.com/ourdarkchemistry
