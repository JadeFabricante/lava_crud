<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_controller extends Controller {
	public function __construct()
    {
        parent::__construct();
        $this->call->model('user_model');
    }

    public function create_user() {
        if($this->form_validation->submitted()) {
            $firstname = $this->io->post('firstname');
            $lastname = $this->io->post('lastname');
            $email = $this->io->post('email');
            $gender = $this->io->post('gender');
            $address= $this->io->post('address');

            if($this->user_model->add_user($lastname, $firstname, $email, $gender, $address)){
                set_flash_alert('success', 'User added successfully');
            }
            else{
                set_flash_alert('danger', 'User add failed');
            }
        }
        $this->call->view('users/create');
    }   

    public function update_user($id) {
        if($this->form_validation->submitted()) {
            $lastname = $this->io->post('lastname');
            $firstname = $this->io->post('firstname');
            $email = $this->io->post('email');
            $gender = $this->io->post('gender');
            $address= $this->io->post('address');

            if($this->user_model->update_user($lastname, $firstname, $email, $gender, $address, $id)){
                set_flash_alert('success', 'Updated Successfully');
            }
            else{
                set_flash_alert('danger', 'Update Failed');
            }
        }
        $data['users'] = $this->user_model->singleUser($id);
        $this->call->view('users/update', $data);  
    }

    public function delete_user($id) {
        if($this->user_model->delete_user($id)){
            set_flash_alert('success', 'Deleted Successfully');
            redirect('/users/display');
        }
        else{
            set_flash_alert('danger', 'Delete Failed');
            redirect('/users/display');
        }
    }
    public function read_users(){
        $data['users'] = $this->user_model->display_user();
        $this->call->view('users/display', $data);
    }
}
?>
