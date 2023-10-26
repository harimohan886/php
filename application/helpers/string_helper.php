<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(error_reporting() & ~E_DEPRECATED);
/**
 * String Helper	 
 *	
 * String Related Functions	
 * @author		RD
 * @version		1.0
 * @functions
 * function displayString()
**/

/**
 * displayString
 * Displays a string in TEXT or HTML format
 * @param	(string) $string
 * @param	(string) $mode
 * @return	(string) $string
 * @access	public
*/
if ( ! function_exists('displayString')){
	function displayString($string,$type=''){
		if($type=='html'){
			return stripslashes(trim($string));
		}else{
			return htmlentities(stripslashes(trim($string)));
		}
	}
}

/**
 * TruncateStrCloseHtmlTags
 * Displays a part of a string and closes all open tags
 * @param	(string) 	$string
 * @param	(int) 		$length
 * @param	(string) 	$ending
 * @param	(boolean) 	$exact
 * @param	(boolean) 	$considerHtml
 * @return	(string) 	$string
 * @access	public
*/
if ( ! function_exists('TruncateStrCloseHtmlTags')){
	function TruncateStrCloseHtmlTags($text, $length = 100, $ending = '...', $exact = false, $considerHtml = true) {
		if ($considerHtml) {
			if (strlen(preg_replace('/<.*?>/', '', $text)) <= $length) {
				return $text;
			}
			preg_match_all('/(<.+?>)?([^<>]*)/s', $text, $lines, PREG_SET_ORDER);
			$total_length 	= strlen($ending);
			$open_tags 		= array();
			$truncate 		= '';
			foreach ($lines as $line_matchings) {
				if (!empty($line_matchings[1])) {
					if (preg_match('/^<(\s*.+?\/\s*|\s*(img|br|input|hr|area|base|basefont|col|frame|isindex|link|meta|param)(\s.+?)?)>$/is', $line_matchings[1])) {
					} else if (preg_match('/^<\s*\/([^\s]+?)\s*>$/s', $line_matchings[1], $tag_matchings)) {
						$pos = array_search($tag_matchings[1], $open_tags);
						if ($pos !== false) {
							unset($open_tags[$pos]);
						}
					} else if (preg_match('/^<\s*([^\s>!]+).*?>$/s', $line_matchings[1], $tag_matchings)) {
						array_unshift($open_tags, strtolower($tag_matchings[1]));
					}
						$truncate .= $line_matchings[1];
				}
				$content_length = strlen(preg_replace('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', ' ', $line_matchings[2]));
				if ($total_length+$content_length> $length) {
					$left 				= $length - $total_length;
					$entities_length 	= 0;
					
					if (preg_match_all('/&[0-9a-z]{2,8};|&#[0-9]{1,7};|[0-9a-f]{1,6};/i', $line_matchings[2], $entities, PREG_OFFSET_CAPTURE)) {
						foreach ($entities[0] as $entity) {
							if ($entity[1]+1-$entities_length <= $left) {
								$left--;
								$entities_length += strlen($entity[0]);
							} else {
								break;
							}
						}
					}
					$truncate .= substr($line_matchings[2], 0, $left+$entities_length);
					break;
					} else {
						$truncate .= $line_matchings[2];
						$total_length += $content_length;
					}
					if($total_length>= $length) {
						break;
					}
			}
		} else {
			if (strlen($text) <= $length) {
				return $text;
			} else {
				$truncate = substr($text, 0, $length - strlen($ending));
			}	
		}
		if (!$exact) {
			$spacepos = strrpos($truncate, ' ');
			if (isset($spacepos)) {
				$truncate = substr($truncate, 0, $spacepos);
			}
		}
		$truncate .= $ending;
		if($considerHtml) {
			foreach ($open_tags as $tag) {
				$truncate .= '</' . $tag . '>';
			}
		}
		$truncate 			= preg_replace('/(<br\ ?\/?>)+/i', '<br>', $truncate);
		$truncate 			= preg_replace('#(?:<br\s*/?>\s*?){2,}#', '<p></p>',$truncate);
		return br2nl(strip_tags(stripcslashes(trim($truncate)) , '<br>,</br>,<p>,</p>'));
	}
}

/**
 * replace_br
 * Remove BR tag from a string
 * @param	(string) 	$string
 * @return	(string) 	$string
 * @access	public
*/
if ( ! function_exists('replace_br')){
	function replace_br($data) {
		$data = trim($data);
		$data = preg_replace('#(?:<br\s*/?>\s*?){2,}#', '</p><p>', $data);
		$data = trim($data);
		return "<p>$data</p>";
	}
}

/**
 * br2nl
 * Convert BR tag to P tag
 * @param	(string) 	$string
 * @return	(string) 	$string
 * @access	public
*/
if ( ! function_exists('br2nl')){
	function br2nl($text, $tags = "br"){
		$text = trim($text);
		$tags = explode(" ", $tags);
		foreach($tags as $tag){
			$text = trim($text);
			$text = eregi_replace("<" . $tag . "[^>]*>", "<p>", $text);
			$text = eregi_replace("</" . $tag . "[^>]*>", "</p>", $text);
		}
		return($text);
	}
}

/**
 * displaySubString
 * Displays a part of the string in given mode
 * @param	(string) 	$string
 * @return	(string) 	$string
 * @access	public
*/
if ( ! function_exists('displaySubString')){
	function displaySubString($string,$char=''){
		if($char!=''){
			return substr(strip_tags(stripcslashes(trim($string))), 0, $char); // html output
		}else{
			return substr(strip_tags(stripcslashes(trim($string))), 0, 50); // text output
		}
	}
}

if ( ! function_exists('displayDescription')){
	function displayDescription($description,$char=''){
                if($char == "") {
                   $char = $this->config->item('CHAR_LIMIT');
                }
                if (strlen($description) > $char) {
                    $description = strip_tags($description);
                    $stringCut = substr($description, 0, $char);
                    $crs_desc = substr($stringCut, 0, strrpos($stringCut, ' '));
                    return $crs_desc = $crs_desc. "...";
                } else {
                    return $crs_desc = $description;
                }
	}
}

function convertToObject($array) {
    $object = new stdClass();
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            $value = convertToObject($value);
        }
        $object->$key = $value;
    }
    return $object;
}