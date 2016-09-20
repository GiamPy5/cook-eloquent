<?php

namespace Giampaolo\CookEloquent\Tests;

use Giampaolo\CookEloquent\Tests\Fixtures\ReceiptOne;

class ReceiptTest extends ChefTest
{
    public function testIfReceiptOneRuns()
    {
        $receipt = new ReceiptOne();

        $receipt->run();
    }
}