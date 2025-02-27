<?php

/*
 * Add helper function
 */
if (!function_exists('smsapi')) {

    function smsapi($to = null, $message = null, $extra_params = null, $headers = [])
    {
        $smsapi = app('smsapi');
        if (!(is_null($to) || is_null($message))) {
            return $smsapi->sendMessage($to, $message, $extra_params, $headers);
        }
        return $smsapi;
    }
}
