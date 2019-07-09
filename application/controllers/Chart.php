<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chart extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$jsonData='[{"nama":"I\/a","jumlah":"4"},{"nama":"I\/b","jumlah":"11"},{"nama":"I\/c","jumlah":"52"},{"nama":"I\/d","jumlah":"21"},{"nama":"II\/a","jumlah":"187"},{"nama":"II\/b","jumlah":"83"},{"nama":"II\/c","jumlah":"391"},{"nama":"II\/d","jumlah":"228"},{"nama":"III\/a","jumlah":"442"},{"nama":"III\/b","jumlah":"946"},{"nama":"III\/c","jumlah":"476"},{"nama":"III\/d","jumlah":"589"},{"nama":"IV\/a","jumlah":"1432"},{"nama":"IV\/b","jumlah":"118"},{"nama":"IV\/c","jumlah":"41"},{"nama":"IV\/d","jumlah":"5"},{"nama":"IV\/e","jumlah":"3"}]';

		$jsonData2='[{"tahun":"2010","val":0},{"tahun":"2011","val":0},{"tahun":"2012","val":0},{"tahun":"2013","val":0},{"tahun":"2014","val":0},{"tahun":"2015","val":0},{"tahun":"2016","val":"52943.00"},{"tahun":"2017","val":"54760.00"},{"tahun":"2018","val":0}]';

		$jumlahPangkat=json_decode($jsonData);
		$grafik_data=[];
		foreach($jumlahPangkat as $row)
		{
			$dt=array($row->nama,intval($row->jumlah));
			array_push($grafik_data, $dt);
		}

		$jsonData2Array=json_decode($jsonData2);

		$grafik_data2=[];
		foreach($jsonData2Array as $row)
		{
			$dt=array($row->tahun,intval($row->val));
			array_push($grafik_data2, $dt);
		}

		$title='Grafik Data Persentase Jomblo di UAD';		

		$data['grafik_data']=json_encode($grafik_data2);
		$data['title']=$title;
		$this->load->view('chart',$data);
	}
	function grafik ()
	{
		$charData=file_get_contents('assets/wanita.json');
		$charData=json_decode($charData);
		$res=array();
		foreach ($charData as $row ) {

			# code...
			$dat[]=[$row->tahun,(double)$row->val];
			array_push($res, $dat);
		}
		//echo json_encode($res);
		$data['PieChartTitle']='Jumlah Penduduk Wanita Tidak/Belum Sekolah di Kab. Purworejo';
		$data['PieChartData']=json_encode($res);
		$this->load->view('grafik',$data);
	}
	function department (){
		//data
		$source=file_get_contents('assets/data.json');
		$source=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $source), true );
		$result=array();
		$result1=array();
		$result2=array();
		$result3=array();
		$result4=array();
		$result5=array();
		//data jumlah anggaran program

		foreach ($source as $row ) {
			# code...
		
			if(!isset($result[$row['Program']])){
				$result[$row['Program']] = array($row==NULL);
			}else{
				array_push($result[$row['Program']], $row['Anggaran']);
			}					
		}
		$keysArray=array_keys($result);
			$PieChartData=array();
			foreach ($keysArray as $row) {
				# code...
				$PieChartData[]=[$row,array_sum($result[$row])];
			}
			$data['PieChartData']=json_encode($PieChartData);
			$data['PieChartTitle']='Data Perbandingan Jumlah Anggaran Program';
			$this->load->view('grafik',$data);

			//data jumlah Realisasi program
	
		foreach ($source as $row ) {
			# code...
			
			if(!isset($result1[$row['Program']])){
				$result1[$row['Program']] = array($row==NULL);
			}else{
				array_push($result1[$row['Program']], $row['Realisasi']);
			}					
		}
		$keysArray1=array_keys($result1);
			$PieChartData1=array();
			foreach ($keysArray1 as $row) {
				# code...
				$PieChartData1[]=[$row,array_sum($result1[$row])];
			}
			$data['PieChartData1']=json_encode($PieChartData1);
			$data['PieChartTitle1']='Data Perbandingan Jumlah Realisasi Program';
			$this->load->view('grafik',$data);

		//data Peningkatan Anggaran Kegiatan
		foreach ($source as $row ) {
			# code...
			
			if(!isset($result2[$row['Tahun']])){
				$result2[$row['Tahun']] = array($row==NULL);
			}else{
				array_push($result2[$row['Tahun']], $row['Anggaran']);
			}					
		}
		$keysArray2=array_keys($result2);
			$PieChartData2=array();
			foreach ($keysArray2 as $row) {
				# code...
				$PieChartData2[]=[$row,array_sum($result2[$row])];
			}
			$data['PieChartData2']=json_encode($PieChartData2);
			$data['PieChartTitle2']='Data Jumlah Peningkatan Anggaran ';
			$this->load->view('grafik',$data);
			//data Peningkatan realisasi
		foreach ($source as $row ) {
			# code...
			
			if(!isset($result3[$row['Tahun']])){
				$result3[$row['Tahun']] = array($row==NULL);
			}else{
				array_push($result3[$row['Tahun']], $row['Realisasi']);
			}					
		}
		$keysArray3=array_keys($result3);
			$PieChartData3=array();
			foreach ($keysArray3 as $row) {
				# code...
				$PieChartData3[]=[$row,array_sum($result3[$row])];
			}
			$data['PieChartData3']=json_encode($PieChartData3);
			$data['PieChartTitle3']='Data Jumlah Peningkatan Realisasi ';
			$this->load->view('grafik',$data);
			//data Perbandingan jumlah anggaran Kegiatan
		foreach ($source as $row ) {
			# code...
			
			if(!isset($result4[$row['Kegiatan']])){
				$result4[$row['Kegiatan']] = array($row==NULL);
			}else{
				array_push($result4[$row['Kegiatan']], $row['Anggaran']);
			}					
		}
		$keysArray4=array_keys($result4);
			$PieChartData4=array();
			foreach ($keysArray4 as $row) {
				# code...
				$PieChartData4[]=[$row,array_sum($result4[$row])];
			}
			$data['PieChartData4']=json_encode($PieChartData4);
			$data['PieChartTitle4']='Data Perbandingan Jumlah Anggaran Kegiatan ';
			$this->load->view('grafik',$data);
			//data Perbandingan jumlah realisasi Kegiatan
		foreach ($source as $row ) {
			# code...
			
			if(!isset($result5[$row['Kegiatan']])){
				$result5[$row['Kegiatan']] = array($row==NULL);
			}else{
				array_push($result5[$row['Kegiatan']], $row['Realisasi']);
			}					
		}
		$keysArray5=array_keys($result5);
			$PieChartData5=array();
			foreach ($keysArray5 as $row) {
				# code...
				$PieChartData5[]=[$row,array_sum($result5[$row])];
			}
			$data['PieChartData5']=json_encode($PieChartData5);
			$data['PieChartTitle5']='Data Perbandingan Jumlah Realisasi Kegiatan ';
			$this->load->view('grafik',$data);
	
			
		
	}
}
