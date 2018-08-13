<?php
/**
 * Created by PhpStorm.
 * User: MAP
 * Date: 8/9/2018
 * Time: 12:18 AM
 */

namespace App\Repository;


use App\models\Network;

class ModelNetwork extends AbtractClass
{
    public function getModel()
    {
        return $network=new Network();
    }
    public function getAll()
    {
        return $this->model->all();
    }
}