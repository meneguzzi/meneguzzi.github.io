<?php
// link to rss feed
//$rss = "http://share.xmarks.com/folder/rss/MczGPIKzIt"  ;
// load rss data
//$rssData = file_get_contents($rss) ;
// dump rss data into simplexml object
//$xml=simplexml_load_string($rssData) ;
// $xml=domxml_open_mem($rssData);

// regex pattern to match imgs
// $pattern = "/\<a href.*\\/" ;

// display imgs
// foreach($xml->channel->item as $img) {
//    $desc = $img->description ;
//    preg_match($pattern, $desc, $links) ;
//    echo $links[0] ;
// }

//echo $rssData;

// $html = $xml->html_dump_mem();
// //echo "<PRE>";
// if(!$html) {
// 	echo "Could not convert domdocument to HTML";
// } else {
// 	echo "<p>";
// 	echo $html;
// 	echo "</p>";
// }
//echo "</PRE>";
//echo $xml->saveXML();

/******************************************************************************************************************
   RSS PARSING FUNCTION
******************************************************************************************************************/
 
	//FUNCTION TO PARSE RSS IN PHP 4 OR PHP 4
	function parseRSS($url) { 
 
	//PARSE RSS FEED
        $feedeed = implode('', file($url));
        $parser = xml_parser_create("UTF-8");
       xml_parse_into_struct($parser, $feedeed, $valueals, $index);
        xml_parser_free($parser);
 
	//CONSTRUCT ARRAY
        foreach($valueals as $keyey => $valueal){
            if($valueal['type'] != 'cdata') {
                $item[$keyey] = $valueal;
			}
        }
 
        $i = 0;
 
        foreach($item as $key => $value){
 
            if($value['type'] == 'open') {
 
                $i++;
                $itemame[$i] = $value['tag'];
 
            } elseif($value['type'] == 'close') {
 
                $feed = $values[$i];
                $item = $itemame[$i];
                $i--;
 
                if(count($values[$i])>1){
                    $values[$i][$item][] = $feed;
                } else {
                    $values[$i][$item] = $feed;
                }
 
            } else {
                $values[$i][$value['tag']] = $value['value'];  
            }
        }
 
	//RETURN ARRAY VALUES
        return $values[0];
	} 
 
 
	/******************************************************************************************************************
	  SAMPLE USAGE OF FUNCTION
	******************************************************************************************************************/
 
	//PARSE THE RSS FEED INTO ARRAY
	$rss = htmlspecialchars($_REQUEST['rss']);
	//echo "value of parameter rss=".$rss;
	$xml = parseRSS($rss);
 
	//SAMPLE USAGE OF 
	foreach($xml['RSS']['CHANNEL']['ITEM'] as $item) {
			$str = "<p class=\"content\"><a href=\"{$item['LINK']}\" target=\"_blank\" class=\"indexBoxNews\">{$item['TITLE']}{$link}</a></p>";
	        echo(mb_convert_encoding($str,"ISO-8859-1","UTF-8"));
	}


?>