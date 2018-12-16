<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Product;

class ProductTest extends TestCase
{
    protected $product;   
    public function setUp()
    {
        $this->product = new Product('test', 200);
    }
    
    // 命名要有描述性
    /** @test */
    public function a_product_has_a_name()
    {
        $this->assertEquals('test', $this->product->name());
    }
    
    /** @test */
    public function a_product_has_a_price()
    {
        $this->assertEquals(200, $this->product->price());
    }
    
    /** @test */
    public function a_product_has_a_price_discount()
    {
        $this->product->discount(8);
        $this->assertEquals(160, $this->product->price());
    }
}
