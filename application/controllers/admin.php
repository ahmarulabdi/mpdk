<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	//load grocery crud
	function __construct()
	{ 
		parent::__construct();
		
		/* Standard Libraries */
		$this->load->database();
		$this->load->helper('url');
		/* ------------------ */	
		
		$this->load->library('grocery_CRUD');	
	}
	
	function index()
	{
		//$this->load->view('header_admin');
		$this->load->view('login');
		//$this->load->view('footer_admin');
	}
	
	function home()
	{
		$this->load->view('header_admin');
		$this->load->view('menu_admin');		
		$this->load->view('wall_admin_home');
		$this->load->view('footer_admin');
		
	}
	
	//load output CRUD Barang
	function _admin_output_kategori($output = null)
	{		
		$this->load->view('wall_admin_kategori',$output);			
	}
	
	//load CRUD data Barang
	function kategori()
	{
		$this->load->view('header_admin');
		$this->load->view('menu_admin'); // Load menu_pegawai.php
		try{
			$crud = new grocery_CRUD(); // load Object Grocery CRUD
			$crud->set_theme('flexigrid'); // Set Theme Flexigrid atau Datatables
			$crud->set_table('wilayah'); // Table yang akan dioperasikan
			$crud->set_subject('wilayah'); // Tentukan Nama Subject / optional
			//$crud->unset_add();
			//$crud->unset_edit();
			//$crud->unset_delete();
			//$crud->unset_export();
			//$crud->unset_print();
			//Kolom pada database yang tidak boleh kosong
			$crud->required_fields('nama_wilayah','note'); 
			$crud->columns('nama_wilayah','note','flag'); // Kolom yang di tampilkan			
			$crud->set_field_upload('flag','assets/uploads/files');
			$output = $crud->render(); // Render Generate Tampilan			
			$this->_admin_output_kategori($output);	// output di arah kan pada 	_user_admin_output	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}		
		$this->load->view('footer_admin'); // load footer.php
		
	}
	
	
	//load output CRUD Barang
	function _admin_output_lokasi($output = null)
	{		
		$this->load->view('wall_admin_lokasi',$output);			
	}
	
	//load CRUD data Barang
	function lokasi()
	{
		$this->load->view('header_admin');
		$this->load->view('menu_admin'); // Load menu_pegawai.php
		try{
			$crud = new grocery_CRUD(); // load Object Grocery CRUD
			$crud->set_theme('flexigrid'); // Set Theme Flexigrid atau Datatables
			$crud->set_table('peserta'); // Table yang akan dioperasikan
			$crud->set_subject('peserta'); // Tentukan Nama Subject / optional
			//$crud->unset_add();
			//$crud->unset_edit();
			//$crud->unset_delete();
			//$crud->unset_export();
			//$crud->unset_print();
			//Kolom pada database yang tidak boleh kosong
			$crud->required_fields('nama_peserta','alamat','nope','lat','lng','id_wilayah'); 
			$crud->columns('id_wilayah','photo','nama_peserta','alamat','nope','lat','lng'); // Kolom yang di tampilkan			
			$crud->set_relation('id_wilayah','wilayah','nama_wilayah');
			$crud->set_field_upload('photo','assets/uploads/files');
			$output = $crud->render(); // Render Generate Tampilan			
			$this->_admin_output_lokasi($output);	// output di arah kan pada 	_user_admin_output	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}		
		$this->load->view('footer_admin'); // load footer.php
		
	}
	
	function _admin_output_desa_kel_binaan($output = null)
	{		
		$this->load->view('wall_admin_desa_kel_binaan',$output);			
	}
	//load CRUD data desa kelurahan binaan
	function desa_kel_binaan()
	{
		$this->load->view('header_admin');
		$this->load->view('menu_admin'); // Load menu_pegawai.php
		try{
			$crud = new grocery_CRUD(); // load Object Grocery CRUD
			$crud->set_theme('flexigrid'); // Set Theme Flexigrid atau Datatables
			$crud->set_table('desa_kel_binaan'); // Table yang akan dioperasikan
			$crud->set_subject('desa_kel_binaan'); // Tentukan Nama Subject / optional
			//$crud->unset_add();
			//$crud->unset_edit();
			//$crud->unset_delete();
			//$crud->unset_export();
			//$crud->unset_print();
			//Kolom pada database yang tidak boleh kosong
			$crud->required_fields('nama_desa_kel','alamat','nope','lat','lng','id_wilayah'); 
			$crud->columns('id_wilayah','photo','nama_desa_kel','alamat','nope','lat','lng'); // Kolom yang di tampilkan			
			$crud->set_relation('id_wilayah','wilayah','nama_wilayah');
			$crud->set_field_upload('photo','assets/uploads/files');
			$output = $crud->render(); // Render Generate Tampilan			
			$this->_admin_output_desa_kel_binaan($output);	// output di arah kan pada 	_user_admin_output	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}		
		$this->load->view('footer_admin'); // load footer.php
		
	}
	
	function _admin_output_mustahik($output = null)
	{		
		$this->load->view('wall_admin_mustahik',$output);			
	}
	
	//load CRUD data mustahik
	function mustahik()
	{
		$this->load->view('header_admin');
		$this->load->view('menu_admin'); // Load menu_pegawai.php
		try{
			$crud = new grocery_CRUD(); // load Object Grocery CRUD
			$crud->set_theme('flexigrid'); // Set Theme Flexigrid atau Datatables
			$crud->set_table('mustahik'); // Table yang akan dioperasikan
			$crud->set_subject('mustahik'); // Tentukan Nama Subject / optional
			//$crud->unset_add();
			//$crud->unset_edit();
			//$crud->unset_delete();
			//$crud->unset_export();
			//$crud->unset_print();
			//Kolom pada database yang tidak boleh kosong
			$crud->required_fields('nama_mustahik','alamat','nope','lat','lng','id_wilayah'); 
			$crud->columns('id_wilayah','photo','nama_mustahik','alamat','nope','lat','lng'); // Kolom yang di tampilkan			
			$crud->set_relation('id_wilayah','wilayah','nama_wilayah');
			$crud->set_field_upload('photo','assets/uploads/files');
			$output = $crud->render(); // Render Generate Tampilan			
			$this->_admin_output_mustahik($output);	// output di arah kan pada 	_user_admin_output	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}		
		$this->load->view('footer_admin'); // load footer.php
		
	}
	
	
	
	//load output CRUD Barang
	function _admin_output_user($output = null)
	{		
		$this->load->view('wall_admin_user',$output);			
	}
	
	//load CRUD data Barang
	function user()
	{
		$this->load->view('header_admin');
		$this->load->view('menu_admin'); // Load menu_pegawai.php
		try{
			$crud = new grocery_CRUD(); // load Object Grocery CRUD
			$crud->set_theme('flexigrid'); // Set Theme Flexigrid atau Datatables
			$crud->set_table('user'); // Table yang akan dioperasikan
			$crud->set_subject('Pengguna'); // Tentukan Nama Subject / optional
			//$crud->unset_add();
			//$crud->unset_edit();
			//$crud->unset_delete();
			//$crud->unset_export();
			//$crud->unset_print();
			//Kolom pada database yang tidak boleh kosong
			$crud->required_fields('username','password','level'); 
			$crud->columns('username','password','level'); // Kolom yang di tampilkan			
			//$crud->set_field_upload('photo','assets/uploads/files');
			$output = $crud->render(); // Render Generate Tampilan			
			$this->_admin_output_user($output);	// output di arah kan pada 	_user_admin_output	
		}catch(Exception $e){
			show_error($e->getMessage().' --- '.$e->getTraceAsString());
		}		
		$this->load->view('footer_admin'); // load footer.php
		
	}
	
}
