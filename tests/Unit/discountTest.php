<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class discountTest extends TestCase
{

    /** @test */
    public function calculate_discont_return_zero()
    {
        $result = calculateDiscount(100,5);

        $this->assertEquals(0,$result);
    }
}
