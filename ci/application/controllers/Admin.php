<?php
class Admin extends CI_Controller
{
    public function insert()
    {
        if (!isset($this->session->userdata['signed']))
            redirect ('admin/login' , 'refresh');
        else {
        $this->load->view('insert');
        if(isset($_POST['Create']))
        {
            $data = array(
                'FFrom' => $this->input->post('from'),
                'TTo' => $this->input->post('to'),
                'Date' => $this->input->post('date'),
                'Departure' => $this->input->post('departure'),
                'Arrival' => $this->input->post('arrival'),
                'Duration' => $this->input->post('duration'),
                'Price' => $this->input->post('price'),
                'Seat' => $this->input->post('seat')
            );
                
            $this->load->model('Power');
            $query = $this->Power->insert($data);
            if ($query)
                echo "Schedule Successfully Created";
            else echo "Sorry Something Went Wrong Please Try Again Later";
            }
        }
    }

    public function login()
    {
        $this->load->view('login');
        if(isset($_POST['Login']))
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $this->load->model('Power');
            $query = $this->Power->verify ($email , $password);
            if ($query->num_rows() == 1)
            {
                $row = $query->row_array();
                $this->session->set_userdata('signed', $row);
                redirect ('admin/insert' , 'refresh');
            }
            else echo "Sorry No Such Account";
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('signed');
        $this->session->sess_destroy();
        redirect ('admin/login' , 'refresh');
    }
    
    public function show()
    {
        $this->load->model('Power');
        $data['query'] = $this->Power->selectall();
        $this->load->view ('viewflights' , $data);
        if (isset($_POST['Details']))
            $this->details($this->input->post('ID'));
        else if (isset($_POST['Edit']))
            $this->edit($this->input->post('ID'));
        else if (isset($_POST['Delete']))
            $this->delete($this->input->post('ID'));
    }
    
    public function edit($ID)
    {
        $this->load->model('Power');
        $query = $this->Power->fetch($ID);
        if ($query->num_rows() == 1)
            {
                $row = $query->row_array();
                $this->session->set_userdata('editdata', $row);
                redirect ('admin/fedit' , 'refresh');
            }
        /*
        $data['query'] = $this->Power->fetch($ID);
        $this->load->view ('flightedit' , $data);
        if(isset($_POST['Update']))
        {
            $newdata = array(
                'FFrom' => $this->input->post('from'),
                'TTo' => $this->input->post('to'),
                'Date' => $this->input->post('date'),
                'Departure' => $this->input->post('departure'),
                'Arrival' => $this->input->post('arrival'),
                'Duration' => $this->input->post('duration'),
                'Price' => $this->input->post('price'),
                'Seat' => $this->input->post('seat')
            );
            $this->Power->update($ID , $newdata);
        }
        */
    }
    
    public function fedit()
    {
        $this->load->view('flightedit');
        if(isset($_POST['Update']))
        {
            $newdata = array(
                'FFrom' => $this->input->post('from'),
                'TTo' => $this->input->post('to'),
                'Date' => $this->input->post('date'),
                'Departure' => $this->input->post('departure'),
                'Arrival' => $this->input->post('arrival'),
                'Duration' => $this->input->post('duration'),
                'Price' => $this->input->post('price'),
                'Seat' => $this->input->post('seat')
            );
            $this->load->model('Power');
            $this->Power->update($newdata);
        }
    }
    
    public function delete($ID)
    {
        $this->load->model('Power');
        $this->Power->delete($ID);
    }
    
    public function details($ID)
    {
        $this->load->model('Power');
        $data['query'] = $this->Power->details($ID);
        $this->load->view ('flightdetails' , $data);
    }
    
    public function search()
    {
        $this->load->view('search');
        if(isset($_POST['Search']))
        {
            $newdata = array(
                'FFrom' => $this->input->post('from'),
                'TTo' => $this->input->post('to'),
                'Date' => $this->input->post('date'),
            );
            $this->load->model('Power');
            $data['query'] = $this->Power->search($newdata);
            $this->load->view ('searchresult' , $data);
        }
    }
}
?>