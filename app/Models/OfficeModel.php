<?php

namespace App\Models;

use CodeIgniter\Model;

class OfficeModel extends Model
{
    protected $table            = 'offices';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['code', 'name', 'directorates_id'];

    public function getOffices()
    {
        return $this->findAll();
    }
}