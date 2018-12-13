<?php
class Model_Laporan extends CI_Model{

public function view_by_date($date){

		$this->db->select('*');
 		$this->db->from('sewa');
 		$this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->group_by('sewa.id_sewa');
 		$this->db->where('DATE(tgl_pasang)', $date);
    $this->db->order_by('sewa.tgl_pasang', 'DESC');
 		$query = $this->db->get();
		return $query->result();
  }
    
  public function view_by_month($month, $year){
    $this->db->select('*');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->group_by('sewa.id_sewa');
 		$this->db->where('MONTH(tgl_pasang)', $month); // Tambahkan where bulan
    $this->db->where('YEAR(tgl_pasang)', $year); // Tambahkan where tahun
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
 		$query = $this->db->get();
		return $query->result();
  }

  public function view_by_year($year){
    $this->db->select('*');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->group_by('sewa.id_sewa');
 		$this->db->where('YEAR(tgl_pasang)', $year);
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
 		$query = $this->db->get();
		return $query->result();
  }
   
  public function view_all(){
    $this->db->select('*');
    $this->db->from('sewa');
    $this->db->join('detail_sewa','sewa.id_sewa=detail_sewa.id_sewa');
    $this->db->group_by('sewa.id_sewa');
    $this->db->order_by('sewa.tgl_bongkar', 'DESC');
    $query = $this->db->get();
    return $query->result();
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_pasang) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('sewa'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_pasang)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_pasang)'); // Group berdasarkan tahun pada field tgl
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    function surat_jalan($id){
    $query = $this->db->query("SELECT * FROM sewa JOIN detail_sewa  WHERE sewa.id_sewa=detail_sewa.id_sewa AND sewa.id_sewa='$id' ");
    return $query->result();
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

  function nota_tagihan($id){
    $query = $this->db->query("SELECT * FROM sewa JOIN detail_sewa  WHERE sewa.id_sewa=detail_sewa.id_sewa AND sewa.id_sewa='$id' ");
    return $query->result();
    }


    function update_status($data = array(),$id){
        $this->db->where('id_sewa',$id);
        return $this->db->update('sewa',$data);
        
    }

    function get_edit_transaksi($id){
        $query = $this->db->query("SELECT * FROM  sewa JOIN detail_sewa WHERE sewa.id_sewa=detail_sewa.id_sewa AND sewa.id_sewa='$id' ");
        return $query->result_array();
    }

     function update_transaksi($data = array(),$id){
        $this->db->where('id_sewa',$id);
        return $this->db->update('sewa',$data);
    }

    function search1($title){
        $this->db->like('nama_barang', $title , 'both');
        $this->db->order_by('nama_barang', 'ASC');
        $this->db->limit(10);
        return $this->db->get('barang')->result();
        return $this->db->get()->result();       
    }

  function search2($title){
        $this->db->like('jenis_tenda', $title, 'both');
        $this->db->order_by('jenis_tenda', 'ASC');
        $this->db->limit(20);
        $this->db->from('paket_tenda');
        $this->db->join('tenda', 'tenda.id_tenda=paket_tenda.id_tenda');
        return $this->db->get()->result();
  }

}
?>