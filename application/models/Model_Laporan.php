<?php
class Model_Laporan extends CI_Model{

public function view_by_date($date){
     //    $this->db->where('DATE(tgl_transaksi)', $date); // Tambahkan where tanggal nya 
	    // return $this->db->get('tabel_transaksi_sip')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter

		$this->db->select('*');
		// $this->db->select_sum('jumlah');
 		$this->db->from('sewa');
 		$this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->join('pelanggan', 'sewa.id_sewa=pelanggan.id_sewa');
    $this->db->group_by('sewa.id_sewa');
 		$this->db->where('DATE(tgl_pasang)', $date);
 		$query = $this->db->get();
		return $query->result();
    

  }
    
  public function view_by_month($month, $year){
    $this->db->select('*');
    // $this->db->select_sum('jumlah');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->join('pelanggan', 'sewa.id_sewa=pelanggan.id_sewa');
    $this->db->group_by('sewa.id_sewa');
 		$this->db->where('MONTH(tgl_pasang)', $month); // Tambahkan where bulan
    $this->db->where('YEAR(tgl_pasang)', $year); // Tambahkan where tahun
 		$query = $this->db->get();
		return $query->result();
  }

  public function view_by_year($year){
    $this->db->select('*');
    // $this->db->select_sum('jumlah');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->join('pelanggan', 'sewa.id_sewa=pelanggan.id_sewa');
    $this->db->group_by('sewa.id_sewa');
 		$this->db->where('YEAR(tgl_pasang)', $year);
 		$query = $this->db->get();
		return $query->result();
  }
   
  public function view_all(){
    $this->db->select('*');
    // $this->db->select_sum('jumlah');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->join('pelanggan', 'sewa.id_sewa=pelanggan.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $query = $this->db->get();
    //$query = $this->db->query('SELECT * FROM tabel_transaksi_sip');
    return $query->result();
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_pasang) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('sewa'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_pasang)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_pasang)'); // Group berdasarkan tahun pada field tgl
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

  }
?>