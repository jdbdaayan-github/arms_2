<?php

namespace App\Controllers;

use App\Models\OfficeModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class OfficeController extends BaseController
{
    public function index()
    {
        $office_model = new OfficeModel();
        $offices = $office_model->getOffices();

        return view("pages/offices/officelist", compact("offices"));
    }
}
