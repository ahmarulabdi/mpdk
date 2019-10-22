<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function index()     
	{ 
	
		$q = $this->db->query(" SELECT wilayah.id_wilayah,wilayah.note, wilayah.flag,
								wilayah.nama_wilayah,count(peserta.id_wilayah) as jumlah
								FROM peserta, wilayah
								where peserta.id_wilayah = wilayah.id_wilayah
								group by peserta.id_wilayah order by id_wilayah asc");
		foreach($q->result() as $row)
		{	
			$data['id_wilayah'][] = $row->id_wilayah;
			$data['nama_wilayah'][] = $row->nama_wilayah;
			$data['note'][] = $row->note;
			$data['flag'][] = $row->flag;
			$data['jumlah'][] = $row->jumlah;
		}
		$data['jlh'] = $q->num_rows();
		// mendeteksi browser menggunakan PC atau Mobile
		if($this->agent->is_mobile()==true){
			$this->load->view('header');		
			$this->load->view('client_home',$data);
			$this->load->view('footer');
		}else{
			$this->load->view('header_desk');
			$this->load->view('client_menu',$data);
			$this->load->view('client_home_desk');
			$this->load->view('footer_desk');
			//echo "tidak bisa dibuka";
		}
	}
	
	function distance($lat1, $lon1, $lat2, $lon2, $unit) {
		$theta = $lon1 - $lon2;
	  	$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  		$dist = acos($dist);
  		$dist = rad2deg($dist);
  		$miles = $dist * 60 * 1.1515;
  		$unit = strtoupper($unit);

  		if ($unit == "K") {
			return ($miles * 1.609344);
  		} else if ($unit == "N") {
		    return ($miles * 0.8684);
    	} else {
        	return $miles;
      	}
	}
	
	function det($id)
	{
		$q = $this->db->query("select * 
		from peserta where id_wilayah = '$id'
                group by nama_peserta asc");
		foreach($q->result() as $row)
		{	
			$data['id_peserta'][] = $row->id_peserta;
			$data['nama_peserta'][] = $row->nama_peserta;
			$data['alamat'][] = $row->alamat;
			$data['nope'][] = $row->nope;
			$data['email'][] = $row->email;									
			$data['lat'][] = $row->lat;			
			$data['lng'][] = $row->lng;	
			$data['photo'][] = $row->photo;						
		}
		$data['jlh'] = $q->num_rows();
		// mendeteksi browser menggunakan PC atau Mobile
		if($this->agent->is_mobile()==true){
		$this->load->view('header');
		$this->load->view('client_det',$data);		
		$this->load->view('footer');
		}else {
		$this->load->view('header_desk_det');
		$this->load->view('client_menu_det',$data);
		$this->load->view('client_home_desk');
		$this->load->view('footer_desk');	
		}
	}
	
	
	function lokasidet($id)
	{
		$q = $this->db->query("select * 
		from peserta where id_peserta= '$id'");
		foreach($q->result() as $row)
		{	
			$data['id_peserta'][] = $row->id_peserta;
			$data['nama_peserta'][] = $row->nama_peserta;
			$data['alamat'][] = $row->alamat;
			$data['nope'][] = $row->nope;
			$data['email'][] = $row->email;									
			$data['lat'][] = $row->lat;			
			$data['lng'][] = $row->lng;	
			$data['photo'][] = $row->photo;	
			$data['ket'][] = $row->ket;	
		}
		$data['jlh'] = $q->num_rows();
		// mendeteksi browser menggunakan PC atau Mobile
		if($this->agent->is_mobile()==true){
		$this->load->view('header');
		$this->load->view('client_detail',$data);		
		$this->load->view('footer');
		}else {
		$this->load->view('header_desk_detail');
		$this->load->view('client_menu_detail',$data);
		$this->load->view('client_home_desk');
		$this->load->view('footer_desk');	
		}
	}
	
	function lokasidetmob($id)
	{
		$q = $this->db->query("select * 
		from peserta where id_peserta = '$id'");
		foreach($q->result() as $row)
		{	
			$data['id_peserta'][] = $row->id_peserta;
			$data['nama_peserta'][] = $row->nama_peserta;
			$data['alamat'][] = $row->alamat;
			$data['nope'][] = $row->nope;
			$data['email'][] = $row->email;									
			$data['lat'][] = $row->lat;			
			$data['lng'][] = $row->lng;	
			$data['photo'][] = $row->photo;	
			$data['ket'][] = $row->ket;	
		}
		$data['jlh'] = $q->num_rows();
		$this->load->view('header_mobile_detail');
		$this->load->view('client_map_detail',$data);		
	}
}
