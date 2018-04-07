<?php
class Auth extends CI_Controller
{
    public function register()
    {
        $this->load->view('register');
        if(isset($_POST['Create']))
        {
            $data = array(
                'Name' => $this->input->post('name'),
                'Gender' => $this->input->post('gender'),
                'Email' => $this->input->post('email'),
                'Telephone' => $this->input->post('telephone'),
                'Country' => $this->input->post('country'),
                'Password' => $this->input->post('password')
            );
            $this->db->where('Email' , $data['Email']);
            $query = $this->db->get('utb');
            if ($query->num_rows() > 0)
                echo "Sorry There Is Already An Account With This Email";
            else
            {
                $this->load->model('User');
                $query = $this->User->insert($data);
                if ($query)
                    echo "Account Successfully Created";
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
            $this->load->model('User');
            $query = $this->User->verify ($email , $password);
            if ($query->num_rows() == 1)
            {
                $row = $query->row_array();
                $this->session->set_userdata('signed', $row);
                redirect ('auth/show' , 'refresh');
            }
            else echo "Sorry No Such Account";
        }
    }
    
    public function show()
    {
        $this->load->view('show');
    }
    
    public function edit()
    {
        $this->load->view('edit');
        if(isset($_POST['Update']))
        {
            $newdata = array(
                'Name' => $this->input->post('name'),
                'Gender' => $this->input->post('gender'),
                'Email' => $this->input->post('email'),
                'Telephone' => $this->input->post('telephone'),
                'Country' => $this->input->post('country')
            );
            $this->load->model('User');
            $this->User->update($newdata);
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('signed');
        $this->session->sess_destroy();
        redirect ('auth/login' , 'refresh');
    }
}
?>