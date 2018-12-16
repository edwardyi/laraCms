<?php
namespace App\Edward\Carouse;

use App\Base\BaseRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use App\Edward\Carouse\Exceptions\CreateCarouselErrorException;
use App\Edward\Carouse\Exceptions\FindCarouselErrorExcepton;
use App\Edward\Carouse\Exceptions\UpdateCarouselErrorExceptoin;
use App\Edward\Carouse\Exceptions\DeleteCarouselErrorException;
class CarouseRepository extends BaseRepository implements CarouseRepositoryInterface
{
    protected $model;
  
    /**
     * CarouseRepository constructor.
     * @param Carouse $carouse
     */
    public function __construct(Carouse $carouse)
    {
        $this->model = $carouse;
    }
    
    //改寫BaseRepository用
    public function create($data) {
        
    }
    
    /**
     * @param array $data
     * @return Carousel
     * @throws CreateCarouselErrorException
     */
    public function createCarousel($data) : Carouse
    {
       try {
            return $this->model->create($data);    
       } catch(QueryException $e) {
           throw new CreateCarouselErrorException($e);
       }
    }
    
    public function findCarousel($id) :Carouse
    {
        try {
            return $this->model->findOrFail($id);    
        } catch(ModelNotFoundException $e) {
            throw new FindCarouselErrorExcepton($e);
        }
        
    }
    
    public function updateCarousel($data)
    {
        try {
            return $this->model->update($data);
        } catch(QueryException $e) {
            throw new UpdateCarouselErrorExceptoin($e);
        }
    }
    
    // 要用bool,而不是Boolean的類別
    public function deleteCarouse($id) : bool
    {
        try {
            return $this->model->delete();
        }catch(QueryException $e)  {
            throw new DeleteCarouselErrorException($e);
        }
    }
}