<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jsonsource extends CI_Controller {

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
		$jsonFile=file_get_contents("assets/code.json");
		$jsonData=json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $jsonFile), true );
		$res=array();
		$keysArray=array();

		foreach($jsonData as $row)
		{
			$custID=(int)$row['custId'];
			if($custID!=0)
			{
				if(!isset($res[$row['salesChannel']]))
				{
					$res[$row['salesChannel']]=array((int)$row['unitsSold']);
					array_push($keysArray,$row['salesChannel']);
				}else{
					array_push($res[$row['salesChannel']], (int)$row['unitsSold']);				
				}

			}
		}
		//konversi data sesuai format pada CHART
		$data=array();
		foreach($keysArray as $row)
		{
			if (array_sum($res[$row])>=1) {
				$data[]=array($row,array_sum($res[$row]));
				# code...
			}
			

		}

		$data1 = [
			['Online', array_sum($res['Online'])],
			['Retail', array_sum($res['Retail'])],
			['Direct', array_sum($res['Direct'])]
		];

		$title='Grafik Data Penjualan';	

		//echo json_encode($data);	

		$data['grafik_data']=json_encode($data);
		$data['title']=$title;
		$this->load->view('chart',$data);
		//echo json_encode(array_sum($res['Online']));
		//49375
		//echo json_encode($data1);

		
	}

}

