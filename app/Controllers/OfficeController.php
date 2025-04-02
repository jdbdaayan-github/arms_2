<?php

namespace App\Controllers;

use App\Models\OfficeModel;
use App\Controllers\BaseController;
use App\Models\DirectorateModel;
use CodeIgniter\HTTP\ResponseInterface;

class OfficeController extends BaseController
{
    public function index()
    {
        $office_model = new OfficeModel();
        $offices = $office_model->getOffices();

        return view("pages/offices/officelist", compact("offices"));
    }

    public function create()
    {
        $directorate_model = new DirectorateModel();
        $directorates = $directorate_model->getDirectorates();

        return view("pages/offices/officecreate", compact("directorates"));
    }

    public function store()
    {
        $rules = [
            "office_code" => "required|is_unique[offices.code]",
            "office_name"=> "required",
            "directorate_id"=> "required",
        ];

        if(!$this->validate($rules))
        {
            return redirect()->back()->withInput()->with("errors",$this->validator->getErrors());
        }

        $data = [
            'code' => $this->request->getPost('office_code'),
            'name'=> $this->request->getPost('office_name'),
            'directorate_id' => $this->request->getPost('directorate_id'),
        ];

        $office_model = new OfficeModel();

        if($office_model->addOffice($data))
        {
            return redirect()->to('offices')->with('success','Office added successfully');
        }
        
    }
}
