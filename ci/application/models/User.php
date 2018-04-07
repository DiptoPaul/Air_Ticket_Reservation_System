<?php
class User extends CI_Model
{
    public function insert ($data)
    {
        $query = $this->db->insert('utb', $data);
        if ($query)
           return true;
        else return false; 
    }
    
    public function verify ($email , $password)
    {
        $this->db->where('Email' , $email);
        $this->db->where('Password' , $password);
        $query = $this->db->get('utb');
        return $query;
    }
    
    public function update($newdata)
    {
        $this->db->where('ID', $this->session->userdata['signed']['ID']);
        $uq = $this->db->update('utb', $newdata);
        if ($uq)
        {
            $this->db->where('ID', $this->session->userdata['signed']['ID']);
            $sq = $this->db->get('utb');
            $row = $sq->row_array();
            $this->session->set_userdata('signed', $row);
            redirect ('auth/show' , 'refresh');
        }
        else echo "Sorry Could Not Update Data";
    }
}
?>