<?php namespace Acoustep\EntrustGui\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Entities\User;
use Config;

/**
 * This file is part of Entrust GUI,
 * A Laravel 5 GUI for Entrust.
 *
 * @license MIT
 * @package Acoustep\EntrustGui
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Config::get('auth.model');
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Create model
     *
     * @param array $attributes
     *
     * @return Model
     */
    public function create(array $attributes)
    {
        $defaults = ['roles' => []];
        $attributes = array_merge($defaults, $attributes);
        $model = parent::create($attributes);
        $model->roles()->sync($attributes['roles']);
        return $this->parserResult($model);
    }

    /**
     * Update attributes
     *
     * @param array $attributes
     * @param integer $id
     *
     * @return Model
     */
    public function update(array $attributes, $id)
    {
        $defaults = ['roles' => []];
        $attributes = array_merge($defaults, $attributes);
        $model = parent::update($attributes, $id);
        return $this->parserResult($model);
    }

}
