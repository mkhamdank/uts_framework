<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {


	public function index($id)
	{
		$this->load->library('datatables');
		$this->load->model('barang_model');
		$data["barang_list"] = $this->barang_model->getBarang($id);
		$this->load->view('barang', $data);
	}

	public function create($idKategori)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Kategori', 'trim|required');
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required|is_unique[barang.kode]');
		$this->form_validation->set_rules('tanggal_beli', 'Tanggal Beli', 'trim|required');
		$this->load->model('barang_model');
		if ($this->form_validation->run()==FALSE) {
			$this->load->view('tambah_barang_view');
		}else{
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 250;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('userfile')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('tambah_barang_view', $error);
			}
			else{
				$this->barang_model->insertBarang($idKategori);
				$this->load->view('tambah_barang_sukses');
			}
		}
	}

	public function update($id)
	{
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama Kategori', 'trim|required');
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
		$this->form_validation->set_rules('tanggal_beli', 'Tanggal Beli', 'trim|required');
		$this->load->model('barang_model');
		$data['barang'] = $this->barang_model->getBarangById($id);


		if ($this->form_validation->run()==FALSE) {
			$this->load->view('edit_barang_view',$data);
		}
		else
		{
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size'] = 250;
			$config['max_width'] = 1024;
			$config['max_height'] = 768;
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('userfile')){
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('edit_barang_view', $error);
			}
			else{
				$image_data = $this->upload->data();

				$configer = array (
					'image_library' => 'gd2',
					'source_image' => $image_data['full_path'],
					'maintain_ratio' => TRUE,
					'width' => 1024,
					'height' => 768,
					);

				$this->load->library('image_lib', $config);
				$this->image_lib->clear();
				$this->image_lib->initialize($configer);
				$this->image_lib->resize();

			$this->barang_model->updateBarang($id);
			$this->load->view('edit_barang_sukses');
		}
	}
}

	public function delete($id,$foto)
	{
		$path_to_file = './assets/uploads/'.$foto;
		unlink($path_to_file);
		$this->load->model('barang_model');
		$this->barang_model->hapusBarang($id);
		$this->load->view('hapus_barang_sukses');
	}

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */