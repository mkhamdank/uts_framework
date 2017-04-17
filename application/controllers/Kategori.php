<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function index()
	{
		$this->load->library('datatables');
		$this->load->model('barang_model');
		$data["kategori_list"] = $this->barang_model->getKategori();
		$this->load->view('kategori',$data);		
	}

	public function create()
	{
		$this->load->helper('url','form');	
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required|alpha');
		$this->load->model('barang_model');	
		if($this->form_validation->run()==FALSE){
			$this->load->view('tambah_kategori_view');
		}else{
			$this->barang_model->insertKategori();
			$this->load->view('tambah_kategori_sukses');
		}
	}

	public function update($id)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');

		$this->load->model('barang_model');
		$data['kategori'] = $this->barang_model->getKategoriById($id);

		if ($this->form_validation->run()==FALSE) {
			$this->load->view('edit_kategori_view',$data);
		}else{
			$this->barang_model->updateKategori($id);
			$this->load->view('edit_kategori_sukses');
		}
	}

	public function delete($id)
	{
		$this->load->model('barang_model');
		$this->barang_model->hapusKategori($id);
		$this->load->view('hapus_kategori_sukses');
	}



}

/* End of file Kategori.php */
/* Location: ./application/controllers/Kategori.php */