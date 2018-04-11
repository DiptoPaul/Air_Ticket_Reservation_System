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
    
    public function search($newdata)
    {
        $this->db->where('FFrom' , $newdata['FFrom']);
        $this->db->where('TTo' , $newdata['TTo']);
        $this->db->where('Date' , $newdata['Date']);
        $this->db->where('Seat >', 0);
        $query = $this->db->get('ftb');
        return $query->result_array();
    }
    
    public function book($ID)
    {
        $data = array(
                'Flight_ID' => $ID,
                'Passenger_ID' => $this->session->userdata['signed']['ID']
        );
        $query1 = $this->db->insert('ticket', $data);
        $this->db->set('Seat', 'Seat-1', FALSE);
        $this->db->where('ID', $ID);
        $query2 = $this->db->update('ftb');
        if ($query1 && $query2)
           return true;
        else return false;
    }
}
?>