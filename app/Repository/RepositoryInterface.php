<?php
/**
 * Created by PhpStorm.
 * User: MAP
 * Date: 8/9/2018
 * Time: 12:12 AM
 */

namespace App\Repository;


interface RepositoryInterface
{
    public function all($row=15);
    public function find(int $id);
    public function create(array $data);
    public function update(int $id,array $data);
    public function delete(int $id);
}