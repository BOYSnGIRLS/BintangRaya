<?php
class Model_Pengembalian extends CI_Model{

function tampil_semua(){
    $this->db->select('*');
    $this->db->from('pengembalian');
    $this->db->join('sewa', 'sewa.id_sewa=pengembalian.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }

function get_notrans(){
    $this->db->select('RIGHT(pengembalian.id_kembali,3) as kode', FALSE);
    $this->db->order_by('id_kembali','DESC');    
    $this->db->limit(1);    
    $query = $this->db->get('pengembalian');     
    if($query->num_rows() <> 0){      
         $data = $query->row();      
         $kode = intval($data->kode) + 1;    
    }
    else {      
     //jika kode belum ada      
     $kode = 1;    
    }
    $kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);  
    $kodejadi = "KB".$kodemax;  
    return $kodejadi;
  }

  function search($title){
        $this->db->like('id_sewa', $title, 'both');
        $this->db->order_by('id_sewa', 'ASC');
        $this->db->limit(20);
        $this->db->from('sewa');
        $this->db->where('status','Selesai');
        return $this->db->get()->result();
  }
  
function get_sewa1($kode){
    $this->db->select('*');
    $this->db->from('detail_sewa');
    $this->db->join('barang','barang.id_barang=detail_sewa.id');
    $this->db->where('id_sewa', $kode);
    $query = $this->db->get();
    return $query->result();
  }

function get_sewa2($kode){
    $this->db->select('*');
    $this->db->from('detail_sewa');
    $this->db->join('paket_tenda', 'paket_tenda.id_hargatenda=detail_sewa.id');
    $this->db->where('id_sewa', $kode);
    $query = $this->db->get();
    return $query->result();
  }

function get_kembali1($kode){
    $this->db->select('*');
    $this->db->from('detail_kembali_barang');
    $this->db->join('barang','barang.id_barang=detail_kembali_barang.id_barang');
    $this->db->where('id_kembali', $kode);
    $query = $this->db->get();
    return $query->result();
  }


  function get_kembali2($kode){
    $this->db->select('*');
    $this->db->from('detail_kembali_tenda');
    $this->db->join('paket_tenda', 'paket_tenda.id_hargatenda=detail_kembali_tenda.id_tenda');
    $this->db->where('id_kembali', $kode);
    $query = $this->db->get();
    return $query->result();
  }

  function tampil($id){
    $this->db->select('*');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
    $this->db->where('sewa.id_sewa', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function tampilkembali($id){
    $this->db->select('*');
    $this->db->from('pengembalian');
    // $this->db->join('detail_kembali_barang', 'detail_kembali_barang.id_kembali=pengembalian.id_kembali');
    // $this->db->join('detail_kembali_tenda', 'detail_kembali_tenda.id_kembali=pengembalian.id_kembali');
    $this->db->join('sewa', 'sewa.id_sewa=pengembalian.id_sewa');
    $this->db->where('pengembalian.id_kembali', $id);
    $query = $this->db->get();
    return $query->result();

  }

    public function view_by_date($date){
    $this->db->select('*');
    $this->db->from('pengembalian');
    $this->db->join('sewa', 'sewa.id_sewa=pengembalian.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->where('DATE(tgl_bongkar)', $date);
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
        $query = $this->db->get();
        return $query->result();
  }
    
  public function view_by_month($month, $year){

    $this->db->select('*');
    $this->db->from('pengembalian');
    $this->db->join('sewa', 'sewa.id_sewa=pengembalian.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->where('MONTH(tgl_pasang)', $month); // Tambahkan where bulan
    $this->db->where('YEAR(tgl_pasang)', $year); // Tambahkan where tahun
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
        $query = $this->db->get();
        return $query->result();
  }

  public function view_by_year($year){
    
    $this->db->select('*');
    $this->db->from('pengembalian');
    $this->db->join('sewa', 'sewa.id_sewa=pengembalian.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->where('YEAR(tgl_pasang)', $year);
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
        $query = $this->db->get();
        return $query->result();
  }
   
  public function view_all(){
    $this->db->select('*');
    $this->db->from('pengembalian');
    $this->db->join('sewa', 'sewa.id_sewa=pengembalian.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_bongkar) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('sewa'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_pasang)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_pasang)'); // Group berdasarkan tahun pada field tgl
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    function biaya($id){
        $query = $this->db->select('SUM(harga_ganti) as biaya')->from('detail_kembali_barang')->where('id_kembali', $id)->get();
        return $query->row()->biaya;
    }
}
?>
