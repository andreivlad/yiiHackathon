<?php

class RequestController extends Controller
{
	private $temperatureUrl = 'http://www.test.com/get-temperature';
	private $humidityUrl = 'http://www.test.com/get-humidity';
	private $lightsUrl = 'http://www.test.com/get-lights';
	private $employeesUrl = 'http://www.test.com/get-employee-data';
	
	public function actionGetTemperature() {
		$output = Yii::app()->curl->post($this->temperatureUrl, array());
		echo '{"outsideTemp": "19", "officeTemp": "21.6"}';
	}
	
	public function actionGetHumidity() {
		$output = Yii::app()->curl->post($this->humidityUrl, array());
		echo $output;
	}
	
	public function actionGetLights() {
		$output = Yii::app()->curl->post($this->lightsUrl, array());
		echo $output;
	}
	
	public function actionGetEmployeeData() {
		$departures = Departures::model()->findAll(array('order'=>'id DESC'));
		$visits = Visits::model()->findAll(array('order'=>'id DESC'));
		
		$output = Yii::app()->curl->post($this->employeesUrl, array(
			 'last_departure_id' => !empty($departures)?$departures[0]->id:0,
			 'last_visit_id' => !empty($visits)?$visits[0]->id:0
		));
		
		$output = '{
		"departureTimestamps": [{"id": "1", "startTimestamp": "12569537329", "endTimestamp": "12569537329"}, {"id": "2", "startTimestamp": "12569537329", "endTimestamp": "12569537329"}],
		"visitsTimestamps": [{"id": "1", "startTimestamp": "12569537329", "endTimestamp": "12569537329"}, {"id": "2", "startTimestamp": "12569537329", "endTimestamp": "12569537329"}]
		}';
		$employeeData = json_decode($output);
		
		if(!empty($employeeData->departureTimestamps)){
			foreach ($employeeData->departureTimestamps as $departureTimestamp) {
				$departure = new Departures();
				$departure->id = $departureTimestamp->id;
				$departure->startDateTime = date('Y-m-d H:i:s',$departureTimestamp->startTimestamp);
				$departure->endDateTime = date('Y-m-d H:i:s',$departureTimestamp->endTimestamp);
				$departure->save();
			}
		}
		
		if(!empty($employeeData->visitsTimestamps)){
			foreach ($employeeData->visitsTimestamps as $visitTimestamp) {
				$visit = new Visits();
				$visit->id = $visitTimestamp->id;
				$visit->startDateTime = date('Y-m-d H:i:s', $visitTimestamp->startTimestamp);
				$visit->endDateTime = date('Y-m-d H:i:s', $visitTimestamp->endTimestamp);
				$visit->save();
			}
		}
		
		var_dump($employeeData);die();
		echo $output;
	}
}