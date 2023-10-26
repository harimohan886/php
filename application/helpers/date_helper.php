<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(error_reporting() & ~E_DEPRECATED);
/**
 * Date Helper	 
 *	
 * Date-Time Related Functions	
 * @author		RD
 * @version		1.0
 * @functions
 * function changeToMysqlFormat()
 * function changeFormat()
 * function dateDiff()
 * function hms2sec()
 * function sec2hms()
**/



/**
 * changeToMysqlFormat
 * Changes given date to mysql format to store into the database. 
 * @access	public
*/
if ( ! function_exists('changeToMysqlFormat')){	
	function changeToMysqlFormat($date,$time=false,$currFormat='dmy',$separator='-'){
		switch($currFormat){
			case 'dmy':
			case 'ymd':
						if($time){
							return date('Y-m-d H:i:s',strtotime($date));
						}else{
							return date('Y-m-d',strtotime($date));
						}
			break;
			case 'mdy':
						if($time){
							$dateArray		=	explode(' ',$date);
							$dateParams		=	explode($separator,$dateArray[0]);
							if($dateArray[1]	!=	''){
								return $dateParams[2].'-'.$dateParams[0].'-'.$dateParams[1].' '.$dateArray[1];
							}else{
								return $dateParams[2].'-'.$dateParams[0].'-'.$dateParams[1];
							}
						}else{
							$date			=	explode($separator,$date);
							return $date[2].'-'.$date[0].'-'.$date[1];
						}
			break;
		}
	}
}



/**
 * changeFormat
 * Changes given date to required format. 
 * @access	public
*/
if ( ! function_exists('changeFormat')){	
	function changeFormat($date,$requiredFormat,$currFormat='dmy',$separator='-'){
		switch($currFormat){
			case 'dmy':
			case 'ymd':
				return date($requiredFormat,strtotime($date));
			break;
			default:
				$mainArr = explode(' ',$date);
				$dateArr = explode($separator,$mainArr[0]);
				if(isset($mainArr[1]) && $mainArr[1]!=''){
					return date($requiredFormat,strtotime($dateArr[2].'-'.$dateArr[1].'-'.$dateArr[0].' '.$mainArr[1]));
				}else{ 
					return date($requiredFormat,strtotime($date[2].'-'.$date[1].'-'.$date[0]));
				}
				break;
		}
	}
}




/**
 * dateDiff
 * Gets the different between two dates. 
 * @access	public
*/
if ( ! function_exists('dateDiff')){	
	function dateDiff($date1, $date2){
		$dateDiff 	= array();
		$d1 		= strtotime($date1);
		$d2 		= strtotime($date2);
		$difference = $d2-$d1;

		//-- year difference --//
		$dateDiff['yearDiff']		=	floor(($difference)/31536000);
		//-- month difference --//
		$dateDiff['monthDiff']		=	floor(($difference)/2628000);
		//-- days difference --//
		$dateDiff['dayDiff']		=	floor(($difference)/86400);
		//-- hours difference --//
		$dateDiff['hourDiff']		=	floor(($difference)/3600);
		//-- minutes difference --//
		$dateDiff['minuteDiff']		=	floor(($difference)/60);
		//-- seconds difference --//
		$dateDiff['secondDiff']		=	$difference;
		return $dateDiff;
	}
}



/**
 * hms2sec
 * Converts time to seconds. 
 * @access	public
*/
if ( ! function_exists('hms2sec')){
	function hms2sec($hms) {
		list($h, $m, $s) 	= explode (':', $hms);
		$seconds 			= 0;
		$seconds 			+= (intval($h) * 3600);
		$seconds 			+= (intval($m) * 60);
		$seconds 			+= (intval($s));
		return $seconds;
	}
}



/**
 * sec2hms
 * Converts seconds to hour format. 
 * @access	public
*/
if ( ! function_exists('sec2hms')){
	function sec2hms($sec, $padHours = false) {
		$hms 				= '';
		$hours 				= intval(intval($sec) / 3600); 
		// add to $hms, with a leading 0 if asked for
		$hms 				.= ($padHours) ? str_pad($hours, 2, '0', STR_PAD_LEFT). ':' : $hours. ':';
		// dividing the total seconds by 60 will give us
		// the number of minutes, but we're interested in 
		// minutes past the hour: to get that, we need to 
		// divide by 60 again and keep the remainder
		$minutes 			= intval(($sec / 60) % 60); 

		// then add to $hms (with a leading 0 if needed)
		$hms 				.= str_pad($minutes, 2, '0', STR_PAD_LEFT). ':';
		// seconds are simple - just divide the total
		// seconds by 60 and keep the remainder
		$seconds 			= intval($sec % 60); 

		// add to $hms, again with a leading 0 if needed
		$hms 				.= str_pad($seconds, 2, '0', STR_PAD_LEFT);
		return $hms;
	}
}




if ( ! function_exists('addOrdinalNumberSuffix')){
function addOrdinalNumberSuffix($num) {
    if (!in_array(($num % 100),array(11,12,13))){
      switch ($num % 10) {
        // Handle 1st, 2nd, 3rd
        case 1:  return $num.'st';
        case 2:  return $num.'nd';
        case 3:  return $num.'rd';
      }
    }
    return $num.'th';
  }
}

if ( ! function_exists('convert_event_time')){
function convert_event_time($time) {
	$time_in_12_hour_format  = date("g:i a", strtotime(substr($time,0,2).":".substr($time,2,3)));
	return $time_in_12_hour_format;
  }
}
if ( ! function_exists('ago')){
function agow($time)
{
   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "s";
   }

   return "$difference $periods[$j] 'ago' ";
}



function ago($i){
    date_default_timezone_set('Asia/Kolkata');
	$currenttime	=	strtotime(date('d-m-Y H:i:s'));
	$m 				=  	$currenttime -    $i; 
	$o				=	'just now';
    $t 				= 	array('year'=>31556926,'month'=>2629744,'week'=>604800,'day'=>86400,'hour'=>3600,'minute'=>60,'second'=>1);
    foreach($t as $u=>$s){
        if($s<=$m){$v=floor($m/$s); $o="$v $u".($v==1?'':'s').' ago'; break;}
    }
    return $o;
}


if ( ! function_exists('_get_year_month')){
    function _get_year_month($week) {
        $dateDiff 	= array();        
        //-- Year difference --//
        $dateDiff['yearDiff']		=	round(($week)/(12*4.333));
        $months_in_year = $dateDiff['yearDiff']*12;
        //-- month difference --//
        $dateDiff['monthDiff']		=	round((($week)/4.333)-$months_in_year);
        return $dateDiff;
    }
}

}




