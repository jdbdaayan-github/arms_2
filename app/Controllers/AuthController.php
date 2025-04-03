<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DirectorateModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
            // Start session to store CAPTCHA word
        session()->start();

        // Define CAPTCHA configurations
        $captcha_config = [
            'img_width' => 350,
            'img_height' => 50,
            'word_length' => 6, // Number of characters in the CAPTCHA
            'font_size' => 24,
            'img_path' => './assets/captcha/', // Store generated CAPTCHA image
            'img_url' => base_url('/assets/captcha/'), // URL to access the CAPTCHA
            'expiration' => 3600, // Set expiration for the CAPTCHA
        ];

        // Generate CAPTCHA word
        $captcha_word = $this->generate_captcha_word($captcha_config['word_length']);

        // Create CAPTCHA image
        $captcha_image = $this->create_captcha_image($captcha_word, $captcha_config);

        // Save CAPTCHA word in the session for later verification
        session()->set('captcha_word', $captcha_word);
        return view("auth/login", ['captcha_image' => $captcha_image]);
    }

    // Generate random CAPTCHA word
    private function generate_captcha_word($length = 6)
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $captcha_word = '';
        for ($i = 0; $i < $length; $i++) {
            $captcha_word .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $captcha_word;
    }

    // Create CAPTCHA image using GD and Arial font
    private function create_captcha_image($captcha_word, $config)
    {
        $image = imagecreate($config['img_width'], $config['img_height']);
        $background_color = imagecolorallocate($image, 240, 240, 240); // Light gray background
        $text_color = imagecolorallocate($image, 0, 0, 0); // Black text color

        // Path to Arial font (Make sure Arial.ttf is accessible)
        $font_path = './assets/fonts/arial.ttf';

        // Add random noise or lines (optional, for better security)
        for ($i = 0; $i < 5; $i++) {
            imageline($image, rand(0, $config['img_width']), rand(0, $config['img_height']), rand(0, $config['img_width']), rand(0, $config['img_height']), $text_color);
        }

        // Write the CAPTCHA text in the image
        imagettftext($image, $config['font_size'], rand(-5, 5), rand(10, 50), rand(30, 40), $text_color, $font_path, $captcha_word);

        // Output the image
        $captcha_image_path = $config['img_path'] . $captcha_word . '.png';
        imagepng($image, $captcha_image_path); // Save image to file

        // Free up memory
        imagedestroy($image);

        return $config['img_url'] . $captcha_word . '.png'; // Return URL of the CAPTCHA image
    }

    public function authenticate()
    {
        // Get the CAPTCHA word from the session
        $captcha_word = session()->get('captcha_word');

        // Check if the CAPTCHA matches
        if ($this->request->getPost('captcha') !== $captcha_word) {
            // CAPTCHA is incorrect
            session()->setFlashdata('errors', ['Incorrect CAPTCHA.']);
            return redirect()->to('/login');
        }
        // CAPTCHA is incorrect
        session()->setFlashdata('success', ['Correct CAPTCHA.']);
        return redirect()->to('/login');

        // Continue with authentication
    }


    public function register()
    {   
        if ($this->request->is('post')) 
        {
            $rules = [
                "firstname" => "required",
                "middlename" => "permit_empty",
                "lastname" => "required",
                "extension" => "permit_empty",
                "directorate" => "required",
                "office" => "required",
                "email" => "required|valid_email|is_unique[users.email]",
                "username" => "required|is_unique[users.username]",
                "password" => "required",
                "confirm_password" => "required|matches[password]",
            ];
            var_dump($rules);
            if(!$this->validate($rules))
            {
                return redirect()->back()->withInput()->with("error", $this->validator->getErrors());
            }

            $data = [
                "firstname" => $this->request->getPost("firstname"),
                "middlename" => $this->request->getPost("middlename"),
                "lastname" => $this->request->getPost("lastname"),
                "extension" => $this->request->getPost("extension"),
                "office_id" => $this->request->getPost("office"),
                "email" => $this->request->getPost("email"),
                "username"=> $this->request->getPost("username"),
                "password"=> password_hash($this->request->getPost("password"), PASSWORD_DEFAULT),
                'status_id' => 1,
            ];

            $user_model = new UserModel();
            $user_model->addUser($data);
            return redirect()->to('login')->with("success","Register account successfully");


        }
        $directorate_model = new DirectorateModel();
        $directorates = $directorate_model->getDirectorates();

        return view("auth/register",['directorates' => $directorates] );
    }
    public function logout()
    {
        //
    }
}
