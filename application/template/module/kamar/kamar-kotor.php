<?php

include('component/com-kamar.php');

?>

<section class="content-header">
	<h1>Pembersihan Kamar <span class="small">Administrasi pembersihan kamar</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script src="js/highcharts.js"></script>

		<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'area',
                marginRight: 130,
                marginBottom: 25
            },
            title: {
                text: 'Pendapatan perkapita indonesia tahun 2006-2011',
                x: -20 //center
            },
            subtitle: {
                text: 'candra.web.id',
                x: -20
            },
            xAxis: {
                categories: ['2006', '2007', '2008','2009','2010','2011']
            },
            yAxis: {
                title: {
                    text: 'pendapatan dalam USD'
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
            series: [{
                name: 'Indonesia',
                data: [1660, 1946,2271,2590,3004,3550]
            }]
        });
    });
    
});
		</script>
		</div>
	</div>
</section>