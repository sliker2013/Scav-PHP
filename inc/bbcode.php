<?php

function bbcode($bb){
	$php_header = '<div class="php">';
	$php_footer = '</div>';
	
 	// PHP Code zwischenspeichern
      $c = md5(time());
      preg_match_all("/\[php\](.*?)\[\/php\]/si", $bb, $results);
      for($i=0;$i<count($results[1]);$i++) {
          $bb = str_replace($results[1][$i], $c.$i.$c, $bb);
      }

	// Formatierung
	$search[] = '[b]';
	$search[] = '[/b]';
	$search[] = '[i]';
	$search[] = '[/i]';
	$search[] = '[u]';
	$search[] = '[/u]';
	$search[] = '[quote]';
	$search[] = '[/quote]';
	$search[] = '[left]';
	$search[] = '[/left]';
	$search[] = '[right]';
	$search[] = '[/right]';
	$search[] = '[center]';
	$search[] = '[/center]';
	$search[] = '[code]';
	$search[] = '[/code]';

	$replace[] = '<b>';
	$replace[] = '</b>';
	$replace[] = '<i>';
	$replace[] = '</i>';
	$replace[] = '<u>';
	$replace[] = '</u>';
	$replace[] = '<blockquote>';
	$replace[] = '</blockqoute>';
	$replace[] = '<div style="text-align: left">';
	$replace[] = '</div>';
	$replace[] = '<div style="text-align: right">';
	$replace[] = '</div>';
	$replace[] = '<div style="text-align: center">';
	$replace[] = '</div>';
	$replace[] = '<pre class="code">';
	$replace[] = '</pre>';

	$bb = str_replace($search, $replace, $bb);
	
	$search = array();
	$replace = array();
	
	$bb = preg_replace("/\[color=(.*)\](.*)\[\/color\]/Usi", "<span color=\"\\1\">\\2</span>", $bb);
	$bb = preg_replace("/\[email=(.*)\](.*)\[\/email\]/Usi", "<a href=\"mailto:\\1\">\\2</a>", $bb); 	
	$bb = preg_replace("/\[url=(.*)\](.*)\[\/url\]/Usi", "<a href=\"\\1\">\\2</a>", $bb); 	
	$bb = preg_replace("/\[img\](.*)\[\/img\]/Usi", "<img src=\"\\1\" alt=\"\" \>", $bb); 	

	$bb = nl2br($bb);

// PHP Code highlighten	
 for($i=0;$i<count($results[1]);$i++) {
          ob_start();
          highlight_string(trim(html_entity_decode($results[1][$i])));
          $ht = ob_get_contents();
          ob_end_clean();
          
          $all = $php_header.$ht.$php_footer;

   		  $bb = preg_replace("/\[php\]".$c.$i.$c."\[\/php\]/siU", $all, $bb);       
 }

// Video => parse Code
$video = array();

preg_match_all("/\[video\](.*)\[\/video\]/siU", $bb, $video);

foreach($video[0] as $key => $value){
    $bb = preg_replace('#'.preg_quote($value, '#').'#','[video]'.$key.'[/video]',$bb,1);
    $video[1][$key] = html_entity_decode($video[1][$key]);
} 

foreach($video[1] as $key => $value)
    $bb = preg_replace("/\[video\]".$key."\[\/video\]/siU", $value, $bb); 
    
	return $bb;
}

function get_bbcode($wo){ // BBCode Funktion

	$bb = '<div class="bbcode">';
	$bb.= '<img onclick="add(\'[b] [/b]\');" style="cursor:pointer" src="../img/icon/bold.png" alt="fett" title="fett" />';
	$bb.= '<img onclick="add(\'[i] [/i]\');" style="cursor:pointer" src="../img/icon/italic.png" alt="krusiv" title="krusiv" />';
	$bb.= '<img onclick="add(\'[u] [/u]\');" style="cursor:pointer" src="../img/icon/underline.png" alt="unterstrichen" title="unterstrichen" />';
		
	$bb.= '<img onclick="add(\'[left] [/left]\');" style="cursor:pointer" src="../img/icon/left.png" alt="links ausrichten" title="links ausrichten" />';
	$bb.= '<img onclick="add(\'[center] [/center]\');" style="cursor:pointer" src="../img/icon/center.png" alt="zentriert" title="zentriert" />';
	$bb.= '<img onclick="add(\'[right] [/right]\');" style="cursor:pointer" src="../img/icon/right.png" alt="rechts ausrichten" title="rechts ausrichten" />';

	$bb.= '<img onclick="add(\'[url=] [/url]\');" style="cursor:pointer" src="../img/icon/link.png" alt="Link einfuegen" title="Link einfuegen"/>';
	$bb.= '<img onclick="add(\'[email=] [/email]\');" style="cursor:pointer" src="../img/icon/email.png" alt="Email Adresse einfuegen" title="Email Adresse einfuegen" />';
	$bb.= '<img onclick="add(\'[img] [/img]\');" style="cursor:pointer" src="../img/icon/img.png" alt="Bild einfuegen" title="Bild einfuegen" />';

	if($wo != "comi"){
		$bb.= '<img onclick="add(\'[video] [/video]\');" style="cursor:pointer" src="../img/icon/video.png" alt="Video Einfuegen" title="Video Einfuegen" />';
	}
	
	$bb.= '<img onclick="add(\'[quote] [/quote]\');" style="cursor:pointer" src="../img/icon/zitat.png" alt="Zitat einfuegen" alt="Zitat einfuegen" />';
	$bb.= '<img onclick="add(\'[code] [/code]\');" style="cursor:pointer" src="../img/icon/code.png" alt="Code einfuegen" title="Code einfuegen" />';
	$bb.= '<img onclick="add(\'[php] [/php]\');" style="cursor:pointer" src="../img/icon/php.png" alt="PHP Code einfuegen" title="PHP Code einfuegen" />';
	
	$bb.= '</div>';
	
	echo $bb;	
}
?>