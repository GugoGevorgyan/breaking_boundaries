<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{

    /**
     * @var array
     */
    protected array $fillable = [];

    /**
     * @var Builder
     */
    public Builder $query;

    /**
     * Specify Model class name
     *
     * @return String
     */
    abstract protected function model(): string;

    /**
     * Repository constructor.
     */
    public function __construct()
    {
        $this->query();
    }

    /**
     * Make query
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->query = $this->makeModel()->newQuery();
    }

    /**
     * Make model
     *
     * @return Model
     */
    public function makeModel(): Model
    {
        return app($this->model());
    }

    /**
     * @param array $data
     * @param Model $model
     * @param array $fillable
     * @return Model
     */
    public function fill(array $data, Model $model, array $fillable = []): Model
    {
        if (empty($fillable)) {
            $fillable = $this->fillable;
        }
        if (!empty($fillable)) {
            $model->fillable($fillable)->fill($data);
        }
        return $model;
    }


    /**
     * Save values in table.
     *
     * @param array $data
     * @param array $fillable
     * @return mixed
     */
    public function create(array $data, array $fillable = []): Model
    {
        $object = $this->fill($data, $this->makeModel(), $fillable);
        $object->save();

        return $object;
    }

    /**
     * Update values in table.
     *
     * @param array $data
     * @param Model|int|array $target
     * @param array $fillable
     * @return Model
     */
    public function update(array $data, $target, array $fillable = []): Model
    {
        $object = $this->fetch($target);
        $object = $this->fill($data, $object, $fillable);
        $object->save();

        return $object;
    }

    /**
     * Delete row from table.
     *
     * @param Model|array|int $target
     * @@return bool|null
     * @throws \Exception
     */
    public function delete($target)
    {
        return $this->fetch($target)->delete();
    }

    /**
     * @param Model|array|int $target
     * @return Model
     */
    public function fetch($target): Model
    {
        if (!($target instanceof Model) && is_numeric($target)) {
            $target = $this->find($target);
        }
        if (is_array($target)) {
            $array_key = array_key_first($target);
            $target = $this->findBy([$array_key => $target[$array_key]]);
        }
        return $target;
    }



    public function find($id)
    {
        return $this->query->find($id);

    }


    public function findBy($data)
    {
        return $this->query->where($data)->get();
    }

    /**
     * @param array $filters
     * @param array $relations
     * @return Collection
     */

    public function get($filters = [], array $relations = []): Collection
    {
//        dd(intval($filters));
////        if (!empty($filters)) {
//            return $this->fetch(intval($filters))->with(array_values($relations))->get();
////        }
//        if(empty($filters)){
            return $this->query->with(array_values($relations))->get();
//        };
//        return $this->fetch($filters)->with(array_values($relations))->get();
    }


}

