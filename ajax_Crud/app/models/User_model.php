<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    public function display_user() {
        return $data = $this->db->raw('select * from users', array(), PDO::FETCH_ASSOC);
    }

	public function add_user($lastname, $firstname, $email, $gender, $address) {
        $data = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'gender' => $gender,
            'address' => $address
        );
       return $this->db->table('users')->insert($data);
    }
    
    public function update_user($lastname, $firstname, $email, $gender, $address, $id) {
        $data = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'gender' => $gender,
            'address' => $address
        );
       return $this->db->table('users')->where('id', $id)->update($data);
    }

    public function singleUser($id) {
        return $this->db->table('users')->where('id', $id)->get();
    }
    public function delete_user($id) {
        return $this->db->table('users')->where('id', $id)->delete();
    }
}
?>
