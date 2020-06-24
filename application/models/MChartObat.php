<?php 
class MChartObat extends CI_Model{

	//ambil data qty
    function get_data_qty(){
 
        $query = $this->db->query("select sum(a.qty) as total_obat, b.nama_obat from tbl_riwayat_pemberian_obat a left 
        join tbl_obat b on a.kode_barang = b.id GROUP BY b.nama_obat");
        return $query->result();

    }

    //ambil data per status resep
    function get_data_status_resep(){
 
        $query = $this->db->query("select count(A.status_resep) as total, A.status_resep from (select count(status_resep) as total, 
        status_resep, id_data_pemeriksaan from tbl_riwayat_pemberian_obat group by status_resep, id_data_pemeriksaan) A group by A.status_resep");
        return $query->result();

    }

}
?>
	