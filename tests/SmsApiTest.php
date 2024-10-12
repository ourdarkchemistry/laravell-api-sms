<?php

namespace Gr8Shivam\SmsApi\Tests;

use SmsApi;

class SmsApiTest extends AbstractTestCase
{
  public function testSendMessageResponse()
  {
      $response = SmsApi::sendMessage("9999999999", "Hi")->response();
      $this->assertNotEmpty($response,"Response is empty.");
  }
}
