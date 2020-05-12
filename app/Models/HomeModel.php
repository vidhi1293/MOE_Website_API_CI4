<?php namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    protected $table = 'tblusers';

    public function getUsers($slug = false)
    {
        if ($slug === false)
        {
            return $this->findAll();
        }

        return $this->asArray()
                    ->where(['slug' => $slug])
                    ->first();
    }

}