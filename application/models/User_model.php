<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class User_model extends CI_Model {
    private $_table = "user";

    public $id;
    public $name;

    public function rules(){
        return [
           

            ['field' => 'nama',
            'label' => 'nama', 
            'rules' => 'required'],            

        ];
    }

    public function getAll(){
        $this->db->order_by('id','desc');        
        return $this->db->get($this->_table)->result();
    }
    public function getDesc(){
        $this->db->from($this->_table);
        $this->db->order_by("id", "desc");
        $this->db->limit(1);
        $query = $this->db->get(); 
        return $query->result();
    }

    public function getByID($id){
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function simpan(){

        $post = $this->input->post();
        $this->id ="";
        $this->nama = $post['nama'];
        $this->kode = $post['kode'];
        $this->detail = $post['detail'];
        $this->db->insert($this->_table, $this);

    }

    public function updatedata(){
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->nama = $post['nama'];
        $this->kode = $post['kode'];
        $this->detail = $post['detail'];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function hapus($id){
        return $this->db->delete($this->_table, array('id' => $id));
    }

}

?>