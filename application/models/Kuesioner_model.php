<?php defined('BASEPATH') OR exit ('No direct script access allowed!');

class Kuesioner_model extends CI_Model {
    private $_table = "kuesioner";

    public $id;
    public $kode;
    public $pertanyaan;

    public function rules(){
        return [
            ['field' => 'kode',
            'label' => 'kode',
            'rules' => 'required'],

          
            ['field' => 'pertanyaan',
            
            'label' => 'pertanyaan',
            'rules' => 'required'],

        ];
    }

   
    public function getAll(){
        $this->db->order_by('id','desc');        
        return $this->db->get($this->_table)->result();
    }

    public function getByID($id){
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function simpan(){

        $post = $this->input->post();
        $this->id ="";
        $this->kode = $post['kode'];
        $this->dimensi_id = $post['dimensi_id'];
        $this->pertanyaan = $post['pertanyaan'];
        $this->db->insert($this->_table, $this);

    }

    public function updatedata(){
        $post = $this->input->post();
        $this->id = $post['id'];
        $this->kode = $post['kode'];
        $this->dimensi_id = $post['dimensi_id'];
        $this->pertanyaan = $post['pertanyaan'];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function hapus($id){
        return $this->db->delete($this->_table, array('id' => $id));
    }
    function get_kuesion(){

        $this->db->from('jawaban as j'); 
        $this->db->select('*'); 
        $this->db->join('kuesioner as k', 'j.kuesioner_id = k.id', 'left');
        $this->db->group_by('j.kuesioner_id');
        $this->db->order_by('j.kuesioner_id', 'asc');

        // $this->db->from('kuesioner as k'); 
        // $this->db->select('*,k.kode as kuesionerKode,k.id as kuesionerId'); 
        // $this->db->join('dimensi as d', 'k.dimensi_id = d.id', 'left');
        // $this->db->group_by('k.kode');  
        // $this->db->order_by('k.id','asc');  
        // $this->db->limit(3);       
        // $this->db->where('d.id',1);         
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

    function get_kuesioner(){
        $this->db->from('kuesioner as k'); 
        $this->db->select('*,k.kode as kuesionerKode,k.id as kuesionerId'); 
        $this->db->join('dimensi as d', 'k.dimensi_id = d.id', 'left');
        $this->db->order_by('d.id','asc');  
        // $this->db->limit(3);       
        // $this->db->where('d.id',1);         
        $query = $this->db->get(); 
        if($query->num_rows() != 0)
        {
            return $query->result_array();
        }
        else
        {
            return false;
        }
    }

}

?>