<?php 
class ChartObat extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('MChartObat');
    $this->load->helper('url');
    
    if ($this->session->userdata('logged_in')=="") {
			redirect('auth');
		}
		
		$this->session->set_flashdata("halaman", "chartobat"); //mensetting menuKepilih atau menu aktif
	}
	public function index(){

    $data['data_obat_qty'] = $this->MChartObat->get_data_qty();
    $data['data_per_status_resep'] = $this->MChartObat->get_data_status_resep();
		$this->template->load('template_admin_rs','rs/chart_obat/index',$data);

  }

}

?>