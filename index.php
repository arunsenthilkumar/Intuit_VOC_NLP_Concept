<?php
function htmlBegin()
{
    echo '
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
    <html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>HTML Table With PHP</title>
    </head>
    <body>
    	<table border="1">
    ';
}

function htmlEnd()
{
    echo '
    </table>
    </body>
    </html>
    ';
}

function generateReport($csvFileName){
    $inputfile = file($csvFileName);
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
    echo  '<table border="1">';
    for ($i = 0; $i < count($data_lines); $i ++) {
        echo '<tr>';
        if ($i == 0) {
            // header
            for ($j = 0; $j < $numOfColumns; $j ++) {
                echo '<th>';
                echo $data_lines[$i][$j];
                echo '</th>';
            }
        } else {
            // data
            
            for ($j = 0; $j < $numOfColumns; $j ++) {
                // data
                echo '<td>';
                echo $data_lines[$i][$j];
                echo '</td>';
            }
        }
        echo '</tr>';
    }
    echo  '</table>';
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

<h2>Intuit Consumer Verbatims</h2>
<p>Select the appropriate tab to view Verbatims segmented into groups within the User Experience:</p>

<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'ob_promoter')">Onboarding Promoter</button>
  <button class="tablinks" onclick="openCity(event, 'ob_demoter')">Onboarding Demoter</button>
  <button class="tablinks" onclick="openCity(event, 'pb_promoter')">PostBoarding Promoter</button>
  <button class="tablinks" onclick="openCity(event, 'pb_demoter')">PostBoarding Demoter</button>
  <button class="tablinks" onclick="openCity(event, 'cu_promoter')">CleanUp Promoter</button>
  <button class="tablinks" onclick="openCity(event, 'cu_demoter')">CleanUp Demoter</button>
  <button class="tablinks" onclick="openCity(event, 'm_promoter')">Monthly Promoter</button>
  <button class="tablinks" onclick="openCity(event, 'm_demoter')">Monthly Demoter</button>
</div>

<div id="ob_promoter" class="tabcontent">
  <h3>Onboarding Segment</h3>
  <p>Promoter Verbatims</p>
  <table border="1">
  <?php 
  generateReport("onboardingPromoter.csv");
  ?>
  </table>
</div>

<div id="ob_demoter" class="tabcontent">
  <h3>Onboarding Segment</h3>
  <p>Demoter Verbatims</p>
  <table border="1">
  <?php 
  generateReport("onboardingDemoter.csv");
  ?>
  </table>
</div>


<div id="pb_promoter" class="tabcontent">
  <h3>PostBoarding Segment</h3>
  <p>Promoter Verbatims</p> 
  <table border="1">
  <?php 
  generateReport("postboardingPromoter.csv");
  ?>
  </table>
</div>

<div id="pb_demoter" class="tabcontent">
  <h3>Postboarding Segment</h3>
  <p>Demoter Verbatims</p>
  <table border="1">
  <?php 
  generateReport("postboardingDemoter.csv");
  ?>
  </table>
</div>

<div id="cu_promoter" class="tabcontent">
  <h3>CleanUp Segment</h3>
  <p>Promoter Verbatims</p>
  <table border="1">
  <?php 
  generateReport("cleanupPromoter.csv");
  ?>
  </table>
</div>

<div id="cu_demoter" class="tabcontent">
  <h3>CleanUp Segment</h3>
  <p>Demoter Verbatims</p>
  <table border="1">
  <?php 
  generateReport("cleanupDemoter.csv");
  ?>
  </table>
</div>

<div id="m_promoter" class="tabcontent">
  <h3>Monthly Segment</h3>
  <p>Promoter Verbatims</p>
  <table border="1">
  <?php 
  generateReport("monthlyPromoter.csv");
  ?>
  </table>
</div>

<div id="m_demoter" class="tabcontent">
  <h3>Monthly Segment</h3>
  <p>Demoter Verbatims</p>
  <table border="1">
  <?php 
  generateReport("monthlyDemoter.csv");
  ?>
  </table>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 