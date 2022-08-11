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

function generateReport(){
    $inputfile = file("onboardingPromotor.csv");
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
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
}
function generateReport(){
    $inputfile = file("onboardingDemoter.csv");
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
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
}
function generateReport(){
    $inputfile = file("postboardingPromotor.csv");
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
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
}
function generateReport(){
    $inputfile = file("postboardingDemoter.csv");
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
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
}
function generateReport(){
    $inputfile = file("cleanupPromotor.csv");
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
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
}
function generateReport(){
    $inputfile = file("cleanupDemoter.csv");
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
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
}
function generateReport(){
    $inputfile = file("monthlyPromotor.csv");
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
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
}
function generateReport(){
    $inputfile = file("monthlyDemoter.csv");
    $data_lines = array();
    foreach ($inputfile as $line) {
        $data_lines[] = explode(";", $line);
    }
    $numOfColumns = count($data_lines[0]);
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
}

htmlBegin();
generateReport();
htmlEnd();
?>