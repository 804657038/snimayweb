<?php

/**
  +----------------------------------------------------------
 * 原样输出print_r的内容
  +----------------------------------------------------------
 * @param string    $content   待print_r的内容
  +----------------------------------------------------------
 */
function pre($content) {
    echo "<pre>";
    print_r($content);
    echo "</pre>";
}

/**
  +----------------------------------------------------------
 * 加密密码
  +----------------------------------------------------------
 * @param string    $data   待加密字符串
  +----------------------------------------------------------
 * @return string 返回加密后的字符串
 */
function encrypt($data) {
    return md5(C("AUTH_CODE") . md5($data));
}

/**
  +----------------------------------------------------------
 * 将一个字符串转换成数组，支持中文
  +----------------------------------------------------------
 * @param string    $string   待转换成数组的字符串
  +----------------------------------------------------------
 * @return string   转换后的数组
  +----------------------------------------------------------
 */
function strToArray($string) {
    $strlen = mb_strlen($string);
    while ($strlen) {
        $array[] = mb_substr($string, 0, 1, "utf8");
        $string = mb_substr($string, 1, $strlen, "utf8");
        $strlen = mb_strlen($string);
    }
    return $array;
}

/**
  +----------------------------------------------------------
 * 生成随机字符串
  +----------------------------------------------------------
 * @param int       $length  要生成的随机字符串长度
 * @param string    $type    随机码类型：0，数字+大写字母；1，数字；2，小写字母；3，大写字母；4，特殊字符；-1，数字+大小写字母+特殊字符
  +----------------------------------------------------------
 * @return string
  +----------------------------------------------------------
 */
function randCode($length = 5, $type = 0) {
    $arr = array(1 => "0123456789", 2 => "abcdefghijklmnopqrstuvwxyz", 3 => "ABCDEFGHIJKLMNOPQRSTUVWXYZ", 4 => "~@#$%^&*(){}[]|");
    if ($type == 0) {
        array_pop($arr);
        $string = implode("", $arr);
    } else if ($type == "-1") {
        $string = implode("", $arr);
    } else {
        $string = $arr[$type];
    }
    $count = strlen($string) - 1;
    for ($i = 0; $i < $length; $i++) {
        $str[$i] = $string[rand(0, $count)];
        $code .= $str[$i];
    }
    return $code;
}

/**
  +-----------------------------------------------------------------------------------------
 * 删除目录及目录下所有文件或删除指定文件
  +-----------------------------------------------------------------------------------------
 * @param str $path   待删除目录路径
 * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
  +-----------------------------------------------------------------------------------------
 * @return bool 返回删除状态
  +-----------------------------------------------------------------------------------------
 */
function delDirAndFile($path, $delDir = FALSE) {
    $handle = opendir($path);
    if ($handle) {
        while (false !== ( $item = readdir($handle) )) {
            if ($item != "." && $item != "..")
                is_dir("$path/$item") ? delDirAndFile("$path/$item", $delDir) : unlink("$path/$item");
        }
        closedir($handle);
        if ($delDir)
            return rmdir($path);
    }else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return FALSE;
        }
    }
}

/**
  +----------------------------------------------------------
 * 将一个字符串部分字符用*替代隐藏
  +----------------------------------------------------------
 * @param string    $string   待转换的字符串
 * @param int       $bengin   起始位置，从0开始计数，当$type=4时，表示左侧保留长度
 * @param int       $len      需要转换成*的字符个数，当$type=4时，表示右侧保留长度
 * @param int       $type     转换类型：0，从左向右隐藏；1，从右向左隐藏；2，从指定字符位置分割前由右向左隐藏；3，从指定字符位置分割后由左向右隐藏；4，保留首末指定字符串
 * @param string    $glue     分割符
  +----------------------------------------------------------
 * @return string   处理后的字符串
  +----------------------------------------------------------
 */
function hideStr($string, $bengin = 0, $len = 4, $type = 0, $glue = "@") {
    if (empty($string))
        return false;
    $array = array();
    if ($type == 0 || $type == 1 || $type == 4) {
        $strlen = $length = mb_strlen($string);
        while ($strlen) {
            $array[] = mb_substr($string, 0, 1, "utf8");
            $string = mb_substr($string, 1, $strlen, "utf8");
            $strlen = mb_strlen($string);
        }
    }
    switch ($type) {
        case 1:
            $array = array_reverse($array);
            for ($i = $bengin; $i < ($bengin + $len); $i++) {
                if (isset($array[$i]))
                    $array[$i] = "*";
            }
            $string = implode("", array_reverse($array));
            break;
        case 2:
            $array = explode($glue, $string);
            $array[0] = hideStr($array[0], $bengin, $len, 1);
            $string = implode($glue, $array);
            break;
        case 3:
            $array = explode($glue, $string);
            $array[1] = hideStr($array[1], $bengin, $len, 0);
            $string = implode($glue, $array);
            break;
        case 4:
            $left = $bengin;
            $right = $len;
            $tem = array();
            for ($i = 0; $i < ($length - $right); $i++) {
                if (isset($array[$i]))
                    $tem[] = $i >= $left ? "*" : $array[$i];
            }
            $array = array_chunk(array_reverse($array), $right);
            $array = array_reverse($array[0]);
            for ($i = 0; $i < $right; $i++) {
                $tem[] = $array[$i];
            }
            $string = implode("", $tem);
            break;
        default:
            for ($i = $bengin; $i < ($bengin + $len); $i++) {
                if (isset($array[$i]))
                    $array[$i] = "*";
            }
            $string = implode("", $array);
            break;
    }
    return $string;
}

/**
  +----------------------------------------------------------
 * 功能：检测一个目录是否存在，不存在则创建它
  +----------------------------------------------------------
 * @param string    $path      待检测的目录
  +----------------------------------------------------------
 * @return boolean
  +----------------------------------------------------------
 */
function makeDir($path) {
    return is_dir($path) or (makeDir(dirname($path)) and @mkdir($path, 0777));
}

/**
  +----------------------------------------------------------
 * 功能：检测一个字符串是否是邮件地址格式
  +----------------------------------------------------------
 * @param string $value    待检测字符串
  +----------------------------------------------------------
 * @return boolean
  +----------------------------------------------------------
 */
function is_email($value) {
    return preg_match("/^[0-9a-zA-Z]+(?:[\_\.\-][a-z0-9\-]+)*@[a-zA-Z0-9]+(?:[-.][a-zA-Z0-9]+)*\.[a-zA-Z]+$/i", $value);
}

/**
  +----------------------------------------------------------
 * 功能：系统邮件发送函数
  +----------------------------------------------------------
 * @param string $to    接收邮件者邮箱
 * @param string $name  接收邮件者名称
 * @param string $subject 邮件主题
 * @param string $body    邮件内容
 * @param string $attachment 附件列表
  +----------------------------------------------------------
 * @return boolean
  +----------------------------------------------------------
 */
function send_mail($to, $name, $subject = '', $body = '', $attachment = null, $config = '') {
    $config = is_array($config) ? $config : C('SYSTEM_EMAIL');
    import('PHPMailer.phpmailer', VENDOR_PATH);         //从PHPMailer目录导class.phpmailer.php类文件
    $mail = new PHPMailer();                           //PHPMailer对象
    $mail->CharSet = 'UTF-8';                         //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
    $mail->IsSMTP();                                   // 设定使用SMTP服务
//    $mail->IsHTML(true);
    $mail->SMTPDebug = 0;                             // 关闭SMTP调试功能 1 = errors and messages2 = messages only
    $mail->SMTPAuth = true;                           // 启用 SMTP 验证功能
    if ($config['smtp_port'] == 465)
        $mail->SMTPSecure = 'ssl';                    // 使用安全协议
    $mail->Host = $config['smtp_host'];                // SMTP 服务器
    $mail->Port = $config['smtp_port'];                // SMTP服务器的端口号
    $mail->Username = $config['smtp_user'];           // SMTP服务器用户名
    $mail->Password = $config['smtp_pass'];           // SMTP服务器密码
    $mail->SetFrom($config['from_email'], $config['from_name']);
    $replyEmail = $config['reply_email'] ? $config['reply_email'] : $config['reply_email'];
    $replyName = $config['reply_name'] ? $config['reply_name'] : $config['reply_name'];
    $mail->AddReplyTo($replyEmail, $replyName);
    $mail->Subject = $subject;
    $mail->MsgHTML($body);
    $mail->AddAddress($to, $name);
    if (is_array($attachment)) { // 添加附件
        foreach ($attachment as $file) {
            if (is_array($file)) {
                is_file($file['path']) && $mail->AddAttachment($file['path'], $file['name']);
            } else {
                is_file($file) && $mail->AddAttachment($file);
            }
        }
    } else {
        is_file($attachment) && $mail->AddAttachment($attachment);
    }
    return $mail->Send() ? true : $mail->ErrorInfo;
}

/**
  +----------------------------------------------------------
 * 功能：剔除危险的字符信息
  +----------------------------------------------------------
 * @param string $val
  +----------------------------------------------------------
 * @return string 返回处理后的字符串
  +----------------------------------------------------------
 */
function remove_xss($val) {
    // remove all non-printable characters. CR(0a) and LF(0b) and TAB(9) are allowed
    // this prevents some character re-spacing such as <java\0script>
    // note that you have to handle splits with \n, \r, and \t later since they *are* allowed in some inputs
    $val = preg_replace('/([\x00-\x08,\x0b-\x0c,\x0e-\x19])/', '', $val);

    // straight replacements, the user should never need these since they're normal characters
    // this prevents like <IMG SRC=@avascript:alert('XSS')>
    $search = 'abcdefghijklmnopqrstuvwxyz';
    $search .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $search .= '1234567890!@#$%^&*()';
    $search .= '~`";:?+/={}[]-_|\'\\';
    for ($i = 0; $i < strlen($search); $i++) {
        // ;? matches the ;, which is optional
        // 0{0,7} matches any padded zeros, which are optional and go up to 8 chars
        // @ @ search for the hex values
        $val = preg_replace('/(&#[xX]0{0,8}' . dechex(ord($search[$i])) . ';?)/i', $search[$i], $val); // with a ;
        // @ @ 0{0,7} matches '0' zero to seven times
        $val = preg_replace('/(&#0{0,8}' . ord($search[$i]) . ';?)/', $search[$i], $val); // with a ;
    }

    // now the only remaining whitespace attacks are \t, \n, and \r
    $ra1 = array('javascript', 'vbscript', 'expression', 'applet', 'meta', 'xml', 'blink', 'link', 'style', 'script', 'embed', 'object', 'iframe', 'frame', 'frameset', 'ilayer', 'layer', 'bgsound', 'title', 'base');
    $ra2 = array('onabort', 'onactivate', 'onafterprint', 'onafterupdate', 'onbeforeactivate', 'onbeforecopy', 'onbeforecut', 'onbeforedeactivate', 'onbeforeeditfocus', 'onbeforepaste', 'onbeforeprint', 'onbeforeunload', 'onbeforeupdate', 'onblur', 'onbounce', 'oncellchange', 'onchange', 'onclick', 'oncontextmenu', 'oncontrolselect', 'oncopy', 'oncut', 'ondataavailable', 'ondatasetchanged', 'ondatasetcomplete', 'ondblclick', 'ondeactivate', 'ondrag', 'ondragend', 'ondragenter', 'ondragleave', 'ondragover', 'ondragstart', 'ondrop', 'onerror', 'onerrorupdate', 'onfilterchange', 'onfinish', 'onfocus', 'onfocusin', 'onfocusout', 'onhelp', 'onkeydown', 'onkeypress', 'onkeyup', 'onlayoutcomplete', 'onload', 'onlosecapture', 'onmousedown', 'onmouseenter', 'onmouseleave', 'onmousemove', 'onmouseout', 'onmouseover', 'onmouseup', 'onmousewheel', 'onmove', 'onmoveend', 'onmovestart', 'onpaste', 'onpropertychange', 'onreadystatechange', 'onreset', 'onresize', 'onresizeend', 'onresizestart', 'onrowenter', 'onrowexit', 'onrowsdelete', 'onrowsinserted', 'onscroll', 'onselect', 'onselectionchange', 'onselectstart', 'onstart', 'onstop', 'onsubmit', 'onunload');
    $ra = array_merge($ra1, $ra2);

    $found = true; // keep replacing as long as the previous round replaced something
    while ($found == true) {
        $val_before = $val;
        for ($i = 0; $i < sizeof($ra); $i++) {
            $pattern = '/';
            for ($j = 0; $j < strlen($ra[$i]); $j++) {
                if ($j > 0) {
                    $pattern .= '(';
                    $pattern .= '(&#[xX]0{0,8}([9ab]);)';
                    $pattern .= '|';
                    $pattern .= '|(&#0{0,8}([9|10|13]);)';
                    $pattern .= ')*';
                }
                $pattern .= $ra[$i][$j];
            }
            $pattern .= '/i';
            $replacement = substr($ra[$i], 0, 2) . '<x>' . substr($ra[$i], 2); // add in <> to nerf the tag
            $val = preg_replace($pattern, $replacement, $val); // filter out the hex tags
            if ($val_before == $val) {
                // no replacements were made, so exit the loop
                $found = false;
            }
        }
    }
    return $val;
}

/**
  +----------------------------------------------------------
 * 功能：计算文件大小
  +----------------------------------------------------------
 * @param int $bytes
  +----------------------------------------------------------
 * @return string 转换后的字符串
  +----------------------------------------------------------
 */
function byteFormat($bytes) {
    $sizetext = array(" B", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
    return round($bytes / pow(1024, ($i = floor(log($bytes, 1024)))), 2) . $sizetext[$i];
}

function checkCharset($string, $charset = "UTF-8") {
    if ($string == '')
        return;
    $check = preg_match('%^(?:
                                [\x09\x0A\x0D\x20-\x7E] # ASCII
                                | [\xC2-\xDF][\x80-\xBF] # non-overlong 2-byte
                                | \xE0[\xA0-\xBF][\x80-\xBF] # excluding overlongs
                                | [\xE1-\xEC\xEE\xEF][\x80-\xBF]{2} # straight 3-byte
                                | \xED[\x80-\x9F][\x80-\xBF] # excluding surrogates
                                | \xF0[\x90-\xBF][\x80-\xBF]{2} # planes 1-3
                                | [\xF1-\xF3][\x80-\xBF]{3} # planes 4-15
                                | \xF4[\x80-\x8F][\x80-\xBF]{2} # plane 16
                                )*$%xs', $string);

    return $charset == "UTF-8" ? ($check == 1 ? $string : iconv('gb2312', 'utf-8', $string)) : ($check == 0 ? $string : iconv('utf-8', 'gb2312', $string));
}





//Create By TuJia @2014

/*删除文章内容图片（也就是删除编辑器上传的图片）*/
function remove_content_img($content){
    //匹配并删除图片
    $imgreg = "/<img.*src=\"([^\"]+)\"/U";

    $matches = array();
    preg_match_all($imgreg, $content, $matches);

    foreach($matches[1] as $img_url){
        if(strpos($img_url, 'emoticons')===false){
            $web_root = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            $filepath = str_replace($web_root,'',$img_url);
            if($filepath == $img_url) $filepath = substr($img_url, 1);
            @unlink($filepath);
            $filedir  = dirname($filepath);
            $files = scandir($filedir);
            if(count($files)<=2)@rmdir($filedir);//如果只剩下./和../,就删除文件夹
        }
    }
    unset($matches);
}

/*截取字符串(中文截取)*/
function mySubstr($str,$len=20,$suffix='...',$charset='UTF-8'){
    $substr = mb_substr($str,0,$len,$charset);
    if($substr != $str)$substr .= $suffix;
    return $substr;
}

/*截取字符串2(断点截取)*/
function mySubstr2($str,$delimiter='('){
    $offset = strpos($str,$delimiter);
    $substr = $offset? substr($str, 0, $offset) : $str;
    return $substr;
}

//追加地址参数(模版直接输出)
function aup($name,$value){
    $arr = $_GET;
    unset($arr['_URL_']);
    unset($arr[$name]);
    $arr[$name] = $value;
    echo U(MODULE_NAME.'/'.ACTION_NAME,$arr);
}

//从二维数组里返回一个一维数组
function get_array_column($arr, $column=''){
  $return = array();
  foreach($arr as $k=>$v){
    if($column){
        foreach($v as $kk=>$vv){
            if($kk==$column){
                $return[] = $vv;
            }
        }
    }else{
        $return = array_merge($return, $v);
    }
  }
  return $return;
}

//价格格式
function price_format($price){
    $str = strrev($price);
    $str = chunk_split($str,3,',');
    $str = substr($str, 0, -1);
    $new_price = strrev($str);
    return $new_price;
}

//通过IP查地区信息
function get_area_by_ip($ip){
    $urlreq     ='http://opendata.baidu.com/api.php?query='.$ip.'&co=&resource_id=6006&t=1398217370181&ie=utf8&oe=gbk&cb=op_aladdin_callback&format=json&tn=baidu&cb=jQuery110207946170251816511_1398217192726&_=139821719274';
    $info       = @file_get_contents($urlreq);
    $info       = iconv('gbk','utf-8',$info);
    $reg        = "/location\":\"([^\"]+)\"/U";
    preg_match($reg,$info,$matches);
    $location   = $matches[1];
    $location   = explode(" ", $location);
    $city       = $location[0];
    return $city;
}


//获取客户端IP
function get_ip(){
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $cip = $_SERVER["HTTP_CLIENT_IP"];
    }
    else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
        $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    }
    else if(!empty($_SERVER["REMOTE_ADDR"])){
        $cip = $_SERVER["REMOTE_ADDR"];
    }
    else{
        $cip = '';
    }
    preg_match("/[\d\.]{7,15}/", $cip, $cips);
    $cip = isset($cips[0]) ? $cips[0] : 'unknown';
    unset($cips);
    return $cip;
}


//验证手机号码格式
function is_phone($phone){
    $chars = "/^13[0-9]{1}[0-9]{8}$|15[0-9]{1}[0-9]{8}$|18[0-9]{1}[0-9]{8}$|17[7]{1}[0-9]{8}$/";
    if (preg_match($chars, $phone)){
        return true;
    }
    return false;
}

//验证固话格式
function is_tel($tel){
    $chars = "/^([0-9]{3,4}-)?[0-9]{7,8}$/";
    if (preg_match($chars, $tel)){
        return true;
    }
    return false;
}

//QQ格式验证
function is_qq($qq){
    $chars = "/^[1-9]{1}[0-9]{4,8}$/";
    if (preg_match($chars, $qq)){
        return true;
    }
    return false;
}


//返回带前缀的表名
function table($table_name){
    return C('db_prefix').$table_name;
}


//处理表单的内容（转义和去除换行）
function handle_content($content){
    $content = str_replace("\r\n", '', $content);
    return addslashes($content);
}



/**
 * 冒泡排序
 * @ $arr   需要排序的数组
 * @ $key   用这个键来排序
 */
function bubbleSort($arr,$key,$desc=true){
    $count = count($arr);
    for($i=0; $i<$count; $i++){
        for($j=$i+1; $j<$count; $j++){
            if($desc){
                if($arr[$j][$key]>$arr[$i][$key]){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }else{
                if($arr[$j][$key]<$arr[$i][$key]){
                    $temp = $arr[$i];
                    $arr[$i] = $arr[$j];
                    $arr[$j] = $temp;
                }
            }
        }
    }
    return $arr;
}



/**
 * http请求
 * @ $url    请求的地址
 * @ $data   发送的参数
 */
function https_request($url, $data = null){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
    if (!empty($data)){
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    }
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($curl);
    curl_close($curl);
    return $output;
}

  
/**
  +----------------------------------------------------------
 * 文件上传
  +----------------------------------------------------------
 */
function upload($allowExts=array('jpg', 'gif', 'png', 'jpeg'),$savePath,$saveRule,$thumb=false,$thumbPath,$thumbMaxWidth,$thumbMaxHeight,$thumbPrefix){
    import("ORG.Util.UploadFile");
    import("ORG.Util.File");
    $upload = new UploadFile(); // 实例化上传类 
    if(!is_dir($savePath)){
        File::make_dir('./'.$savePath);
    }
    $smPath = explode(',',$thumbPath);
    foreach($smPath as $key => $value){
        if(!is_dir($value)){
            File::make_dir('./'.$value);
        }
    }
    
    $upload->maxSize = 3145728 ; // 设置附件上传大小 
    $upload->allowExts = $allowExts; // 设置附件上传类型 
    $upload->savePath = $savePath; // 设置附件上传目录 
    $upload->saveRule = $saveRule; // 上传文件的保存规则 
    $upload->thumb = $thumb; // 是否需要对图片文件进行缩略图处理，默认为false       
    $upload->thumbPath = $thumbPath;  //缩略图的保存路径，留空的话取文件上传目录本身
    $upload->thumbMaxWidth=$thumbMaxWidth;   //缩略图的最大宽度，多个使用逗号分隔
    $upload->thumbMaxHeight=$thumbMaxHeight;   //缩略图的最大高度，多个使用逗号分隔
    $upload->thumbPrefix=$thumbPrefix;   //缩略图的文件前缀，默认为thumb_  （如果你设置了多个缩略图大小的话，请在此设置多个前缀）
    // $upload->autoSub=true;   //是否使用子目录保存上传文件
    // $upload->subType='date'; 
    
    
    
    if(!$upload->upload()) { // 上传错误 提示错误信息 
        $this->error($upload->getErrorMsg());
    }else{ // 上传成功 获取上传文件信息 
        $info = $upload->getUploadFileInfo(); 
    }
    
    return $info;
}


/**
 * Create By TuJia 
 */
//获取地区信息
function get_area($myip = null){
    import("ORG.Net.IpLocation");
    $Ip = new IpLocation('UTFWry.dat'); // 实例化类 参数表示IP地址库文件
    $data = $Ip->getlocation($myip); // 获取某个IP地址所在的位置
    return $data['area'];
}



/**
 * 默认值
 * @param  [type] $default [description]
 * @param  [type] $val     [description]
 * @return [type]          [description]
 */
function default_val($default, $val){
    if(empty($val)) return $default;
    return $val;
}



/**
 * 内容链接
 * @param  [type] $link_str [description]
 * @return [type]           [description]
 */
function content_links($link_str){
    $link_arr   = explode("\n",$link_str);
    $result     = array();
    foreach($link_arr as $key=>$value){
        $arr    = explode('|',$value);
        $result[$key]['name'] = $arr[0];
        $result[$key]['link'] = trim($arr[1]);
    }
    return $result;
}

//短信发送
function smspost($mobile,$content)
{
    $url="http://dxjk.51lanz.com/LANZGateway/DirectSendSMSs.asp";
    $UserID=936352;
    $Account='snimay';
    $PassWord=sha1("jisuanji253546");
    $data=[
        "UserID"=> mb_convert_encoding($UserID, "GB2312", "UTF-8"),
        "Account"=> mb_convert_encoding($Account, "GB2312", "UTF-8"),
        "PassWord"=> mb_convert_encoding($PassWord, "GB2312", "UTF-8"),
        "Content"=> mb_convert_encoding($content, "GB2312", "UTF-8"),
        "Phones"=> mb_convert_encoding($mobile, "GB2312", "UTF-8"),
        "ReturnXJ"=>mb_convert_encoding(1, "GB2312", "UTF-8"),
    ];
    $par=http_build_query($data);
    $link=$url.'?'.$par;
    $res=file_get_contents($link);
//    $res=get_curl_contents($url,'POST',$data);
    return json_decode($res,true);

}
?>