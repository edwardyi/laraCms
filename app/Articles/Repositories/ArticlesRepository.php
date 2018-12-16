<?php
namespace App\Articles\Repositories;
use App\Models\Article;
use App\Articles\Repositories\Interfaces\ArticleRepositoryInterface;
use App\Base\BaseRepository;
class ArticlesRepository extends BaseRepository implements ArticleRepositoryInterface
{
    protected $model;
  
    /**
     * ArticlesRepository constructor.
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->model = $article;
    }
    /**
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->model->create($attributes);
    }
}