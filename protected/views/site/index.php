<div id="tabs" class="main-tabs">
  <ul>
	  <li><a href="#temp">T&deg;<span class="tab-icon temp-icon">&nbsp;</span></a></li>
    <li><a href="#light">Lights<span class="tab-icon light-icon">&nbsp;</span></a></li>
    <li><a href="#emp">Employees<span class="tab-icon emp-icon">&nbsp;</span></a></li>
  </ul>
  <div id="temp" class="temp-tab-content">
	  <h1>Temperature information:</h1>
    <table class="info-table">
		 <tr>
			 <td>Outside temperature:</td>
			 <td>
				 <span id="outsideTemp"></span>&deg;
				 <div class="operation-dialog open_windows_dialog" title="Opening windows... ">
					Outside temperature is now optimal
					<hr/>
					<span class="dialog-info">
						.......shutting down AC
					</span>
					<span class="dialog-info">
						.......opening windows
					</span>
				 </div>
				 <div class="operation-dialog start_heat_dialog" title="Starting central heating... ">
					Office temperature is too low
					<hr/>
					<span class="dialog-info">
						.......closing windows
					</span>
					<span class="dialog-info">
						.......starting central heating
					</span>
				 </div>
				 <div class="operation-dialog start_cooling_dialog" title="Starting AC... ">
					Office temperature is too high
					<hr/>
					<span class="dialog-info">
						.......closing windows
					</span>
					<span class="dialog-info">
						.......starting AC
					</span>
				 </div>
			 </td>
		 </tr>
		 <tr>
			 <td>Office temperature:</td>
			 <td><span id="officeTemp"></span>&deg;</td>
		 </tr>
		 <tr>
			 <td>Humidity:</td>
			 <td><span id="humidity"></span>%</td>	
		 </tr>
	 </table>
  </div>
  <div id="light" class="light-tab-content">
    <h1>Lighting information:</h1>
    <table class="info-table">
		 <tr>
			 <td>Light level:</td>
			 <td>
				 400lx
				 <div class="operation-dialog lights_dialog" title="Increasing light level... ">
					Light level is too low for optimal office productivity
					<hr/>
					<span class="dialog-info">
						.......increasing light level
					</span>
				 </div>
			 </td>
		 </tr>
	 </table>
  </div>
  <div id="emp" class="emp-tab-content">
	  <h1>Employee information:</h1>
	  <table class="info-table emp-table">
		 <tr>
			 <th>Name</th>
			 <th>Departures/day</th>
			 <th>Visits/day</th>
			 <th>Normal departures/day</th>
		 </tr>
		 <tr>
			 <td><?php echo CHtml::link('John Doe', '/editUser');?></td>
			 <td>29</td>
			 <td>10</td>
			 <td>23</td>
		 </tr>
	 </table>
	  <div class="emp-statistics">
		  <h2>John Doe:</h2>
		  <div id="canvas-holder">
				<canvas id="chart-area" width="300" height="300"/>
			</div>
	  </div>
  </div>
</div>