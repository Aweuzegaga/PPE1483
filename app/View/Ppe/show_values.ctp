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
$donnees4 = array();
$i = 0; $j = 0; $k = 0; $l = 0;
$moytemp = 0; $moyhumidite = 0; $moyconso = 0; $moyconsoponc = 0;

foreach($raw as $data){
    
    if (($data['Mesure']['uuidEquipement'] == '4cb2c8a1-0bc2-4a24-bbdc-0dab21142bef') && ($data['Mesure']['idEquipement']) == '96') {
        
        
	$datetime1 = strtotime($data['Mesure']['date']);
	$datetime1 = $datetime1*1000;
        $valeur = $data['Mesure']['valeur'];
	$donnees[] = "[$datetime1, $valeur]"; 
        $j = $j + 1;
        $moyhumidite = $moyhumidite + $valeur;
        $tothumidite = $moyhumidite / $j;
    }
    
        
    if (($data['Mesure']['uuidEquipement'] == '4cb2c8a1-0bc2-4a24-bbdc-0dab21142bef') && ($data['Mesure']['idEquipement']) == '95') {
                 
	$i = $i +1;
	$datetime1 = strtotime($data['Mesure']['date']);
	$datetime1 = $datetime1*1000;
        $valeur = $data['Mesure']['valeur'];
	$donnees2[] = "[$datetime1, $valeur]"; 	
        $moytemp = $moytemp + $valeur;
        $tottemp = $moytemp / $i;
    }
        
    if (($data['Mesure']['uuidEquipement'] == '3ed9fee0-9704-4072-ae8c-526d7f6c915e') && ($data['Mesure']['idEquipement']) == '78') { 
        
            
            $datetime1 = strtotime($data['Mesure']['date']);
            $datetime1 = $datetime1*1000;
            $valeur = $data['Mesure']['valeur'];
            $donnees3[] = "[$datetime1, $valeur]";  
            $k = $k + 1;
            $moyconso = $moyconso + $valeur;
            $totconso = $moyconso / $k;
            
    }
    
    if (($data['Mesure']['uuidEquipement'] == '3ed9fee0-9704-4072-ae8c-526d7f6c915e') && ($data['Mesure']['idEquipement']) == '77') { 
        
            
            $datetime1 = strtotime($data['Mesure']['date']);
            $datetime1 = $datetime1*1000;
            $valeur = $data['Mesure']['valeur'];
            $donnees4[] = "[$datetime1, $valeur]";  
            $l = $l + 1;
            $moyconsoponc = $moyconsoponc + $valeur;
            $totconsoponc = $moyconsoponc / $l;
            
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
                    name: 'temperature moy <?php echo round($tottemp,2)?>',
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
                    name: 'humidite moy <?php echo round($tothumidite,2)?>',
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
                    name: 'consommation moy <?php echo round($totconso,2)?>',
                    data: [<?php echo join($donnees3, ',') ?>]
                }]
            });
        });         
    });
</script>
<div id="container3" style="width:45%; height:50%;float: right;"></div>

    <script type="text/javascript">
    $(function () {
        var chart;
        $(document).ready(function() {
            chart = new Highcharts.Chart({
                chart: {
                    renderTo: 'container4',
                    type: 'line',
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Consommation Ponctuelle',
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
                    name: 'consommation ponc moy <?php echo round($totconsoponc,2)?>',
                    data: [<?php echo join($donnees4, ',') ?>]
                }]
            });
        });         
    });
</script>
<div id="container4" style="width:45%; height:50%;"></div>
</body>
</html>