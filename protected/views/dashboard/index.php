<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/highcharts.js');?>


<h3><?php echo Yii::t('app','Statistic Average Revenue per Customer')?></h3>
<div class="chart span-24 last" id="statistic-arpu">
	
</div>

<h3><?php echo Yii::t('app','Statistic  Revenue per Customer')?></h3>
<div class="chart span-24 last" id="statistic-client">
	
</div>

<h3><?php echo Yii::t('app','Graphically Progress Customer')?></h3>
<div class="chart span-24 last" id="statistic-cost-client">
	
</div>


<script type="text/javascript">
	var period_list = <?php echo $periodListJSON ?>;
	var arpu_list = <?php echo $arpuListJSON ?>;
	var client_list = <?php echo $clientListJSON ?>;
	var cost_client_list = <?php echo $costClientListJSON ?>;
	
	jQuery(document).ready(function() {
		// ARPU
		new Highcharts.Chart({
			chart: {
				renderTo: 'statistic-arpu',
				defaultSeriesType: 'line',
				marginRight: 130,
				marginBottom: 25
			},
			title: {
				text: 'Average Revenue per Customer',
				x: -20 //center
			},
			
			xAxis: {
				categories: period_list,
			},
			yAxis: {
				title: {
					text: 'Rp.'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
			},
			tooltip: {
				formatter: function() {
						return '<b>'+ this.series.name +'</b><br/>'+
						this.x +': '+ this.y ;
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -10,
				y: 100,
				borderWidth: 0
			},
			series: [
				{
					name: 'ARPU',
					data: arpu_list
				}
			]
		});
		// Customer Subcribe
		new Highcharts.Chart({
			chart: {
				renderTo: 'statistic-client',
				defaultSeriesType: 'line',
				marginRight: 130,
				marginBottom: 25
			},
			title: {
				text: 'Customer Subcribe',
				x: -20 //center
			},
			
			xAxis: {
				categories: period_list,
			},
			yAxis: {
				title: {
					text: 'Rp.'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
			},
			tooltip: {
				formatter: function() {
						return '<b>'+ this.series.name +'</b><br/>'+
						this.x +': '+ this.y ;
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -10,
				y: 100,
				borderWidth: 0
			},
			series: [
				{
					name: 'Customer Subcribe',
					data: client_list
				}
			]
		});
		// Cost per Costomer
		new Highcharts.Chart({
			chart: {
				renderTo: 'statistic-cost-client',
				defaultSeriesType: 'line',
				marginRight: 130,
				marginBottom: 25
			},
			title: {
				text: 'Average Cost per Customer',
				x: -20 //center
			},
			
			xAxis: {
				categories: period_list,
			},
			yAxis: {
				title: {
					text: 'Rp.'
				},
				plotLines: [{
					value: 0,
					width: 1,
					color: '#808080'
				}]
			},
			tooltip: {
				formatter: function() {
						return '<b>'+ this.series.name +'</b><br/>'+
						this.x +': '+ this.y ;
				}
			},
			legend: {
				layout: 'vertical',
				align: 'right',
				verticalAlign: 'top',
				x: -10,
				y: 100,
				borderWidth: 0
			},
			series: [
				{
					name: 'Average Customer Cost',
					data: cost_client_list
				}
			]
		});
		
		
	});
		
</script>
