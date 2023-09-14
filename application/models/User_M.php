<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_M extends CI_Model
{
    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('user_login');
        $this->db->where('username', $post['username']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }

    public function get($id = null)
    {
        $this->db->from('user_login');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['name'],
            'username' => $post['username'],
            'password' => sha1($post['password']),
            'caten_pr' => $post['caten_pr'] != "" ? $post['caten_pr'] : null,
            'caten_lk' => $post['caten_lk'] != "" ? $post['caten_lk'] : null,
            'nm_anak' => $post['nm_anak'] != "" ? $post['nm_anak'] : null,
            'address' => $post['address'] != "" ? $post['address'] : null,
            'url_undangan' => $post['url_undangan'],
            'level' => $post['level'],
            'jenis_undangan' => $post['jenis_undangan'],
        ];
        $this->db->insert('user_login', $params);
    }

    public function edit($post)
    {
        $params['name'] = $post['fullname'];
        $params['username'] = $post['username'];
        if (!empty($post['password'])) {
            $params['password'] = sha1($post['password']);
        }
        $params['caten_pr'] = $post['caten_pr'];
        $params['caten_lk'] = $post['caten_lk'];
        $params['nm_anak'] = $post['nm_anak'];
        $params['address'] = $post['address'] != "" ? $post['address'] : null;
        $params['url_undangan'] = $post['url_undangan'];
        $params['level'] = $post['level'];
        $params['jenis_undangan'] = $post['jenis_undangan'] != "" ? $post['jenis_undangan'] : null;
        $this->db->where('user_id', $post['user_id']);
        $this->db->update('user_login', $params);
    }

    public function del($id)
    {
        $this->db->where('user_id', $id);
        $this->db->delete('user_login');
    }
}
