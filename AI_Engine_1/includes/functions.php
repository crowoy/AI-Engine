<?php
//Functions

//Checking Internet Connection
function connectedGoogle (){
	$connectedGoogle = @fsockopen("www.google.com", 80|443);
    if ($connectedGoogle){
        echo 'Google: TRUE';
        $state = TRUE;
        fclose($connectedGoogle);
    }else{
    	echo 'Google: FALSE';
        $state = FALSE;
    }
	//echo 'Google: '.$state;
    return $state;
}

//Checking Connection to Wolfram Servers
function connectedWolfram (){
	$connectedWolfram = @fsockopen("www.wolframalpha.com", 80|443);
    if ($connectedWolfram){
        echo 'Wolfram: TRUE';
        $state = TRUE;
        fclose($connectedWolfram);
    }else{
    	echo 'Wolfram: FALSE';
        $state = FALSE;
    }
	//echo 'Wolfram: '.$state;
    return $state;
}
?>