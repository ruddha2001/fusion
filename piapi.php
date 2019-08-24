<?php

    require "connect.php";

    //Extracting the raw data from a GET Request sent by the Raspberry Pi and concating an aplhabet for the breakData() to work
    $rawData=$_GET['value']."X";


    /**
     * Name - breakFunc
     * Purpose - Extract required data from raw data
     * Parameter
     *  $tag = String having an alphabet corresponding to the single sensor required
     */
    function breakData($tag){

        $data = $GLOBALS['rawData'];//Local data variable with a copy of the Global rawData variable

        $index=stripos($data,$tag);
		 
         $count=0;
         
		 for ($i=$index+1;$i<strlen($data);$i++)//Loop to calculate the number of letters within segment
		 {

             $ch=substr($data,$i,1);
             
			 if (ctype_alpha($ch)){
				 break;
			 }
			 else {
				 $count++;
			 }
		 }
		 return substr($data,$index+1,$count); //Returning the digits within the segment
    }

    //Values of every Sensor
    $valuea=breakData('A');
    $valueb=breakData('B');
    $valuec=breakData('C');
    $valued=breakData('D');
    $valuee=breakData('E');
    
    if ($valuea>=50 or $valueb>=50 or $valuec>=50 or $valued>=50) //If any LDR is false, flag is true
    {
        $flag=true;
    }
    else
    {
        $flag=false;
    }

    //Writing the data to MySQL Database
    $query = "INSERT INTO garbage (id, bin, ldrflag, enose) VALUES (NULL, 'Bin 1 Kolkata','$flag','$valuee')";
    
    $result = mysqli_query ($conn, $query);

?>
