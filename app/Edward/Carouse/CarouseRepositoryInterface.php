<?php
namespace App\Edward\Carouse;
use App\Base\Interfaces\BaseRepositoryInterface;
interface CarouseRepositoryInterface extends BaseRepositoryInterface
{
   public function create(array $attributes);
}