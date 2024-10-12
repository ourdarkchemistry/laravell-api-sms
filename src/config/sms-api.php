<?php

return [

    'country_code' => '7',
    'default' => env('SMS_API_DEFAULT_GATEWAY', 'gateway_name_basic'),
//    Basic Gateway Sample Configuration
    'gateway_name_basic' => [
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
        'add_code' => true, //Include Country Code (true/false)
    ],

//    Advanced Gateway Sample Configuration
    'gateway_name_advanced' => [
        'method' => 'POST', //Choose Request Method (GET/POST) Default:GET
        'url' => 'BaseUrl', //Base URL
        'params' => [
            'send_to_param_name' => '', //Send to Parameter Name
            'msg_param_name' => '', //Message Parameter Name
            'others' => [
                'param1' => '',
                'param2' => '',
                'param3' => '',
            ],
        ],
        'headers' => [
            'header1' => '',
            'header2' => '',
            //More headers can be added
        ],
        'json' => true,
        'add_code' => true, //Include Country Code (true/false)
    ],
//    SMSNIX Sample Config
    'smsnix' => [
        'url' => 'http://bulk.smsnix.in/vendorsms/pushsms.aspx?',
        'params' => [
            'send_to_param_name' => 'msisdn', //Send to Parameter Name
            'msg_param_name' => 'msg', //Message Parameter Name
            'others' => [
                'user' => '', //Your username
                'password' => '', //Your Password
                'sid' => '', //Your Sender ID
                'fl' => '0',
                'gwid' => '2',
            ],
        ],
        'add_code' => true, //Include Country Code
    ],

//    MSG91 Sample Config
    'msg91' => [
        'method' => 'POST', //Choose Request Method (GET/POST)
        'url' => 'https://control.msg91.com/api/v2/sendsms?', //Base URL
        'params' => [
            'send_to_param_name' => 'to', //Send to Parameter Name
            'msg_param_name' => 'message', //Message Parameter Name
            'others' => [
                'authkey' => '', //Your auth key
                'sender' => '', //Your Sender ID
                'route' => '4',
                'country' => '7',
            ],
        ],
        'json' => true, // Use if you want the params to be sent in JSON format instead of query params
        'wrapper' => 'sms', //Optional, use only if you want the JSON request to be wrapped
        'add_code' => false, //Include Country Code (true/false)
    ]

];
