<?php
class Power extends CI_Model
{
    public function insert ($data)
    {
        $query = $this->db->insert('ftb', $data);
        if ($query)
           redirect ('admin/show' , 'refresh');
        else echo "Sorry Could Not Insert Data";
    }
    
    public function verify ($email , $password)
    {
        $this->db->where('Email' , $email);
        $this->db->where('Password' , $password);
        $query = $this->db->get('admin');
        return $query;
    }
    
    public function selectall()
    {
        $query = $this->db->get('ftb');
        return $query->result_array();
    }
    
    public function update($newdata)
    {
        $this->db->where('ID', $this->session->userdata['editdata']['ID']);
        $query = $this->db->update('ftb', $newdata);
        if ($query)
            redirect ('admin/show' , 'refresh');
        else echo "Sorry Could Not Update Data";
    }
    
    public function fetch($ID)
    {
        $this->db->where('ID' , $ID);
        $query = $this->db->get('ftb');
        return $query->row_array();
    }
    
    public function delete($ID)
    {
        $this->db->where('ID', $ID);
        $query = $this->db->delete('ftb');
        if ($query)
            redirect ('admin/show' , 'refresh');
        else echo "Sorry Could Not Delete Data";
    }
    
    public function details($ID)
    {
        $this->db->where('Flight_ID' , $ID);
        $query = $this->db->get('ticket');
        return $query->result_array();
    }
    
    public function search($newdata)
    {
        $this->db->where('FFrom' , $newdata['FFrom']);
        $this->db->where('TTo' , $newdata['TTo']);
        $this->db->where('Date' , $newdata['Date']);
        $query = $this->db->get('ftb');
        return $query->result_array();
    }
}
?>