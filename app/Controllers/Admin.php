<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    protected $admin;
    public function __construct()
    {
        $this->admin = new AdminModel();
    }
    public function index()
    {
        $numRow = $this->admin->countAllResults();
        if ($numRow == 0)
            $this->admin->insert(['username' => 'admin', 'password' => password_hash('admin', PASSWORD_DEFAULT), 'akses' => 'Admin']);
        return view('admin');
    }

    function login()
    {
        $param = $this->request->getPost();
        $admin = $this->admin->where('username', $param['username'])->first();

        if ($admin) {
            if (password_verify($param['password'], $admin['password'])) {
                if ($admin['akses'] == 'admin') {
                    $itemSession = [
                        'uid' => $admin['id'],
                        'nama' => 'Admin',
                        'akses' =>$admin['akses'],
                        'isLogin' => true,
                    ];
                    $session = session();
                    $session->set($itemSession);
                    return redirect()->to(base_url(''));
                }
            }else {
                    session()->setFlashdata('error', 'Password tidak ditemukan');
                    return view('auth');
                }
            }else{
                session()->setFlashdata('error', 'User tidak ditemukan');
                    return view('auth');
            }
        }

        function logout()
        {
            session()->destroy();
            return redirect()->to(base_url('authentication'));
        }
    }