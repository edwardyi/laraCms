<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Product;
use App\Order;

class OrderTest extends TestCase
{
    protected $product_one;
    protected $product_two;
    protected $order;
    public function setUp()
    {
        $this->product_one = new Product('Rubber Duck', 1100);
        $this->product_two = new Product('Dragon', 1200);
        $this->order = new Order();
    }
    
    /** @test */
    public function a_order_has_many_products()
    {
        $this->order->add($this->product_one);
        $this->order->add($this->product_two);
        $this->assertCount(2, $this->order->products());
    }
    
    /** @test */
    public function a_order_products_total()
    {
        $this->order->add($this->product_one);
        $this->order->add($this->product_two);
        $this->assertEquals(2300, $this->order->total());
    }
}