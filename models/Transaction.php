<?php
  class Transaction {
    private $db;

    public function __construct() {
      $this->db = new Database;
    }

    public function addTransaction($data) {
      // Prepare Query
      $this->db->query('INSERT INTO transactions (id, customer_id, product, amount, currency, status,username,ownername) VALUES(:id, :customer_id, :product, :amount, :currency, :status,:username,:ownername)');

      // Bind Values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':customer_id', $data['customer_id']);
      $this->db->bind(':product', $data['product']);
      $this->db->bind(':amount', $data['amount']);
      $this->db->bind(':currency', $data['currency']);
      $this->db->bind(':status', $data['status']);
      $this->db->bind(':username',$data['username']);
      $this->db->bind(':ownername',$data['ownername']);

      // Execute
      if($this->db->execute()) {
        return true;
      } else {
        return false;
      }
    }
}