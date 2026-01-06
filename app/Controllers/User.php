<?php

namespace App\Controllers;

use App\Models\M_login;
use App\Models\M_level;


class User extends BaseController
{
    public function __construct()
    {
        $this->model = new M_login();
        $this->mlevel = new M_level();
    }

    public function input()
    {
        $parent['level'] = $this->mlevel->findAll();
        $this->model->insert([
            'username' => $this->request->getPost('username'),
            'password' => MD5($this->request->getPost('password')),
            'email' => $this->request->getPost('email'),
            'level' => $this->request->getPost('level')
        ]);
        return redirect()->to('/tampildata');
    }

    public function editview($id)
    {
        $parent['level'] = $this->mlevel->findAll();
        $parent['user'] = $this->model->find($id);

        echo view('header');
        echo view('euser', $parent);
        echo view('footer');
    }

    public function simpan()
    {
        $id = $this->request->getPost('id');

        $data = [
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'level'    => $this->request->getPost('level'),
        ];
        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        $this->model->update($id, $data);

        return redirect()->to('/tampildata')
            ->with('success', 'Berhasil edit data.');
    }

    public function hapus($id)
    {
        $this->model->delete($id);
        return redirect()->to('/tampildata')->with('success', 'Product has been  deleted.');
    }
}
