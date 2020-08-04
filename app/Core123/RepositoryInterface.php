<?php
/**
 * Created by PhpStorm.
 * User: TranLuong
 * Date: 15/06/2020
 * Time: 22:08
 */

namespace App\Core123;


interface RepositoryInterface
{
    public function create(array $data);

    public function insert(array $data);

    public function updateById($id, $data = []);

    public function update($filter = [], $data = []);

    public function delete($id);

    public function valueById($id, $column);

    public function value($filter = [], $field);

    public function firstById($id, $fields = null);

    public function first($filter = [], $fields = null);

    public function pluck($filter, $fields, $key = null);

    public function count($filter);

    public function increment($id, $field, $number = 1);

    public function decrement($id, $field, $number = 1);

    public function findOneByField($field, $val, $ope = '=', $fields = null);
}
