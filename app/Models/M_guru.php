<?php

namespace App\Models;

use CodeIgniter\Model;

class M_guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    protected $allowedFields = [
        'nip',
        'nama_guru',
        'id_user',
    ];

    protected $returnType = 'object';

    public function GuruData()
    {
        return $this->db->table('guru')
            ->select('
                guru.*,
                user.username,
                user.email,
            ')
            ->join('user', 'user.id_user = guru.id_user')
            ->get()
            ->getResult();
    }

    public function getGuruById($id)
    {
        return $this->db->table('guru')
            ->select('
                guru.*,
                user.username,
                user.email,
            ')
            ->join('user', 'user.id_user = guru.id_user')
            ->where('guru.id_guru', $id)
            ->get()
            ->getRow();
    }
}
