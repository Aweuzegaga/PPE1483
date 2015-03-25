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
    
    if ($data['Mesure']['uuidEquipement'] == '954b15e0-de1c-4b88-baab-cfa0dc57bee8') {
        
        
	$datetime1 = strtotime($data['Mesure']['date']);
	$datetime1 = $datetime1*1000;
        $valeur = $data['Mesure']['valeur'];
	$donnees[] = "[$datetime1, $valeur]"; 
    }
    
        
    if (($data['Mesure']['uuidEquipement'] == '11d2f856-4159-444d-a2aa-9aec68c1579a') && ($data['Mesure']['idEquipement']) == '95') {
                 
	
	$datetime1 = strtotime($data['Mesure']['date']);
	$datetime1 = $datetime1*1000;
        $valeur = $data['Mesure']['valeur'];
	$donnees2[] = "[$datetime1, $valeur]"; 	
    }
        
    if (($data['Mesure']['uuidEquipement'] == '11d2f856-4159-444d-a2aa-9aec68c1579a') && ($data['Mesure']['idEquipement']) == '97') { 
        
            
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
                    data: [<?php echo join($donnees3, ',') ?>]
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