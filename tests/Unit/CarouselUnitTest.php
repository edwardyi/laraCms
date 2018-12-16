<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Edward\Carouse\Carouse;
use App\Edward\Carouse\CarouseRepository;
use \App\Edward\Carouse\Exceptions\CreateCarouselErrorException;

class CarouselUnitTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_create_carouse()
    {
        $data = [
            'title' => $this->faker->sentence,
            'link' => $this->faker->url,
            'src' => $this->faker->url
        ];
        $carouseRepo = new CarouseRepository(new Carouse());
        $carousel = $carouseRepo->createCarousel($data);
        $this->assertInstanceOf(Carouse::class, $carousel);
        
        $this->assertEquals($data['title'], $carousel->title);
        $this->assertEquals($data['link'], $carousel->link);
        $this->assertEquals($data['src'], $carousel->src);
    }
    
    /**
     * @test
     */
    public function it_can_show_the_carouse()
    {
        $carousel = factory(Carouse::class)->create();
        // 每次都要new過一個新的Carouse
        $carouseRepo = new CarouseRepository(new Carouse());
        $found = $carouseRepo->findCarousel($carousel->id);
        
        $this->assertInstanceOf(Carouse::class, $found);
        $this->assertEquals($found->title, $carousel->title);
        $this->assertEquals($found->src, $carousel->src);
        $this->assertEquals($found->link, $carousel->link);
    }
    
    /**
     * @test
     */
     public function it_can_update_the_carouse()
     {
        $carousel = factory(Carouse::class)->create();
        // 每次都要new過一個新的Carouse
        $carouseRepo = new CarouseRepository($carousel);
        $data = [
            'title' => 'test_title',
            'link' => 'edward.com',
            'src' => 'google.com'
        ];
        $updatedResult = $carouseRepo->updateCarousel($data);
        
        $this->assertTrue($updatedResult);
        $this->assertEquals($data['title'], $carousel->title);
        $this->assertEquals($data['link'], $carousel->link);
        $this->assertEquals($data['src'], $carousel->src);
     }
     
     
     /**
      * @test
      */
     public function it_can_delete_the_carouse()
     {
         $carousel = factory(Carouse::class)->create();
         $carouseRepo = new CarouseRepository($carousel);
         $deletedResult = $carouseRepo->deleteCarouse($carousel->id);
         $this->assertTrue($deletedResult);
     }
     
     /**
      * @test
      */
    //  public function it_should_throws_exception_when_required_fields_not_filled() 
    //  {
    //     // $this->expectException(CreateCarouselErrorException::class);
    //     //  $data = [];
    //      $carouseRepo = new CarouseRepository(new Carouse());
    //      $carousel = $carouseRepo->createCarousel([]);
    //     // $carousel = factory(Carouse::class)->create([]);
    //     // dd($carousel->toArray());
    //  }
}
