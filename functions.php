<?php
//global $curtime;
global $fajr;
global $dhuhr;
global $asr;
global $maghrib;
global $isha;
global $curtime;
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}


//$actual_ip=get_client_ip();
//$json_geo = 'http://ip-api.com/json/'.$actual_ip.'';
//$jsong_data = file_get_contents($json_geo);
//$obj_geo = json_decode($jsong_data,true);
//$timezone=$obj_geo['timezone'];
//date_default_timezone_set($timezone);
//$latitude=$obj_geo['lat'];
//$longitude=$obj_geo['lon'];
//$timestamp=time();
//$prayer_api='http://api.aladhan.com/timings/'.$timestamp.'?latitude='.$latitude.'&longitude='.$longitude.'&timezonestring='.$timezone.'&method=3';
//
//$jsong_pdata = file_get_contents($prayer_api);
//$obj_prayer = json_decode($jsong_pdata,true);

//var_dump($obj_prayer);
$curtime=date('H:i');
$fajr=$obj_prayer['data']['timings']['Fajr'];
$dhuhr=$obj_prayer['data']['timings']['Dhuhr'];
$asr=$obj_prayer['data']['timings']['Asr'];
$maghrib=$obj_prayer['data']['timings']['Maghrib'];
$isha=$obj_prayer['data']['timings']['Isha'];




function smart_title($smtitle)
{
     $smtitle=str_replace('/', '_', $smtitle);
	 $smtitle=str_replace('_', '-', $smtitle);
     echo strtolower($smtitle);
}

function seo_title($smtitle)
{
     $smtitle=str_replace('/', '_', $smtitle);
	 $smtitle=str_replace('_', '-', $smtitle);
	 $smtitle=str_replace(' ', '-', $smtitle);
     return strtolower($smtitle);
}

function newsMenu()
{   global $base_url_ur;
	$sql_news=db_query("SELECT * FROM {newscat} WHERE type='news' AND status='yes' ORDER BY position ASC");
	foreach($sql_news as $res_news)
	{
		  echo $menulist='<li><a href="'.$base_url_ur.'/news/'.$res_news->id.'/'.$res_news->type.'/news'.seo_title($res_news->title_en).'.html">'.$res_news->title.'</a></li>';
		
	}
}


function questMenu()
{   global $base_url_ur;
	$sql_news=db_query("SELECT * FROM {questcat} WHERE type='questions' AND status='yes' ORDER BY position ASC");
	foreach($sql_news as $res_news)
	{
		  echo $menulist='<li><a href="'.$base_url_ur.'/questions/'.$res_news->id.'/'.$res_news->type.'/questions'.seo_title($res_news->title_en).'.html">'.$res_news->title.'</a></li>';
		
	}
}

function ismMenu()
{   global $base_url_ur;
	$sql_news=db_query("SELECT * FROM {ismcat} WHERE type='ismcat' AND status='yes' ORDER BY position ASC");
	foreach($sql_news as $res_news)
	{
		  echo $menulist='<li><a href="'.$base_url_ur.'/islamic-society/'.$res_news->id.'/'.$res_news->type.'/ismcat'.seo_title($res_news->title_en).'.html">'.$res_news->title.'</a></li>';
		
	}
}

function eduMenu()
{   global $base_url_ur;
	$sql_news=db_query("SELECT * FROM {educat} WHERE type='education' AND status='yes' ORDER BY position ASC");
	foreach($sql_news as $res_news)
	{
		  echo $menulist='<li><a href="'.$base_url_ur.'/education/'.$res_news->id.'/'.$res_news->type.'/education'.seo_title($res_news->title_en).'.html">'.$res_news->title.'</a></li>';
		
	}
}

function dateMenu()
{   global $base_url_ur;
	$sql_news=db_query("SELECT * FROM {datecat} WHERE type='datecat' AND status='yes' ORDER BY position ASC");
	foreach($sql_news as $res_news)
	{
		  echo $menulist='<li><a href="'.$base_url_ur.'/date-category/'.$res_news->id.'/'.$res_news->type.'/datecat'.seo_title($res_news->title_en).'.html">'.$res_news->title.'</a></li>';
		
	}
}

function urduMenu()
{   global $base_url_ur;
	$sql_news=db_query("SELECT * FROM {urducat} WHERE type='urimp' AND status='yes' ORDER BY position ASC");
	foreach($sql_news as $res_news)
	{
		  echo $menulist='<li><a href="'.$base_url_ur.'/urdu-importance/'.$res_news->id.'/'.$res_news->type.'/urimp'.seo_title($res_news->title_en).'.html">'.$res_news->title.'</a></li>';
		
	}
}

function impMenu()
{   global $base_url_ur;
	$sql_news=db_query("SELECT * FROM {impcat} WHERE type='impcat' AND status='yes' ORDER BY position ASC");
	foreach($sql_news as $res_news)
	{
		  echo $menulist='<li><a href="'.$base_url_ur.'/importance/'.$res_news->id.'/'.$res_news->type.'/impcat'.seo_title($res_news->title_en).'.html">'.$res_news->title.'</a></li>';
		
	}
}

function newsCatname($id)
{   global $base_url;
	$sql_news=db_query("SELECT * FROM {newscat} WHERE id='$id'")->fetch();
	
		echo $sql_news->title;
}

function essaysCatname($id)
{   global $base_url;
	$sql_news=db_query("SELECT * FROM {essaycat} WHERE id='$id'")->fetch();
	
		echo $sql_news->title;
}



function mainTitle($catid,$type)
{   global $base_url;
	 $catid=$catid;
	  $type=$type;
	  
	  if($type=='news')
	  {
	   $sql_news=db_query("SELECT * FROM {newscat} WHERE id='$catid' AND type='news'")->fetch();
	    echo $sql_news->title;
	  }else if($type=='questions')
	  {
	   $sql_news=db_query("SELECT * FROM {questcat} WHERE id='$catid' AND type='questions'")->fetch();
	    echo $sql_news->title;
	  }else if($type=='ismcat')
	  {
	   $sql_news=db_query("SELECT * FROM {ismcat} WHERE id='$catid' AND type='ismcat'")->fetch();
	    echo $sql_news->title;
	  }else if($type=='educat')
	  {
	   $sql_news=db_query("SELECT * FROM {educat} WHERE id='$catid' AND type='education'")->fetch();
	    echo $sql_news->title;
	  }else if($type=='datecat')
	  {
	   $sql_news=db_query("SELECT * FROM {datecat} WHERE id='$catid' AND type='datecat'")->fetch();
	    echo $sql_news->title;
	  }
	  else if($type=='urimp')
	  {
	   $sql_news=db_query("SELECT * FROM {urducat} WHERE id='$catid' AND type='urimp'")->fetch();
	    echo $sql_news->title;
	  }else if($type=='impcat')
	  {
	   $sql_news=db_query("SELECT * FROM {impcat} WHERE id='$catid' AND type='impcat'")->fetch();
	    echo $sql_news->title;
	  }
}




function bCrumbs($id,$type)
{   global $base_url_ur;
	 $id=$id;
	  $type=$type;
	  
	  if($type=='news')
	  {
		   $sql_conent=db_query("SELECT * FROM {content} WHERE id='$id' AND type='news'")->fetch();
	       $catid=$sql_conent->catid;  
	      $sql_news=db_query("SELECT * FROM {newscat} WHERE id='$catid' AND type='news'")->fetch();
		  echo "<a href='".$base_url_ur."/news/".$sql_news->id."/".$type."/news".seo_title($res_news->title_en).".html'>".$sql_news->title."</a>";
		
		
		
	  }else if($type=='questions')
	  {
		$sql_conent=db_query("SELECT * FROM {content} WHERE id='$id' AND type='questions'")->fetch();
	       $catid=$sql_conent->catid;  
	      $sql_news=db_query("SELECT * FROM {questcat} WHERE id='$catid' AND type='questions'")->fetch();
		  echo "<a href='".$base_url_ur."/questions/".$sql_news->id."/".$type."/questions".seo_title($res_news->title_en).".html'>".$sql_news->title."</a>";
		
		
	  }else if($type=='ismcat')
	  {
		$sql_conent=db_query("SELECT * FROM {content} WHERE id='$id' AND type='ismcat'")->fetch();
	       $catid=$sql_conent->catid;  
	      $sql_news=db_query("SELECT * FROM {ismcat} WHERE id='$catid' AND type='ismcat'")->fetch();
		  echo "<a href='".$base_url_ur."/islamic-society/".$sql_news->id."/".$type."/ismcat".seo_title($res_news->title_en).".html'>".$sql_news->title."</a>";
		
		
	  }else if($type=='educat')
	  {
		$sql_conent=db_query("SELECT * FROM {content} WHERE id='$id' AND type='education'")->fetch();
	       $catid=$sql_conent->catid;  
	      $sql_news=db_query("SELECT * FROM {educat} WHERE id='$catid' AND type='education'")->fetch();
		  echo "<a href='".$base_url_ur."/education/".$sql_news->id."/".$type."/education".seo_title($res_news->title_en).".html'>".$sql_news->title."</a>";
		
		
	  }else if($type=='datecat')
	  {
		$sql_conent=db_query("SELECT * FROM {content} WHERE id='$id' AND type='datecat'")->fetch();
	       $catid=$sql_conent->catid;  
	      $sql_news=db_query("SELECT * FROM {datecat} WHERE id='$catid' AND type='datecat'")->fetch();
		  echo "<a href='".$base_url_ur."/date-category/".$sql_news->id."/".$type."/datecat".seo_title($res_news->title_en).".html'>".$sql_news->title."</a>";
		
		
	  }
	  else if($type=='urimp')
	  {
		  $sql_conent=db_query("SELECT * FROM {content} WHERE id='$id' AND type='urimp'")->fetch();
	       $catid=$sql_conent->catid;  
	      $sql_news=db_query("SELECT * FROM {urducat} WHERE id='$catid' AND type='urimp'")->fetch();
		  echo "<a href='".$base_url_ur."/urdu-importance/".$sql_news->id."/".$type."/urimp".seo_title($res_news->title_en).".html'>".$sql_news->title."</a>";

		
		
	  }else if($type=='impcat')
	  {
		 $sql_conent=db_query("SELECT * FROM {content} WHERE id='$id' AND type='impcat'")->fetch();
	       $catid=$sql_conent->catid;  
	      $sql_news=db_query("SELECT * FROM {impcat} WHERE id='$catid' AND type='impcat'")->fetch();
		  echo "<a href='".$base_url_ur."/importance/".$sql_news->id."/".$type."/impcat".seo_title($res_news->title_en).".html'>".$sql_news->title."</a>";
		
		
		
	  }
}



global $base_url_ur;
$fajrsec = strtotime($fajr) - time();
header("Refresh: $fajrsec; url=$base_url_ur");
$dhuhrsec = strtotime($dhuhr) - time();
header("Refresh: $dhuhrsec; url=$base_url_ur");
$asrsec = strtotime($asr) - time();
header("Refresh: $asrsec; url=$base_url_ur");
$maghribsec = strtotime($maghrib) - time();
header("Refresh: $maghribsec; url=$base_url_ur");
$ishasec = strtotime($isha) - time();
header("Refresh: $ishasec; url=$base_url_ur");

test

?>