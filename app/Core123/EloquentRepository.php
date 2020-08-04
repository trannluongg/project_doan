<?php
/**
 * Created by PhpStorm.
 * User: Dinh Huong
 * Date: 06/08/18
 * Time: 8:52 AM
 */

namespace App\Core123;
use App\GatewaySetField\SetFieldTrait;
use Illuminate\Support\Arr;

abstract class EloquentRepository implements RepositoryInterface
{
    use SetFieldTrait, ScopeCondition, HelperCondition;
    protected $model;
    protected $relationship;
    protected $arrayOpr = [
        '=',
        '!=',
        '<>',
        '>=',
        '<=',
        '>',
        '<',
        'like',
    ];

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function updateById($id, $data = [])
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function update($filter = [], $data = [])
    {
        $result = $this->model;
        if ($where = Arr::get($filter, 'where'))
        {
            $result = $this->scopeWhere($result, $where);
        }

        return $result->update($data);
    }

    public function updateOrCreate($filter, $data)
    {
        return $this->model->updateOrCreate($filter, $data);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function valueById($id, $column)
    {
        return $this->model->where('id', $id)->value($column);
    }

    public function value($filter = [], $field)
    {
        $result = $this->model;
        if ($where = Arr::get($filter, 'where'))
        {
            $result = $this->scopeWhere($result, $where);
        }

        return $result->value($field);
    }

    public function firstById($id, $fields = null)
    {
        $fields = $fields ? $this->convertSelectedFields($fields) : ['*'];

        return $this->model->where('id', $id)->first($fields);
    }

    public function first($filter = [], $fields = null)
    {
        $result = $this->model;
        if ($relation = Arr::get($filter, 'relation'))
        {
            $result = $this->scopeRelation($result, $relation);
        }
        if ($where = Arr::get($filter, 'where'))
        {
            $result = $this->scopeWhere($result, $where);
        }

        $fields = $fields ? $this->convertSelectedFields($fields) : ['*'];

        return $result->first($fields);
    }

    public function pluck($filter, $fields, $key = null)
    {
        $result = $this->model;
        if ($where = Arr::get($filter, 'where'))
        {
            $result = $this->scopeWhere($result, $where);
        }
        if ($whereIn = Arr::get($filter, 'whereIn'))
        {
            $result = $this->scopeWhereIn($result, $whereIn);
        }
        if ($whereMonth = Arr::get($filter, 'whereMonth'))
        {
            $result = $this->scopeWhereMonth($result, $whereMonth);
        }
        if ($limit = Arr::get($filter, 'limit'))
        {
            $result = $result->limit($limit);
        }
        if ($groupBy = Arr::get($filter, 'groupBy'))
        {
            $result = $result->groupBy($groupBy);
        }

        $fields = $fields ? $this->convertSelectedFields($fields) : ['*'];

        return $result->pluck($fields, $key);
    }

    public function increment($id, $field, $number = 1)
    {
        return $this->model->where('id', $id)->increment($field, $number);
    }

    public function decrement($id, $field, $number = 1)
    {
        return $this->model->where('id', $id)->decrement($field, $number);
    }

    public function count($filter)
    {
        $result = $this->model;
        if ($where = Arr::get($filter, 'where'))
        {
            $result = $this->scopeWhere($result, $where);
        }
        if ($whereDate = Arr::get($filter, 'whereDate'))
        {
            $result = $this->scopeWhereDate($result, $whereDate);
        }
        if ($whereMonth = Arr::get($filter, 'whereMonth'))
        {
            $result = $this->scopeWhereMonth($result, $whereMonth);
        }
        if ($between = Arr::get($filter, 'between'))
        {
            $result = $this->scopeBetween($result, $between);
        }
        if ($groupBy = Arr::get($filter, 'groupBy'))
        {
            $result = $this->groupBy($groupBy);
        }

        return $result->count();
    }

    public function findOneByField($field, $val, $ope = '=', $fields = null)
    {
        $fields = $fields ? $this->convertSelectedFields($fields) : ['*'];

        return $this->model->where($field, $ope, $val)->first($fields);
    }

    public function convertAddPrefix($prefix, $fields)
    {
        $arrExcept = ['id', 'created_at', 'updated_at', 'approve_at'];
        $result = [];
        if (!is_array($fields))
        {
            $fields = explode(',', $fields);
        }
        foreach ($fields as $i => $item)
        {
            if (in_array($item, $arrExcept))
            {
                $result[$i] = $item;
                continue;
            }
            $result[$i] = $prefix . '_' . $item;
        }

        return $result;
    }

    public function addTableNameSelectFields($tableName, $fields)
    {
        $result = [];
        if (!is_array($fields))
        {
            $fields = explode(',', $fields);
        }
        foreach ($fields as $key => $field)
        {
            $result[$key] = $tableName . '.' . $field;
        }

        return $result;
    }

    protected function convertSelectedFields($fields, $flag_file = null)
    {
        $fields = is_array($fields) ? $fields : explode(',', $fields);

        $fieldClass = $flag_file == null ? new $this->model->fieldClass : new $this->model->fieldClass_v2;

        $setField = $this->getField($fieldClass);

        $fields = array_intersect($fields, $setField);

        if($this->model->prefix)
        {
            $fields = $this->convertAddPrefix($this->model->prefix, $fields);
        }

        return $fields;
    }

    protected function withRelations($query, $include, $relationships)
    {
        $relations = array_intersect_key($include, $relationships);

        if($relations)
        {
            foreach ($relations as $relation => $param)
            {
                $query->with([$relation => function ($query) use ($relation, $param, $relationships)
                {
                    $modelClass = $relationships[$relation];

                    $model = new $modelClass;

                    $prefix = $model->prefix ?? '';

                    $fieldClass = $model->fieldClass;

                    $limit = $param->limit ?? 20;

                    $where = $param->where ?? null;
                    if($where) $query = $this->scopeWhere($query, $where, $prefix);

                    $order = $param->order ?? [['id', 'desc']];
                    $query = $this->scopeMultiOrder($query, $order, $prefix);

                    $fields = $param->fields ?? ['id'];
                    $fields = is_string($fields) ? explode(',', $fields) : $fields;

                    $setField = $this->getField(new $fieldClass);

                    $fields = array_intersect($setField, $fields);
                    $fields = $prefix ? $this->convertAddPrefix($prefix, $fields) : $fields;

                    $query->select($fields);

                    $include = $param->include ?? null;
                    if($include) $query = $this->withRelations($query, (array)$include, $model->relationships);

                    return $query->limit($limit);
                }]);
            }
        }

        return $query;
    }

    public function scopeQuery($query, $filter = [], $fields = null, $tableName = '', $flag_file = null)
    {
        $select     = ['id'];
        $order      = $filter['order'] ?? [['id', 'desc']];
        $include    = $filter['include'] ?? null;

        $date_range = $filter['date_range'] ?? null;

        if($include) $this->withRelations($query, (array)json_decode($include), $this->model->relationships);

        if($fields)
        {
            $fields = $this->convertSelectedFields($fields, $flag_file);
            $select = array_merge($fields, $select);
        }

        if($tableName) $select = $this->addTableNameSelectFields($tableName, $select);

        if($date_range) {
            $time = \App\Core123\Helper\FilterHelper::getStartEndTime($date_range);
            $query->whereBetween('created_at',$time);
        }

        if($order) $query = $this->scopeMultiOrder($query, $order, $this->model->prefix);

        $query = $query->select($select);

        return $query;
    }

    public function scopeWhereEqual($query, $where = [])
    {
        $where = array_filter($where, function($value) {
            return !is_null($value);
        });

        foreach ($where as $key => $val)
        {
            $query->where($key, $val);
        }
        return $query;
    }
}
