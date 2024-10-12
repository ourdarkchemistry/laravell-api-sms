<?php
namespace Gr8Shivam\SmsApi\Notifications;

class SmsApiMessage
{
    public $content;
    public $params;
    public $headers=[];
    public $type = 'text';
    public function __construct($content = '', $params = null, $headers=[]) {
        $this->content = $content;
        $this->params = $params;
        $this->headers = $headers;
    }
    public function content($content) {
        $this->content = $content;
        return $this;
    }
    public function params($params)
    {
        $this->params = $params;
        return $this;
    }

    public function headers($headers)
    {
        $this->headers = $headers;
        return $this;
    }
    public function unicode() {
        $this->type = 'unicode';
        return $this;
    }
}
