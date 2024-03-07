<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class program_model extends CI_Model 
{
	public function deletePlanning($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('planning');
	}

	public function planApproved($id = NULL)
	{
		// $bulan = date('m');
		// $tahun = date('Y');
		// $query= $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND mandatori = 0 AND approvel = 1 
		// AND id_unit = 5 ORDER BY tanggal ASC");
		// return $query->result_array();

		return $this->db->get_where('planning', ['id_unit'=>$id, 'approvel'=>1])->result_array();
	}

	public function planPending($id = NULL)
	{
		return $this->db->get_where('planning', ['id_unit'=>$id,'approvel'=>0])->result_array();
	}
	public function detail_kegiatan($id = NULL)
	{
		return $this->db->get_where('pelaksanaan', ['id' => $id])->row_array();
	}

	public function mandatori()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if (!$bulan) {
			$bulan = date('m');
			}

		if (!$tahun) {
			$tahun = date('Y');
			}

		$query = $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND mandatori = 1 ORDER BY tanggal ASC");
		return $query->result_array();
	
		
		/*return $this->db->get_where('planning', ['mandatori'=>1])->result_array();*/
	}

	public function kegiatan_terlaksana($id = NULL)
	{

		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if (!$bulan) {
			$bulan = date('m');
			}

		if (!$tahun) {
			$tahun = date('Y');
			}
		$query = $this->db->query("SELECT * FROM pelaksanaan WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND id_unit = $id ORDER BY tanggal ASC");
		return $query->result_array();
	}

	public function terlaksana($id = NULL)
	{
		$this->db->where('id', $id);
		$this->db->update('planning', ['terlaksana' =>1]);
	}

	public function getTahunPlanning()
	{
		$query = $this->db->query("SELECT 	YEAR(tanggal) AS tahun FROM planning GROUP BY YEAR(tanggal) ORDER BY YEAR(tanggal) ASC");

		return $query->result_array();
	}

	public function getBulanPlanning()
	{
		$query = $this->db->query("SELECT 	MONTH(tanggal) AS bulan FROM planning GROUP BY MONTH(tanggal) ORDER BY MONTH(tanggal) ASC");
		// $check=$query->result_array();
		return $query->result_array();
	}

	public function getdataByBulan()
	{
		$query = $this->db->query("SELECT * FROM planning WHERE MONTH(tanggal) = bulan ORDER BY tanggal ASC");
	}

	public function editPlan()
	{
		$data = [
			'kegiatan' => $this->input->post('kegiatan'),
			'deskripsi' => $this->input->post('deskripsi')
		];

	 	$id = $this->input->post('id');
	 	

	 	$this->db->where('id', $id);
	 	$this->db->update('planning', $data);
	}

	public function jumlahApprove($id)
	{
		// print_r($_POST);exit();

		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if (!$bulan) {
			$bulan = date('m');
			}

		if (!$tahun) {
			$tahun = date('Y');
			}

		if ($id) {
			$filter="AND id_unit = $id";
		}

				$query = $this->db->query("SELECT (select count(*) FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND approvel=1 $filter) as approved, (select count(*) FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun AND approvel=0 $filter) as notApproved FROM planning WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun $filter limit 1");

				return $query->row_array();
			}

	
	public function nilai($id)
	{

		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		if (!$bulan) {
			$bulan = date('m');
			}

		if (!$tahun) {
			$tahun = date('Y');
			}

			if ($id) {
				$filter="AND id_unit = $id";
			}

		$query1 = $this->db->query("SELECT (SELECT COUNT(kegiatan_budaya) FROM pelaksanaan WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun $filter) AS kegiatan")->row_array();
		$kegiatan = $query1['kegiatan'];
		
	
		$query = $this->db->query("
			SELECT ROUND((SELECT SUM(poin)/$kegiatan FROM pelaksanaan WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun $filter),2) AS tPoin,
			ROUND((SELECT SUM(q1)/$kegiatan FROM pelaksanaan WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun $filter),2) AS tQ1,
			ROUND((SELECT SUM(q2)/$kegiatan FROM pelaksanaan WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun $filter),2) AS tQ2,
			ROUND((SELECT SUM(q3)/$kegiatan FROM pelaksanaan WHERE MONTH(tanggal) = $bulan AND YEAR(tanggal) = $tahun $filter),2) AS tQ3,
			ROUND((SELECT SUM(tpoin + tQ1 + tQ2 + tQ3)),2) AS total
			");
			// print_r($query);exit();
		return $query->row_array();
	}

	public function nilaiGrafik($id_unit, $tahun)
	{
		
		$bln=12;

		for($pr=1;$pr<=$bln;$pr++){

			$query1 = $this->db->query("SELECT (SELECT COUNT(kegiatan_budaya ) FROM pelaksanaan WHERE MONTH(tanggal) = $pr AND YEAR(tanggal) = $tahun AND id_unit='$id_unit') AS kegiatan")->row_array();
			$kegiatan = $query1['kegiatan'];
			

			//poin
			$qrGetbyPoin=$this->db->query("SELECT ROUND ((SELECT if(AVG(poin)is NULL ,0,AVG(poin))as poin FROM pelaksanaan WHERE id_unit='$id_unit' and month(tanggal)=$pr and year(tanggal)=$tahun),0) as poin")->result_array();
			if($qrGetbyPoin==NULL){
				$dataPoin[]=0;
			}else{
				$dataPoin[]=$qrGetbyPoin[0]['poin'];
			}
			
			//
			$qrGetbyQ1=$this->db->query("SELECT ROUND ((SELECT if(AVG(q1)is NULL ,0,AVG(q1))as q1 FROM pelaksanaan WHERE id_unit='$id_unit' and month(tanggal)=$pr and year(tanggal)=$tahun),0) as q1")->result_array();
			if($qrGetbyQ1==NULL){
				$dataq1[]=0;
			}else{
				$dataq1[]=$qrGetbyQ1[0]['q1'];
			}

			$qrGetbyQ2=$this->db->query("SELECT ROUND ((SELECT if(AVG(q2)is NULL ,0,AVG(q2))as q2 FROM pelaksanaan WHERE id_unit='$id_unit' and month(tanggal)=$pr and year(tanggal)=$tahun),0) as q2")->result_array();
			if($qrGetbyQ2==NULL){
				$dataq2[]=0;
			}else{
				$dataq2[]=$qrGetbyQ2[0]['q2'];
			}

			$qrGetbyQ3=$this->db->query("SELECT ROUND ((SELECT if(AVG(q3)is NULL ,0,AVG(q3))as q3 FROM pelaksanaan WHERE id_unit='$id_unit' and month(tanggal)=$pr and year(tanggal)=$tahun),0) as q3")->result_array();
			if($qrGetbyQ3==NULL){
				$dataq3[]=0;
			}else{
				$dataq3[]=$qrGetbyQ3[0]['q3'];
			}
			// print_r($dataq1);exit();

			$dataTotal[] = $dataPoin[0]+$dataq1[0]+$dataq2[0]+$dataq3[0];
			// print_r($dataTotal);exit();
			
		}

		// $sendData="{name :'Total',data :[".implode(",",$dataTotal)."]},
		// 			{name :'Pelaksanaan',data :[".implode(",",$dataPoin)."]},
		// 			{name :'Keterlibatan Pemimpin',data :[".implode(",",$dataq1)."]},
		// 			{name :'Kerjasama Tim',data :[".implode(",",$dataq2)."]},
		// 			{name :'Keterlibatan Karyawan 80%',data :[".implode(",",$dataq3)."]}
		// 			";

		
		// $sendData[]="[".implode(",",$dataTotal)."],
		// 			[".implode(",",$dataPoin)."],
		// 			[".implode(",",$dataq1)."],
		// 			[".implode(",",$dataq2)."],
		// 			[".implode(",",$dataq3)."]
		// 			";
		$sendData=[	"total"=>"[".implode(',',$dataTotal)."];",
					"kegiatan"=>"[".implode(',',$dataPoin)."];",
					"valueq1"=>"[".implode(',',$dataq1)."];",
					"valueq2"=>"[".implode(',',$dataq2)."];",
					"valueq3"=>"[".implode(',',$dataq3)."];",

		];
					// print_r($sendData);exit();
		return $sendData;

		
	}
}