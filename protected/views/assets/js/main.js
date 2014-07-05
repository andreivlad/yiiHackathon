var off = {
	officeTemp: 0,
	outsideTemp: 0,
	humidity: 0,
	lights: -1,
	ctx: null,
	init: function(){
		off.initItems.initTabs();
		off.requests.makeRequests();
		setInterval(off.requests.makeRequests, 3000);
		off.initItems.initCharts();
	},
	initItems:{
		initTabs:function(){
			$( "#tabs" ).tabs();
		},
		initCharts: function(){
			var pieData = [
				{
					value: 10,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "No work time %"
				},
				{
					value: 60,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Worktime %"
				},
				{
					value: 30,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Interrupted worktime %"
				}

			];
			off.ctx = document.getElementById('chart-area').getContext("2d");
			window.myPie = new Chart(off.ctx).Pie(pieData);
		}
	},
	requests: {
		makeRequests: function() {
			off.requests.getTemperature();
//			off.requests.getEmployeeData();
		},
		getTemperature: function() {
			$.post('/request/getTemperature', function(response){
				response = jQuery.parseJSON(response);
				console.log('Received: officeTemp:' + response.officeTemp + 
				', Outside temp:' + response.outsideTemp);
				response.officeTemp = parseFloat(response.officeTemp);
				response.outsideTemp = parseFloat(response.outsideTemp);
				if(off.officeTemp == 0){
					off.officeTemp = response.officeTemp;
				} 
				if(off.outsideTemp == 0){
					off.outsideTemp = response.outsideTemp;
				} 
				
				$('#officeTemp').text(response.officeTemp);
				$('#outsideTemp').text(response.outsideTemp);
				
				console.log(off.officeTemp - response.officeTemp);
				if(Math.abs(off.officeTemp - response.officeTemp) > 0.5) { //if temp varies more than 0.5 degree
					if(response.outsideTemp < 20 && response.outsideTemp > 14) {
						$('.open_windows_dialog').dialog();
					} else if(response.officeTemp <= 19) {
						$('.start_heat_dialog').dialog();
					} else if(response.officeTemp > 25) {
						  $('.start_cooling_dialog').dialog();
				  }
				  
				  off.officeTemp = parseFloat(response.officeTemp);
				  off.outsideTemp = parseFloat(response.outsideTemp);
				}
			});
		},
		getHumidity: function() {
			$.post('/request/getHumidity', function(response){
			});
		},
		getLights: function() {
			$.post('/request/getLights', function(response){
			});
		},
		getEmployeeData: function() {
			$.post('/request/getEmployeeData', function(response){
				var pieData = [
				{
					value: 200,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Red"
				},
				{
					value: 50,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Green"
				},
				{
					value: 100,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Yellow"
				},
				{
					value: 40,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Grey"
				},
				{
					value: 100,
					color: "#4D5360",
					highlight: "#616774",
					label: "Total work time"
				}

			];
				window.myPie = new Chart(off.ctx).Pie(pieData);
			});
		}
	}
};
