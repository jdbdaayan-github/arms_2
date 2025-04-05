<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DirectorateModel;
use App\Models\UserModel;
use App\Models\UserRoleModel;
use CodeIgniter\HTTP\ResponseInterface;

class AuthController extends BaseController
{
    public function login()
    {
        // Define CAPTCHA configurations
        $captcha_config = [
            'img_width' => 350,
            'img_height' => 50,
            'word_length' => 6,
            'font_size' => 24,
            'img_path' => './assets/captcha/',
            'img_url' => base_url('/assets/captcha/'),
            'expiration' => 3600,
        ];

        // ❌ Delete any old CAPTCHA image stored in the session
        $old_captcha = session()->get('captcha_filename');
        if ($old_captcha && file_exists($old_captcha)) {
            unlink($old_captcha);
        }

        // Generate new CAPTCHA word
        $captcha_word = $this->generate_captcha_word($captcha_config['word_length']);

        // Create new CAPTCHA image
        $captcha_image_path = $this->create_captcha_image($captcha_word, $captcha_config);

        // Store CAPTCHA word & filename in session
        session()->set([
            'captcha_word' => $captcha_word,
            'captcha_filename' => $captcha_image_path
        ]);

        return view("auth/login", ['captcha_image' => $captcha_image_path]);
    }

    private function generate_captcha_word($length = 6)
{
    $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789';
    $captcha_word = '';

    for ($i = 0; $i < $length; $i++) {
        $captcha_word .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $captcha_word;
}


    // Create CAPTCHA image
    private function create_captcha_image($captcha_word, $config)
    {
        $image = imagecreatetruecolor($config['img_width'], $config['img_height']);

        $light_blue = imagecolorallocate($image, 240, 248, 255);
        imagefill($image, 0, 0, $light_blue);

        $text_color = imagecolorallocate($image, 0, 0, 0);
        $line_color = imagecolorallocate($image, 160, 206, 232);

        $font_path = './assets/fonts/arial.ttf';

        for ($i = 0; $i < 50; $i++) {
            imageline($image, rand(0, $config['img_width']), rand(0, $config['img_height']), rand(0, $config['img_width']), rand(0, $config['img_height']), $line_color);
        }

        $x = 10;
        for ($i = 0; $i < strlen($captcha_word); $i++) {
            $angle = rand(-10, 10);
            $y = rand(30, 40);
            imagettftext($image, $config['font_size'], $angle, $x, $y, $text_color, $font_path, $captcha_word[$i]);
            $x += $config['font_size'] + 2;
        }

        $captcha_image_path = $config['img_path'] . time() . '.png';
        imagepng($image, $captcha_image_path);
        imagedestroy($image);

        return $captcha_image_path;
    }

    public function authenticate()
    {
        $session = session();
        $captcha_word = $session->get('captcha_word');
        $captcha_filename = $session->get('captcha_filename');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $captcha_input = $this->request->getPost('captcha');

        $userModel = new UserModel();
        $userRoleModel = new UserRoleModel();

        $user = $userModel->where('username', $username)->first();

        if (!$user) {
            return redirect()->to('/login')->with('errors', 'Invalid username or password.');
        }

        if ($user['login_attempts'] >= 3) {
            return redirect()->to('/login')->with('errors', 'Your account is locked due to multiple failed login attempts. Contact the administrator.');
        }

        if ($user['verified'] == 0) {
            return redirect()->to('/login')->with('errors', 'Your account has not been verified. Contact the administrator.');
        }

        if ($captcha_input !== $captcha_word) {
            return redirect()->to('/login')->with('errors', 'Incorrect CAPTCHA.');
        }

        if (!password_verify($password, $user['password'])) {
            $userModel->update($user['id'], ['login_attempts' => $user['login_attempts'] + 1]);
            return redirect()->to('/login')->with('errors', 'Invalid username or password.');
        }

        $userModel->update($user['id'], ['login_attempts' => 0]);

        $roles = $userRoleModel->getUserRoles($user['id']);
        $userRoles = array_column($roles, 'role_name');

        $session->set([
            'user_id'   => $user['id'],
            'user_name'  => $user['firstname']." ".$user['middlename']." ".$user['lastname'],
            'roles'     => $userRoles,
            'logged_in' => TRUE,
        ]);

        // Delete used CAPTCHA image
        if ($captcha_filename && file_exists($captcha_filename)) {
            unlink($captcha_filename);
        }

        $session->remove(['captcha_word', 'captcha_filename']);

        return redirect()->to('users')->with('success', 'Login successful.');
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

            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with("errors", $this->validator->getErrors());
            }

            $data = [
                "firstname" => $this->request->getPost("firstname"),
                "middlename" => $this->request->getPost("middlename"),
                "lastname" => $this->request->getPost("lastname"),
                "extension" => $this->request->getPost("extension"),
                "office_id" => $this->request->getPost("office"),
                "email" => $this->request->getPost("email"),
                "username" => $this->request->getPost("username"),
                "password" => password_hash($this->request->getPost("password"), PASSWORD_DEFAULT),
                'status_id' => 1,
            ];

            $user_model = new UserModel();
            $user_model->insert($data);
            return redirect()->to('/login')->with("success", "Account registered successfully.");
        }

        $directorate_model = new DirectorateModel();
        $directorates = $directorate_model->findAll();

        return view("auth/register", ['directorates' => $directorates]);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login')->with('success', 'Logged out successfully.');
    }
}
