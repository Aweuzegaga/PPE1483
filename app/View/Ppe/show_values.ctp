<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<script src="http://code.highcharts.com/highcharts.js"></script>
</head>
<body>

    <?php

$donnees = array(); 
$donnees2 = array();
$donnees3 = array();

foreach($raw as $data){
    
    if (($data['Mesure']['uuidEquipement'] == '4cb2c8a1-0bc2-4a24-bbdc-0dab21142bef') && ($data['Mesure']['idEquipement']) == '96') {
        
        
	$datetime1 = strtotime($data['Mesure']['date']);
	$datetime1 = $datetime1*1000;
        $valeur = $data['Mesure']['valeur'];
	$donnees[] = "[$datetime1, $valeur]"; 
    }
    
        
    if (($data['Mesure']['uuidEquipement'] == '4cb2c8a1-0bc2-4a24-bbdc-0dab21142bef') && ($data['Mesure']['idEquipement']) == '95') {
                 
	
	$datetime1 = strtotime($data['Mesure']['date']);
	$datetime1 = $datetime1*1000;
        $valeur = $data['Mesure']['valeur'];
	$donnees2[] = "[$datetime1, $valeur]"; 	
    }
        
    if (($data['Mesure']['uuidEquipement'] == '3ed9fee0-9704-4072-ae8c-526d7f6c915e') && ($data['Mesure']['idEquipement']) == '7') { 
        
            
            $datetime1 = strtotime($data['Mesure']['date']);
            $datetime1 = $datetime1*1000;
            $valeur = $data['Mesure']['valeur'];
            $donnees3[] = "[$datetime1, $valeur]";  	
    }
   

}

?>

<script type="text/javascript">
    $(function () {
        var chart;
        $(document).ready(function() {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container1',
                    type: 'line',
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Temperature',
                    x: -20
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: { 
                        second: '%H:%M:%S'    
                    }
                },
                /*tooltip: {
                    formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%e. %b', this.x) +': '+ this.y;
                    }
                },*/
                series: [{
                    name: 'temperature',
                    data: [<?php echo join($donnees2, ',') ?>]
                }]
            });
        });         
    });
</script>
<div id="container1" style="width:45%; height:50%;float:right;"></div>
    
    <script type="text/javascript">
    $(function () {
        var chart;
        $(document).ready(function() {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container2',
                    type: 'line',
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Humidite',
                    x: -20
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: { 
                        second: '%H:%M:%S'    
                    }
                },
                /*tooltip: {
                    formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%e. %b', this.x) +': '+ this.y;
                    }
                },*/
                series: [{
                    name: 'humidite',
                    data: [<?php echo join($donnees, ',') ?>]
                }]
            });
        });         
    });
</script>

<div id="container2" style="width:45%; height:50%;"></div>


<script type="text/javascript">
    $(function () {
        var chart;
        $(document).ready(function() {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container3',
                    type: 'line',
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Consommation',
                    x: -20
                },
                xAxis: {
                    type: 'datetime',
                    dateTimeLabelFormats: { 
                        second: '%H:%M:%S'    
                    }
                },
                /*tooltip: {
                    formatter: function() {
                        return '<b>'+ this.series.name +'</b><br/>'+
                        Highcharts.dateFormat('%e. %b', this.x) +': '+ this.y;
                    }
                },*/
                series: [{
                    name: 'consommation',
                    data: [<?php echo join($donnees3, ',') ?>]
                }]
            });
        });         
    });
</script>
<div id="container3" style="width:100%; height:400px;"></div>
</body>
</html>