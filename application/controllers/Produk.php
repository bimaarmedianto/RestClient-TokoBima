<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	public function __construct(){
		parent:: __construct();
		$this->load->model('Produk_model');
    // $this->load->library('form_validation');
	}
	
	public function index(){
		$data['allProduk'] = $this->Produk_model->getAllProduk();
		$this->load->view('produk_view', $data);
	}

	public function hapus($id){
		$this->Produk_model->deleteProduk($id);
		redirect('produk');
	}

	public function edit($id, $nama, $harga, $stok, $img){
		$this->Produk_model->editProduk($id, $nama, $harga, $stok, $img);
		redirect('produk');
	}
	
	public function tambah($nama, $harga, $stok, $img){
		$this->Produk_model->tambahProduk($nama, $harga, $stok, $img);
		redirect('produk');
	}
}
