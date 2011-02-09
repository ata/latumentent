<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/js/highcharts.js');?>
<h2><?php echo Yii::t('app','Statistic')?></h2>

<div class="span-12" id="statistic-arpu">
	
</div>

<div class="span-12 last" id="statistic-client">
	
</div>

<div class="span-12" id="statistic-cost-client">
	
</div>

<div class="span-12 last" id="statistic-lain">
	
</div>


<script type="text/javascript">
		
	var chart;
	jQuery(document).ready(function() {
		chart = new Highcharts.Chart({
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
				categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
					'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
				categories1: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 
					'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
						this.x +': '+ this.y +'°C';
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
					name: 'Tokyo',
					data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
				}
			]
		});
		
		
	});
		
</script>
