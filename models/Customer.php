<?php
  class Customer {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addCustomer($data) {
      // Prepare Query
      $this->db->query('INSERT INTO customers (id, first_name, last_name,username) VALUES(:id, :first_name, :last_name,:username)');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':first_name', $data['first_name']);
      $this->db->bind(':last_name', $data['last_name']);
      $this->db->bind(':username',$data['username']);
      // $this->db->bind(':email', $data['email']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }

  }