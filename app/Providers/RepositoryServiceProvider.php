<?php
namespace App\Providers;
use App\Articles\Repositories\ArticlesRepository;
use App\Articles\Repositories\Interfaces\ArticleRepositoryInterface;
use Illuminate\Support\ServiceProvider;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bind the interface to an implementation repository class
     */
    public function register()
    {
        $this->app->bind(
            ArticleRepositoryInterface::class,
            ArticlesRepository::class
        );
    }
}