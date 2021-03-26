<?php

namespace Tests\Unit;

use App\Models\Store;
use PHPUnit\Framework\TestCase;

class columnTest extends TestCase
{
    /** @test */
    public function check_if_columns_store_migrate_is_correct()
    {
        $stores = new Store;

        $expected = [
            'order_date',
            'order_code',
            'total',
            'discount'
        ];

        $compare = array_diff($expected, $stores->getFillable());

        $this->assertEquals(0,count($compare));
    }
}
