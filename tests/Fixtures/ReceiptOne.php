<?php

namespace Giampaolo\CookEloquent\Tests\Fixtures;

use Giampaolo\CookEloquent\Receipt;

class ReceiptOne extends Receipt
{
    protected $tags = [];

    public function prepare()
    {
        $this->where(
            'a',
            '=',
            $this->grt('b', 'default-d')
        );

        $this->where(
            'c',
            '!=',
            $this->grt('d', 'default-d')
        );
    }
}