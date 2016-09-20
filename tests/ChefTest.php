<?php

namespace Giampaolo\CookEloquent\Tests;

use Mockery as M;
use Giampaolo\CookEloquent\Chef;

class ChefTest extends AbstractTestCase
{
    public function testIfChefAppears()
    {
        $model = M::mock('Illuminate\Database\Eloquent\Model');

        $chef = new Chef($model);

        $this->assertInstanceOf(\Giampaolo\CookEloquent\Chef::class, $chef);
    }
}