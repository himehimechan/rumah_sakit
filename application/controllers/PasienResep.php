<?php 
class PasienResep extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('MPemeriksaan');
    $this->load->helper('url');
    $this->load->library('pdf'); 
    
    if ($this->session->userdata('logged_in')=="") {
			redirect('auth');
		}
		
		$this->session->set_flashdata("halaman", "pasienresep"); //mensetting menuKepilih atau menu aktif
	}
	public function index(){

    $data['data_pasien'] = $this->MPemeriksaan->get_data();
		$this->template->load('template_admin_rs','rs/pasien_resep/index',$data);

  }

  public function report($id_pemeriksaan){

    $data['data_pasien'] = $this->MPemeriksaan->get_data_detail($id_pemeriksaan);
    $data_pasien = $this->MPemeriksaan->get_data_detail($id_pemeriksaan);
    $data['data_obat'] = $this->MPemeriksaan->get_data_obat($id_pemeriksaan);
    $data['cek_copy_only'] = $this->MPemeriksaan->cek_copy_only($id_pemeriksaan);
    $mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('rs/pasien_resep/report', $data, TRUE);
    $mpdf->WriteHTML($data);
    $mpdf->SetTitle('Laporan Resep Obat Pasien');
    $output = 'Laporan Resep Obat Pasien'.$data_pasien[0]['nama_pasien'].'.pdf';
		$mpdf->Output("$output", 'I');
  }

  public function detil_pasien($id_pemeriksaan){
    $data['data_pasien'] = $this->MPemeriksaan->get_data_detail($id_pemeriksaan);
    $data['data_obat'] = $this->MPemeriksaan->get_data_obat($id_pemeriksaan);
    $data['cek_copy_only'] = $this->MPemeriksaan->cek_copy_only($id_pemeriksaan);

    $this->template->load('template_admin_rs','rs/pasien_resep/add_edit',$data);
  }

  public function update_status_resep($id_pemeriksaan) {
    $status = $this->input->get("status");
    $this->MPemeriksaan->edit_status_resep($id_pemeriksaan, $status);
    redirect("PasienResep/detil_pasien/".$id_pemeriksaan);
  }

  public function delete_obat($id, $id_pemeriksaan) {
    $this->db->where('id', $id);

    $this->db->delete('tbl_riwayat_pemberian_obat');
    
    redirect("pasienresep/detil_pasien/".$id_pemeriksaan);
  } 

  public function getobat(){
    $search = $this->input->get("search");
    $data_obat = $this->MPemeriksaan->cari_data_obat($search);
    $data['data_obat'] = $data_obat;
    $this->load->view('rs/pasien_resep/data_obat', $data);
  }

  public function add_obat($id_pemeriksaan){
    $id_pemberian_obat = $this->input->post("id_pemberian_obat");
    if($id_pemberian_obat == '') {
      $data_insert = array(
        "id_data_pemeriksaan" => $id_pemeriksaan,
        "kode_barang"         => $this->input->post("id_obat"),
        "qty"                 => $this->input->post("qty"),
        "status"              => $this->input->post("status"),
        "tanggal"             => date("Y-m-d H:i:s")
      );
      $this->MPemeriksaan->tambah_obat($data_insert, $id_pemeriksaan);
    } else {
      $data = array(
        "id_data_pemeriksaan" => $id_pemeriksaan,
        "kode_barang"         => $this->input->post("id_obat"),
        "qty"                 => $this->input->post("qty"),
        "status"              => $this->input->post("status")
      );
      $this->MPemeriksaan->edit_obat($data, $id_pemberian_obat, $id_pemeriksaan);
    }
    redirect("PasienResep/detil_pasien/".$id_pemeriksaan);
  }

}

?>