<?php

namespace App\Models;

use CodeIgniter\Model;

class DirectoratesModel extends Model
{
    protected $table            = 'directorates';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['code', 'name'];
}
