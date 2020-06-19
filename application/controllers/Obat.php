<?php 
class Obat extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('MObat');
    $this->load->helper('url');
    
    if ($this->session->userdata('logged_in')=="") {
			redirect('auth');
		}
		
		$this->session->set_flashdata("halaman", "obat"); //mensetting menuKepilih atau menu aktif
	}
	public function index(){

    $data['data_obat'] = $this->MObat->get_data();
		$this->template->load('template_admin_rs','rs/obat/index',$data);

  }

  public function add_edit($id=''){

    $data['obat'] = "";
    if($id != '') {
        $get_data = $this->MObat->get_data_detail($id);
        $data['obat'] = $get_data;
    } else {
                   
    }
    
    $this->template->load('template_admin_rs','rs/obat/add_edit',$data);

  }

  public function add_edit_save($id=''){

    $name = $this->input->post('nama');
    $kategori = $this->input->post('kategori');
    $satuan = $this->input->post('satuan');
    $harga = $this->input->post('harga');

    $this->form_validation->set_rules('nama', 'Nama', 'required');
    $this->form_validation->set_rules('kategori', 'Kategori', 'required');
    $this->form_validation->set_rules('satuan', 'Satuan', 'required');
    $this->form_validation->set_rules('harga', 'Harga ', 'required|min_length[1]');
      
    if($this->form_validation->run() == FALSE) {
      $data['obat'] = "";
      if($id != '') {
          $get_data = $this->MObat->get_data_detail($id);
          $data['obat'] = $get_data;
      } else {
                    
      }
      
      $this->template->load('template_admin_rs','rs/obat/add_edit',$data);
    } else {
      if($id == '') {
          $data = array(
              'nama_obat'   => $name,
              'harga' => $harga,
              'kategori_obat' => $kategori,
              'satuan_barang' => $satuan
          );
          $add = $this->MObat->add_obat($data);
      } else {
        $data = array(
          'nama_obat'   => $name,
          'harga' => $harga,
          'kategori_obat' => $kategori,
          'satuan_barang' => $satuan
        );
        $edit = $this->MObat->edit_obat($data, $id);
      }

      redirect("obat/index");
    }

  }
  public function delete_data($id=''){
    $this->db->where('id', $id);

    $this->db->delete('tbl_obat');
    
    redirect("obat/index");

  }

}

?>