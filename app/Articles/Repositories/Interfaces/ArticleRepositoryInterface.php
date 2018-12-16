<?php
namespace App\Articles\Repositories\Interfaces;
use App\Base\Interfaces\BaseRepositoryInterface;
interface ArticleRepositoryInterface extends BaseRepositoryInterface
{
   public function create(array $attributes);
}