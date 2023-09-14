<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invite_M extends CI_Model
{
    public function get($caten)
    {
        $this->db->from('invite');
        $this->db->where('caten', $caten);
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'caten' => $post['caten'],
            'nm_invite' => $post['nm_invite'],
            'url_invite' => $post['url_invite'],
        ];
        $this->db->insert('invite', $params);
    }

    public function del($id)
    {
        $this->db->where('id_invite', $id);
        $this->db->delete('invite');
    }
}
