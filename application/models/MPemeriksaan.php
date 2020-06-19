<?php 
class MPemeriksaan extends CI_Model{

	//ambil data
    function get_data(){
 
        $query = $this->db->query("select a.*, b.diagnosis from tbl_pemeriksaan_pasien a left join tbl_master_diagnosa b on a.kode_diagnosa = b.kode_diagnosa");
        return $query->result_array();

    }

    //ambil data param
    function get_data_detail($id){
 
        $query = $this->db->query("select a.*, b.diagnosis, IF(c.jenis_kelamin = 'l', 'Laki-laki', 'Perempuan') as jenis_kelamin,
        c.alamat, c.no_tlp
        from tbl_pemeriksaan_pasien a left join tbl_master_diagnosa b on a.kode_diagnosa = b.kode_diagnosa
        left join tbl_pasien c on a.no_rekam_medis = c.no_rekam_medis where a.id_data_pemeriksaan = '$id'");
        return $query->result_array();

    }

    function get_data_obat($id){
 
        $query = $this->db->query("select a.*, b.nama_obat, b.harga from tbl_riwayat_pemberian_obat a left join tbl_obat b on a.kode_barang = b.id
        where a.id_data_pemeriksaan = '$id'");
        return $query->result_array();

    }

    function cari_data_obat($key) {
        $query = $this->db->query("select * from tbl_obat where nama_obat like '%$key%'");
        return $query->result_array();
    }

    function tambah_obat($data, $id_pemeriksaan){
        $this->db->insert("tbl_riwayat_pemberian_obat", $data);
    }

    function edit_obat($data, $id, $id_pemeriksaan){
        $this->db->where("id", $id);
        $this->db->update("tbl_riwayat_pemberian_obat", $data);
    }

    function edit_status_resep($id_pemeriksaan, $status) {
        $data = array(
            "status_resep"=>$status
        );
        $this->db->where("id_data_pemeriksaan", $id_pemeriksaan);
        $this->db->update("tbl_riwayat_pemberian_obat", $data);
    }

    function cek_copy_only($id_pemeriksaan) {
        $cek = $this->db->query("select * from tbl_riwayat_pemberian_obat where id_data_pemeriksaan = '$id_pemeriksaan' and status_resep = 'copy only'");
        return $cek->result_array();
    }

}
?>
	