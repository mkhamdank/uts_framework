<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function getKategori()
	{
		$this->db->select('id,nama');
		$query = $this->db->get('kategori');
		return $query->result();
	}

	public function getKategoriById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('kategori');
		return $query->result();
	}

	public function getBarangById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('barang');
		return $query->result();
	}

	public function getBarang($id)
	{
		
		$this->db->select("barang.id as idBarang, barang.nama as namaBarang,kategori.nama as namaKategori,kode, DATE_FORMAT(tanggal_beli,'%d-%m-%Y') as tanggal_beli,foto,fk_kategori");
		$this->db->where('fk_kategori', $id);	
		$this->db->join('kategori', 'kategori.id = barang.fk_kategori', 'left');	
		$query = $this->db->get('barang');
		return $query->result();
	}

	public function insertKategori()
	{
		$object = array(
			'id' => $this->input->post('id'), 
			'nama' => $this->input->post('nama') 
			);
		$this->db->insert('kategori', $object);
	}

	public function insertBarang($idKategori)
	{
		$object = array('nama' => $this->input->post('nama'),
						'kode' => $this->input->post('kode'),
						'tanggal_beli' => $this->input->post('tanggal_beli'),
						'foto' => $this->upload->data('file_name'),
						'fk_kategori' => $idKategori );
		$this->db->insert('barang', $object);
	}

	public function updateKategori($id)
	{
		$data = array('nama' => $this->input->post('nama'));
		$this->db->where('id', $id);
		$this->db->update('kategori', $data);
	}

	public function updateBarang($id)
	{
		$object = array('nama' => $this->input->post('nama'),
						'tanggal_beli' => $this->input->post('tanggal_beli'),
						'foto' => $this->upload->data('file_name'));
		$this->db->where('id', $id);
		$this->db->update('barang', $object);
	}

	public function hapusKategori($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kategori');
	}

	public function hapusBarang($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('barang');
	}
}

/* End of file Barang_Model.php */
/* Location: ./application/models/Barang_Model.php */