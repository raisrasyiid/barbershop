<?php

class Madmin extends CI_Model {

    public function cek_login($u, $p){
        $q = $this->db->get_where('tbl_admin', array('Ausername'=>$u, 'Apassword'=>$p));
        return $q;
    }

    public function cek_login_user($u, $p){
        $q = $this->db->get_where('tbl_customer', array('Cnama'=>$u, 'Cpassword'=>$p));
        return $q;
    }

     //get_where
     public function get_where($table, $conditions) {
        $query = $this->db->get_where($table, $conditions);
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_all_data($tabel){
        $q = $this->db->get($tabel);
        return $q;
    }

    public function get_count($tabel){
        return $this->db->count_all($tabel);
    }

    public function get_data_per_page($tabel, $limit, $start){
        $this->db->limit($limit, $start);
        $query = $this->db->get($tabel);
        return $query->result();
    }

    public function insert($tabel, $data){
        $this->db->insert($tabel, $data);
    }

    public function get_by_id($tabel, $id){
        return $this->db->get_where($tabel, $id);
    }

    public function update($tabel, $data, $pk, $id){
        $this->db->where($pk, $id);
        $this->db->update($tabel, $data);
    }

    public function delete($tabel, $id, $val){
        $this->db->delete($tabel, array($id => $val));
    }

    public function get_all_booking_data() {
        $this->db->select('tbl_booking.*, tbl_customer.Cnama as customer_name, tbl_barber.Bbnama as barber_name, tbl_services.Snama as service_name');
        $this->db->from('tbl_booking');
        $this->db->join('tbl_customer', 'tbl_booking.idCustomer = tbl_customer.idCustomer');
        $this->db->join('tbl_barber', 'tbl_booking.idBarber = tbl_barber.idBarber');
        $this->db->join('tbl_services', 'tbl_booking.idServices = tbl_services.idServices');
        $this->db->order_by('Btanggal', 'ASC'); // Order by date
        $query = $this->db->get();
        return $query->result();
    }

    public function get_booking_data_by_month($month) {
        $this->db->select('tbl_booking.*, tbl_customer.Cnama as customer_name, tbl_barber.Bbnama as barber_name, tbl_services.Snama as service_name');
        $this->db->from('tbl_booking');
        $this->db->join('tbl_customer', 'tbl_booking.idCustomer = tbl_customer.idCustomer');
        $this->db->join('tbl_barber', 'tbl_booking.idBarber = tbl_barber.idBarber');
        $this->db->join('tbl_services', 'tbl_booking.idServices = tbl_services.idServices');
        $this->db->where('MONTH(tbl_booking.Btanggal)', $month); // Filter by month
        $this->db->order_by('Btanggal', 'ASC'); // Order by date
        $query = $this->db->get();
        return $query->result();
    }

    public function insert_data_booking($month) {
        $this->db->select('*');
        $this->db->from('tbl_booking');
        $this->db->join('tbl_customer', 'tbl_booking.idCustomer = tbl_customer.idCustomer');
        $this->db->join('tbl_barber', 'tbl_booking.idBarber = tbl_barber.idBarber');
        $this->db->join('tbl_services', 'tbl_booking.idServices = tbl_services.idServices');
        $this->db->insert('tbl.customer, tbl_booking.idCustomer. tbl_services.idServices'); // Filter by month
        $query = $this->db->insert();
        return $query->result();
    }

}
?>