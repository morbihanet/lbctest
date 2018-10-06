<?php

namespace Tests\Unit;

use Illuminate\Http\JsonResponse;
use LBC\Http\Controllers\Api;
use Tests\TestCase;

class WsTest extends TestCase
{
    /**
     * @return void
     */
    public function testWsEmailCheck()
    {
        $trueEmail = 'foo@bar.com';

        $falseEmail1 = 'foo@barcom';
        $falseEmail2 = 'foobar.com';
        $falseEmail3 = '@barcom';
        $falseEmail4 = 'foobarcom';

        $controller = new Api();

        /** @var JsonResponse $response */
        $response = $controller->checkmail($trueEmail);
        $this->assertTrue($response->getData()->status);

        /** @var JsonResponse $response */
        $response = $controller->checkmail($falseEmail1);
        $this->assertFalse($response->getData()->status);

        /** @var JsonResponse $response */
        $response = $controller->checkmail($falseEmail2);
        $this->assertFalse($response->getData()->status);

        /** @var JsonResponse $response */
        $response = $controller->checkmail($falseEmail3);
        $this->assertFalse($response->getData()->status);

        /** @var JsonResponse $response */
        $response = $controller->checkmail($falseEmail4);
        $this->assertFalse($response->getData()->status);
    }
}
