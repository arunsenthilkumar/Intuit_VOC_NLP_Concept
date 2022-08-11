<?php
$host = "localhost";
$username = "myuser";
$password = "password";
$dbname = "mydb1";
$port = '3306';

$conn = new mysqli($host, $username, $password, $dbname,$port);

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

function considerOnboarding ($str){
    if(stripos($str, "uploading") !== false || stripos($str, "documents") !== false ||stripos($str, "communication") !== false || stripos($str, "advise") !== false ||stripos($str, "guidance") !== false || stripos($str, "easy") !== false || stripos($str, "friendly") !== false  ) {
        return true;
    }
    return false;
}
function considerPostboarding ($str){
    if(stripos($str, "feedback") !== false || stripos($str, "documents") !== false ||stripos($str, "communication") !== false || stripos($str, "not complete") !== false ||stripos($str, "completion") !== false || stripos($str, "difficult") !== false || stripos($str, "hard") !== false  ) {
        return true;
    }
    return false;
}
function considerCleanup ($str){
    if(stripos($str, "finished") !== false || stripos($str, "documents") !== false || stripos($str, "clean") !== false || stripos($str, "clean-up") !== false||stripos($str, "communication") !== false || stripos($str, "books") !== false ||stripos($str, "up-to-date") !== false || stripos($str, "up to date") !== false || stripos($str, "satisfied") !== false  ) {
        return true;
    }
    return false;
}
function considerMonthly ($str){
    if(stripos($str, "experience") !== false || stripos($str, "communication") !== false ||stripos($str, "service") !== false || stripos($str, "great") !== false ||stripos($str, "guidance") !== false || stripos($str, "easy") !== false || stripos($str, "helpful") !== false  ) {
        return true;
    }
    return false;
}

//run sql queries 
function checkPRS ($str){
    if($str >=8){       
        return "Promoter";        
    }
    else if($str <=5){
        return "Detractor";
    }
}

/*function doesHaveSpammyWords ($str){
    if(stripos($str, "free") !== false || stripos($str, "offer") !== false ||stripos($str, "cash") !== false || stripos($str, "txt") !== false ||stripos($str, "text") !== false || stripos($str, "congratulations") !== false ||stripos($str, "winner") !== false||stripos($str, "prize") !== false||stripos($str, "sex") !== false||stripos($str, "sexy") !== false||stripos($str, "call") !== false){
        return "true";
    }
    return "false";
}*/

function createCSVFile($array,$fileName,$title,$mode){
   // only for mac: $fileName = '/Users/arunsmac/Desktop/VitualBOx/IntuitCode/www/html/' . $fileName;

    // for mac: echo $fileName;
    //For Windows the default file location is C:\LAMP\www\html -> 
    // -> Apache's root location (can only see the files in this location)
    //when you hit localhost:8080 apache will be able to read from this location which can be seen in the vagrant file


    $myfile = fopen($fileName, $mode) or die("Unable to open file!");
    if(!empty($title)){
        fwrite($myfile, $title . PHP_EOL);
    }
    if(!empty($array)){
        $txt = "";
        for($i=0; $i<sizeof($array); $i++){
            $txt = '"'.$array[$i][0].'";'. $array[$i][1].';'. $array[$i][2] . PHP_EOL;
            fwrite($myfile, $txt);
        }
    }    
    fclose($myfile);
}

function main(){
    global $conn;

    $sql = "SELECT * FROM `aug1_present`";
    $result = $conn->query($sql);
    $array=array(); 
    $onboardingArray=array();
    $onboardingPromotorArray=array();
    $onboardingDemoterArray=array();
    $postboardingPromoterArray=array();
    $postboardingDemoterArray=array();
    $postboardingArray=array();
    $cleanupArray=array();
    $cleanupPromotorArray=array();
    $cleanupDemoterArray=array();
    $monthlyArray=array();
    $monthlyPromotorArray=array();
    $monthlyDemoterArray=array();

    debug_to_console("initial");

    while ($lrow = mysqli_fetch_assoc($result)){ 
    $ret[] = $lrow;

    array_push($array,$lrow);
    } 
    
    for ($i = 0; $i < sizeof($array); $i++) {
        //sends the review to the function, checks for onboarding review
      if (considerOnboarding($array[$i]['Verbatim'])) {
        $prsonboarding=array($array[$i]['Verbatim'], $array[$i]['PRS Score'], $array[$i]['Recorded Date (+00:00 GMT)']);
        /*$prsonboarding=array('Verbatim', 'PRS Score', 'Recorded Date (+00:00 GMT)');*/
          array_push($onboardingArray, $prsonboarding);
          if($array[$i]['PRS Score'] >= 8){
              array_push($onboardingPromotorArray, $prsonboarding);
          }else if($array[$i]['PRS Score'] <= 5){
              array_push($onboardingDemoterArray, $prsonboarding);
          }
          
      }
      else if (considerPostboarding($array[$i]['Verbatim'])) {

        $prsPostboard=array();
        $prsPostboard=array($array[$i]['Verbatim'], $array[$i]['PRS Score'], $array[$i]['Recorded Date (+00:00 GMT)']);

            array_push($postboardingArray,$prsPostboard);
            if($array[$i]['PRS Score'] >= 8){
                array_push($postboardingPromoterArray, $prsPostboard);
            }else if($array[$i]['PRS Score'] <= 5){
                array_push($postboardingDemoterArray, $prsPostboard);
            }
      }
      else if (considerCleanup($array[$i]['Verbatim'])) {
        $prsCleanup=array();
        $prsCleanup=array($array[$i]['Verbatim'], $array[$i]['PRS Score'], $array[$i]['Recorded Date (+00:00 GMT)']);
        array_push($cleanupArray,$prsCleanup);
        if($array[$i]['PRS Score'] >= 8){
            array_push($cleanupPromotorArray, $prsCleanup);
        }else if($array[$i]['PRS Score'] <= 5){
            array_push($cleanupDemoterArray, $prsCleanup);
        }
    }
    else if (considerMonthly($array[$i]['Verbatim'])) {
        $prsMonthly=array();
        $prsMonthly=array($array[$i]['Verbatim'], $array[$i]['PRS Score'], $array[$i]['Recorded Date (+00:00 GMT)']);
        array_push($monthlyArray,$prsMonthly);
        if($array[$i]['PRS Score'] >= 8){
            array_push($monthlyPromotorArray, $prsMonthly);
        }else if($array[$i]['PRS Score'] <= 5){
            array_push($monthlyDemoterArray, $prsMonthly);
        }

        /*array_push($monthlyArray,$array[$i]['Verbatim']);*/
  }

     /*   echo $array[$i]['Verbatim'];
      echo "\n";
      echo  considerOnboarding($array[$i]['Verbatim']);
      echo "\n";
      */
    }
    echo "here";
    print_r($onboardingArray);
    
    //createCSVFile($onboardingArray,"onboarding.csv","Onboarding Verbatims,PRS Score,Date & Time");
    
    //createCSVFile(null,"onboarding.csv","Onboarding Verbatims,PRS Score,Date & Time","w");
    
    //This is the header for Onboarding Promoter
    createCSVFile(null,"onboardingPromoter.csv","Onboarding Verbatims;PRS Score;Date & Time","w");
    //This pushes the data onto the onboardingPromoter file
    createCSVFile($onboardingPromotorArray,"onboardingPromoter.csv",null,"a");
    //This is the header for Onboarding Demoter
    createCSVFile(null,"onboardingDemoter.csv","Onboarding Verbatims;PRS Score;Date & Time","w");
        //This pushes the data onto the onboardingDemoter file
    createCSVFile($onboardingDemoterArray,"onboardingDemoter.csv",null,"a");


    createCSVFile(null,"postboardingPromoter.csv","Post-boarding Verbatims;PRS Score;Date & Time","w");
    createCSVFile($onboardingPromotorArray,"postboardingPromoter.csv",null,"a");
    createCSVFile(null,"postboardingDemoter.csv","Postboarding Verbatims;PRS Score;Date & Time","w");
    createCSVFile($onboardingDemoterArray,"postboardingDemoter.csv",null,"a");
    
    createCSVFile($cleanupArray,"cleanupPromoter.csv","Clean-up Verbatims;PRS Score;Date & Time","w");
    createCSVFile($onboardingPromotorArray,"cleanupPromoter.csv",null,"a");
    createCSVFile(null,"cleanupDemoter.csv","Cleanup Verbatims;PRS Score;Date & Time","w");
    createCSVFile($onboardingDemoterArray,"cleanupDemoter.csv",null,"a");
    
    createCSVFile($monthlyArray,"monthlyPromoter.csv","Monthly Verbatims;PRS Score;Date & Time","w");
    createCSVFile($onboardingPromotorArray,"monthlyPromoter.csv",null,"a");
    createCSVFile(null,"monthlyDemoter.csv","Monthly Verbatims;PRS Score;Date & Time","w");
    createCSVFile($onboardingDemoterArray,"monthlyDemoter.csv",null,"a");
    
}

main();

?>