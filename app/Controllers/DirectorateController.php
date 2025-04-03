<?php

namespace App\Controllers;

use App\Models\OfficeModel;
use App\Models\DirectorateModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class DirectorateController extends BaseController
{
    public function index()
    {
        $directorates_model = new DirectorateModel();
        $directorates = $directorates_model->getDirectorates();

        return view("pages/directorates/directoratelist", ["directorates"=> $directorates]);
    }

    public function create()
    {
        return view("pages/directorates/directoratecreate");
    }

    public function store()
    {
        $rules = [
            "code"=> "required|is_unique[directorates.code]",
            "name" => "required"
        ];

        if(!$this->validate($rules))
        {
            return redirect()->back()->withInput()->with("errors", $this->validator->getErrors());
        }

        $data = [
            "code" => $this->request->getPost("code"),
            "name"=> $this->request->getPost("name"),
        ];

        $directorate_model = new DirectorateModel();
        $directorate_model->addDirectorate($data);

        return redirect()->to("directorates")->with("success","Directorate added successfully");
    }

    public function edit($id)
    {
        $directorate_model = new DirectorateModel();
        $directorate = $directorate_model->getDirectorate($id);

        return view("pages/directorates/directorateedit", ["directorate"=> $directorate]);
    }

    public function getOffices($directorateId)
    {
        $officeModel = new OfficeModel();
        
        // Get the offices related to the directorate
        $offices = $officeModel->where('directorate_id', $directorateId)->findAll();

        // Return the offices as a JSON response
        return $this->response->setJSON(['offices' => $offices]);
    }
}
