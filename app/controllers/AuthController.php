<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->call->model('AccountModel');
    }

    public function login()
    {
        if (isset($_SESSION['user'])) {
            redirect('products');
        }

        if ($this->io->method() == 'post') {
            $username = $this->io->post('username');
            $password = $this->io->post('password');

            $account = $this->AccountModel->get_by_username($username);

            if ($account && password_verify($password, $account['password'])) {
                $_SESSION['user'] = [
                    'id'       => $account['id'],
                    'username' => $account['username'],
                ];
                redirect('products');
            } else {
                $data['error'] = 'Invalid username or password.';
                $this->call->view('login_view', $data);
                return;
            }
        }

        $this->call->view('login_view');
    }

    public function logout()
    {
        unset($_SESSION['user']);
        session_destroy();
        redirect('login');
    }
}