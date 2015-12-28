<?php
function randomkeys($length)
{
 $pattern='1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
 for($i=0;$i<$length;$i++)
 {
   $key .= $pattern{mt_rand(0,35)};    //生成php随机数
 }
 return $key;
}
function replaceHtmlAndJs($document)
{
 $document = trim($document);
 if (strlen($document) <= 0) {
  return $document;
 }
 $search = array ("'<script[^>]*?>.*?</script>'si",  // 去掉 javascript
               "'<[\/\!]*?[^<>]*?>'si",          // 去掉 HTML 标记
            "'([\r\n])[\s]+'",                // 去掉空白字符
         "'&(quot|#34);'i",                // 替换 HTML 实体
      "'&(amp|#38);'i",
      "'&(lt|#60);'i",
      "'&(gt|#62);'i",
      "'&(nbsp|#160);'i"
      );                    // 作为 PHP 代码运行 
 $replace = array ("",
       "",
       "\1",
       "\"",
       "&",
       "<",
       ">",
       " "
      ); 
 return @preg_replace ($search, $replace, $document);
} 
function strMax($str, $maxWidth, $encoding='gb2312'){
    $strlen = mb_strlen($str);

    $newStr = '';
    for($pos = 0, $currwidth = 0; $pos < $strlen; ++$pos ){
        $ch = mb_substr($str, $pos, 1, $encoding);
        if ($currwidth + mb_strwidth($ch, $encoding) > $maxWidth)
            break;

        $newStr .= $ch;
        $currwidth += mb_strwidth($ch, $encoding) > 1 ? 2 : 1;
    }

    return $newStr;
}

function message($C_alert,$I_goback='') {
    if(!empty($I_goback)) {
        echo "<script>alert('$C_alert');window.location.href='$I_goback';</script>";
    } else {
        echo "<script>alert('$C_alert');</script>";
    }
}

/**
* 判断下拉菜音的选取项
*
* 可以判断字符串一和字符串二是否相等.从而使相等的项目在下拉菜单中被选择
*
* @access public
* @param string $str1  要比较的字符串一
* @param string $str2  要比较的字符串二
* @return string       相等返回字符串"selected",否则返回空字符串
*/
function selected($str1,$str2) {
    if($str1==$str2) {
        return ' selected';
    }
    return '';
}


/**
* 截取中文部分字符串
*
* 截取指定字符串指定长度的函数,该函数可自动判定中英文,不会出现乱码
*
* @access public
* @param string    $str    要处理的字符串
* @param int       $strlen 要截取的长度默认为10
* @param string    $other  是否要加上省略号,默认会加上
* @return string
*/
function showtitle($str,$strlen=10,$other=true) {
    $j = 0;
    for($i=0;$i<$strlen;$i++)
      if(ord(substr($str,$i,1))>0xa0) $j++;
    if($j%2!=0) $strlen++;
    $rstr=substr($str,0,$strlen);
    if (strlen($str)>$strlen && $other) 
    return $rstr;
}


/////////////

function createdir($dir='')
{
        if (!is_dir($dir))
        {
            $temp = explode('/',$dir);
            $cur_dir = '';
            for($i=0;$i<count($temp);$i++)
            {
                $cur_dir .= $temp[$i].'/';
                if (!is_dir($cur_dir))
                {
                @mkdir($cur_dir,0777);
                }
            }
        }
}

////////////

function uh($str) 
{ 
$farr = array( 
"/\\s+/", //过滤多余的空白 
"/<(\\/?)(scrīpt|i?frame|style|html|body|title|link|meta|\\?|\\%)([^>]*?)>/isU", //过滤 <scrīpt 等可能引入恶意内容或恶意改变显示布局的代码,如果不需要插入flash等,还可以加入<object的过滤 
"/(<[^>]*)on[a-zA-Z]+\\s*=([^>]*>)/isU", //过滤javascrīpt的on事件 
); 
$tarr = array( 
" ", 
"＜\\\\1\\\\2\\\\3＞", //如果要直接清除不安全的标签，这里可以留空 
"\\\\1\\\\2", 
); 
$str = preg_replace( $farr,$tarr,$str); 
return $str; 
}

/////////

function daddslashes($string, $force = 0) {
 if(!$GLOBALS['magic_quotes_gpc'] || $force) {
  if(is_array($string)) {
   foreach($string as $key => $val) {
    $string[$key] = daddslashes($val, $force);
   }
  } else {
   $string = addslashes($string);
  }
 }
 return $string;
}

/////////.

function random($length) {
 $hash = '';
 $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
 $max = strlen($chars) - 1;
 mt_srand((double)microtime() * 1000000);
 for($i = 0; $i < $length; $i++) {
  $hash .= $chars[mt_rand(0, $max)];
 }
 return $hash;
}

//////

function wordscut($string, $length ,$sss=0) {
 if(strlen($string) > $length) {
               if($sss){
                      $length=$length - 3;
                      $addstr=' ...';
                }
  for($i = 0; $i < $length; $i++) {
   if(ord($string[$i]) > 127) {
    $wordscut .= $string[$i].$string[$i + 1];
    $i++;
   } else {
    $wordscut .= $string[$i];
   }
  }
  return $wordscut.$addstr;

 }
 return $string;
}

/////////

function sizecount($filesize) {
 if($filesize >= 1073741824) {
  $filesize = round($filesize / 1073741824 * 100) / 100 . ' G';
 } elseif($filesize >= 1048576) {
  $filesize = round($filesize / 1048576 * 100) / 100 . ' M';
 } elseif($filesize >= 1024) {
  $filesize = round($filesize / 1024 * 100) / 100 . ' K';
 } else {
  $filesize = $filesize . ' bytes';
 }
 return $filesize;
}

////////////////

function gotourl($message='',$url='')
{
 global $language;
    $html  ="<html><head>";
    if(!empty($url))
     $html .="<meta http-equiv='refresh' content=\"1;url='".$url."'\">";
    $html .="<link href='./html/style.css' type=text/css rel=stylesheet>";
    $html .="</head><body><br><br><br><br>";
    $html .="<table cellspacing='0' cellpadding='0' border='0' width='450' align='center'>";
 $html .="<tr><td bgcolor='#000000'>";
 $html .="<table border='0' cellspacing='1' cellpadding='4' width='100%'>";
 $html .="<tr class='m_title'>";
 $html .="<td>".$language['messagebox_title']."</td></tr>";
 $html .="<tr class='line_1'><td align='center' height='60'>";
 $html .="<br>".$message."<br><br>";
    if (!empty($url))
     $html .="[<a href=".$url." target=_self>".$language['messagebox_exp_1']."</a>]";
    else
     $html .="[<a href='#' onclick='history.go(-1)'>".$language['messagebox_exp_2']."</a>]";
    $html .="</td></tr></table></td></tr></table>";
 $html .="</body></html>";
 echo $html;
 exit;
}

//////////////

function sqldumptable($table, $startfrom = 0, $currsize = 0) {
 global $db, $multivol, $sizelimit, $startrow;

 $offset = 64;
 if(!$startfrom)
    {
  $tabledump = "DROP TABLE IF EXISTS $table;\n";

  $createtable = $db->query("SHOW CREATE TABLE $table");
  $create = $db->fetch_row($createtable);

  $tabledump .= $create[1].";\n\n";
  }

 $tabledumped = 0;
 $numrows = $offset;
 while(($multivol && $currsize + strlen($tabledump) < $sizelimit * 1000 && $numrows == $offset) || (!$multivol && !$tabledumped))
    {
  $tabledumped = 1;
  if($multivol)
        {
   $limitadd = "LIMIT $startfrom, $offset";
   $startfrom += $offset;
  }

  $rows = $db->query("SELECT * FROM $table $limitadd");
  $numfields = $db->num_fields($rows);
  $numrows = $db->num_rows($rows);
  while ($row = $db->fetch_row($rows))
        {
   $comma = "";
   $tabledump .= "INSERT INTO $table VALUES(";
   for($i = 0; $i < $numfields; $i++)
            {
    $tabledump .= $comma."'".mysql_escape_string($row[$i])."'";
    $comma = ",";
   }
   $tabledump .= ");\n";
  }
 }

 $startrow = $startfrom;
 $tabledump .= "\n";
 return $tabledump;
}

//////////

function splitsql($sql){
 $sql = str_replace("\r", "\n", $sql);
 $ret = array();
 $num = 0;
 $queriesarray = explode(";\n", trim($sql));
 unset($sql);
 foreach($queriesarray as $query) {
  $queries = explode("\n", trim($query));
  foreach($queries as $query) {
   $ret[$num] .= $query[0] == "#" ? NULL : $query;
  }
  $num++;
 }
 return($ret);
}

function getordernum()
{
  $ordernum = "";
  $ordernum = date('Y').date('m').date('d').date('h').date('s').random(3);
  return $ordernum;
}
function sendmob($url)
{
	if(function_exists('file_get_contents'))
	{
	$file_contents = file_get_contents($url);
	}
	else
	{
	$ch = curl_init();
	$timeout = 5;
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
	$file_contents = curl_exec($ch);
	curl_close($ch);
	}
return $file_contents;
}
function mobilenum()
{
  $onum = "";
  $onum = date('d').date('h').date('s').random(3);
  return $onum;
}


function lib_replace_end_tag($str)  

 {  

 if (empty($str)) return false;  

 $str = htmlspecialchars($str);  

 $str = str_replace( '/', "", $str);  

 $str = str_replace("\\", "", $str);  

 $str = str_replace("&gt", "", $str);  

 $str = str_replace("&lt", "", $str);  

 $str = str_replace("<SCRIPT>", "", $str);  

 $str = str_replace("</SCRIPT>", "", $str);  

 $str = str_replace("<script>", "", $str);  

 $str = str_replace("</script>", "", $str);  

 $str=str_replace("select","select",$str);  

 $str=str_replace("join","join",$str);  

 $str=str_replace("union","union",$str);  

 $str=str_replace("where","where",$str);  

 $str=str_replace("insert","insert",$str);  

 $str=str_replace("delete","delete",$str);  

 $str=str_replace("update","update",$str);  

 $str=str_replace("like","like",$str);  

 $str=str_replace("drop","drop",$str);  

 $str=str_replace("create","create",$str);  

 $str=str_replace("modify","modify",$str);  

 $str=str_replace("rename","rename",$str);  

 $str=str_replace("alter","alter",$str);  

 $str=str_replace("cas","cast",$str);  

 $str=str_replace("&","&",$str);  

 $str=str_replace(">",">",$str);  

 $str=str_replace("<","<",$str);  

 $str=str_replace(" ",chr(32),$str);  

 $str=str_replace(" ",chr(9),$str);  

 $str=str_replace("    ",chr(9),$str);  

 $str=str_replace("&",chr(34),$str);  

 $str=str_replace("'",chr(39),$str);  

 $str=str_replace("<br />",chr(13),$str);  

 $str=str_replace("''","'",$str);  

 $str=str_replace("css","'",$str);  

 $str=str_replace("CSS","'",$str);  

    

 return $str;  

   

 } 
 function cut_str($string, $sublen, $start = 0, $code = 'UTF-8') 
{ 
    if($code == 'UTF-8') 
    { 
        $pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/"; 
        preg_match_all($pa, $string, $t_string); 

        if(count($t_string[0]) - $start > $sublen) return join('', array_slice($t_string[0], $start, $sublen))."..."; 
        return join('', array_slice($t_string[0], $start, $sublen)); 
    } 
    else 
    { 
        $start = $start*2; 
        $sublen = $sublen*2; 
        $strlen = strlen($string); 
        $tmpstr = ''; 

        for($i=0; $i< $strlen; $i++) 
        { 
            if($i>=$start && $i< ($start+$sublen)) 
            { 
                if(ord(substr($string, $i, 1))>129) 
                { 
                    $tmpstr.= substr($string, $i, 2); 
                } 
                else 
                { 
                    $tmpstr.= substr($string, $i, 1); 
                } 
            } 
            if(ord(substr($string, $i, 1))>129) $i++; 
        } 
        if(strlen($tmpstr)< $strlen ) $tmpstr.= "..."; 
        return $tmpstr; 
    } 
} 

function download($FileName) {    
 if (file_exists($FileName)) 
 { 
 header('Content-Description: File Transfer'); 
 header('Content-Type: application/octet-stream'); 
 header('Content-Disposition: attachment; filename='.basename($FileName)); 
 header('Content-Transfer-Encoding: binary');
 header('Expires: 0');
 header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
 header('Pragma: public'); 
 header('Content-Length: ' . filesize($FileName)); 
 ob_clean(); 
 flush();
 readfile($FileName);
 exit;
 } 
 else
 {
	 echo "<script>history.back();</script>";
  }
}    
   
function loadFile($filename, $retbytes = true) {    
    $buffer = '';    
    $cnt = 0;    
    $handle = fopen ( $filename, 'rb' );    
    if ($handle === false) {    
        return false;    
     }    
    while ( ! feof ( $handle ) ) {    
        $buffer = fread ( $handle, 1024 * 1024 );    
        echo $buffer;    
         ob_flush ();    
        flush ();    
        if ($retbytes) {    
            $cnt += strlen ( $buffer );    
         }    
     }    
    $status = fclose ( $handle );    
    if ($retbytes && $status) {    
        return $cnt; // return num. bytes delivered like readfile() does.    
     }    
    return $status;    
}

//读取文件大小
function getFileSize($url){
$url = parse_url($url);
if($fp = fsockopen($url['host'],empty($url['port'])?80:$url['port'],$error)){
   fputs($fp,"GET ".(empty($url['path'])?'/':$url['path'])." HTTP/1.1\r\n");
   fputs($fp,"Host:$url[host]\r\n\r\n");
   while(!feof($fp)){
    $tmp = fgets($fp);
    if(trim($tmp) == ''){
     break;
    }elseif(preg_match('/Content-Length:(.*)/si',$tmp,$arr)){
     return trim($arr[1]);
    }
   }
   return null;
}else{
   return null;
}
}
 


?>