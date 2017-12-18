<?php
/**
 * 扩展函数库
 * @Author: wangjiaFred@outlook.com
 * Date: 2016/9/8
 * Time: 9:22
 */
/**
 * 验证11位手机号合法性
 * @param $phoneNumber 11位手机电话
 * @return bool
 */
function checkPhone($phoneNumber)
{
    return preg_match('/^1[\d]{10}$/', $phoneNumber) ? true : false;
}

/**
 * 验证邮箱合法性
 * @param $email 邮箱
 * @return bool
 */
function checkEmail($email)
{
    return preg_match("/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/", $email) ? true : false;
}

/**
 * 文件上传后缀转换
 * 为了适应前后台的上传文件后缀切换
 * @param array $array 配置文件中配置的后缀array
 * @return string 后缀 *.jpg;*.png;;*.3d; 等格式
 */
function extConvert(array $array)
{
    $ext = '';
    foreach ($array as $item) {
        $ext .= '*.' . $item . ';';
    }
    return $ext;
}

/**
 * 检查邮箱或者手机是否正确，并且返回是邮箱或者手机
 * @param $field 验证字段
 * @return bool|string  返回false|email|mobile
 * wangzhoubin@live.com
 */
function isMobileOrEmail($field)
{
    if (checkEmail($field)) {
        return 'email';
    } elseif (checkPhone($field)) {
        return 'mobile';
    } else {
        return false;
    }
}

/**
 * @param $dir 目录
 * @return bool
 * @Author: wangzhoubin@live.com
 */
function deleteDir($dir)
{
    if (!$handle = @opendir($dir)) {
        return false;
    }
    while (false !== ($file = readdir($handle))) {
        if ($file !== "." && $file !== "..") {
            $file = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($file)) {
                deleteDir($file);
            } else {
                @unlink($file);
            }
        }
        @rmdir($dir);
    }
}

/**
 * 通用加密函数接口
 * @param $string 需要加密的字符串
 * @param null $encryptFun 加密函数 @todo 这里为了开发方便，将没有的函数转向默认函数加密处理，后期可能修改做好提示
 * @param bool $target 解密标签 true 解密字符串
 * @return mixed 加密字符
 * wangzhoubin@live.com
 */
function commonEncrypt($string, $encryptFun = null, $target = null)
{
    $encryptFun = $encryptFun === null || !function_exists($encryptFun) ? 'commonEncryptDefaultFun' : $encryptFun;
    return $encryptFun($string, $target);
}

/**
 * commonEncryptDefaultFun默认加密函数
 * @param $string 需要加密的字符串
 * @return string 加密字符串
 * wangzhoubin@live.com
 */
function commonEncryptDefaultFun($string)
{
    return md5($string);
}

/**
 * 验证码生成/检查/删除
 * @param string $act
 * get 生成验证码存入session并返回
 *
 * check 检查验证码 0验证码错误 -1过期 1正确(删除验证码)
 *
 * delete 删除验证码
 * @param string $length 验证码长度
 * @param int $mode 验证码格式
 * @param string $expire 过期时间(秒数)
 * @return bool|int
 */
function verify_code($act = 'get', $length = '', $mode = 7, $expire = '')
{
    $verify_name = 'verifyCode';
    if ($act == 'get') {
        $length = $length === '' ? C('VERIFY_CODE_LENGTH') : $length;
        $mode = $mode === '' ? 7 : (int)$mode;
        $expire = $expire === '' ? C('VERIFY_CODE_EXPIRE_TIME') : $expire;
        import('Think.ORG.Util.String');
        $verify_code = String::randString($length, $mode);
        $_SESSION[$verify_name] = array($verify_name => strtolower($verify_code), 'expire' => $expire + time());
        return $verify_code;
    } elseif ($act == 'check') {
        if (empty($_SESSION[$verify_name])) {
            return 0;
        } elseif (time() > $_SESSION[$verify_name]['expire']) {
            return -1;
        } elseif ($_SESSION[$verify_name][$verify_name] === (strtolower($_POST[$verify_name]))) {
            unset($_SESSION[$verify_name]);
            return 1;
        } else {
            return 0;
        }
    }
    return false;
}


/**
 * @param $str 后台密码加密
 * @return string
 * wangzhoubin@live.com
 */
function adminPasswordEncrypt($str)
{
    return commonEncryptDefaultFun($str);
}

/**
 * @param $level 等级
 * @param string $n
 * @return string
 * wangzhoubin@live.com
 */
function getNodeTree($level, $n = '')
{
    $ret = "";
    for ($i = 0; $i < $level; $i++) {
        if ($i == $level - 1) {

            $ret .= '<div class="_tree note fist"></div>';
        } else {
            $ret .= '<div class="_tree line"></div>';
        }
    }
    return $ret;
}

/**
 * 添加用户登录日志
 * @return mixed
 */
function add_user_login_log()
{
    $data = array(
        'userId' => $_SESSION[C('USER_AUTH_KEY')],
        'softId' => $_SESSION['softId'],
        'devId' => $_SESSION['devId'],
        'ip' => $_SERVER['HTTP_HOST'],
        'loginTime' => time(),
    );
    return M('UserLoginLog')->add($data);
}

/**
 * 获取指定字典名称属性，优先获取缓存数据
 * @param $name 字典名称
 * @return mixed 键值对 id=>name
 * wangzhoubin@live.com
 */
function getDict($name)
{
    if (($arr = S($name)) !== false) return $arr;
    $dict = M('Dicttype')->query('select dict.id,dict.name from dict WHERE type_id=(SELECT id FROM dicttype where en="' . $name . '")');
    $arr = array();
    foreach ($dict as $item)
        $arr[$item['id']] = $item['name'];
    S($name, $arr);
    return $arr;
}

/**
 * 获取app平台类型
 * 根据服务器系统自动识别识别平台
 * @param string $type id|name 平台id
 * @return string|false id|name 如果软件平台存在于预置的平台类型中，则根据type返回，不存在与字典中则返回false
 */
function getAppPlatform($type = 'id')
{
    //todo 由于终端把平台放在设备码中，这里需要处理
    //平台在设备码中,设备码：jsahfdkjash^ios

    $platform = explode('^', $_POST['devCode']);
    $platform = $platform[1];

    $platform_list = getSoftPlatform();
    $platform_list = array_map(function ($value) {
        return $value['enname'];
    }, $platform_list);
    return ($key = array_search($platform, $platform_list)) === false ? false : ($type == 'id' ? $key : $platform);
}

/**
 * @param $file
 * @param string $target file|string 文件或者string
 * @return array
 * wangzhoubin@live.com
 */
function u_simplexml_load($file, $target = 'file')
{
    $data = array();
    $subData = array();
    $file = $target === 'file' ? simplexml_load_file($file) : simplexml_load_string($file);
    foreach ($file->children() as $row) {
        $subData = array();
        $node = (array)$row;
        if (isset($node[0])) {
            $subData[0] = $node[0];
        }
        if (isset($node['@attributes'])) {
            foreach ($node['@attributes'] as $name => $attribute) {
                $subData [$name] = $attribute;
            }
        }
        $data[] = $subData;
    }
    unset($subData);
    unset($file);
    return $data;
}

/**
 * 生成设备码
 * 根据当前 软件码信息生成对应的设备码
 * @param null $softSeries 软件系列(软件码)
 * @param int $randNum 随机字符长度
 * @return bool|string 软件系列错误返回 false 成功返回设备码 devCode
 */
function createDevCode()
{
    $devCode = $_SESSION['softSeries'] . ':' . $_SESSION['softVersion'] . ':' . $_SESSION['softPlatform'] . ':' . time();
    return base64_encode($devCode);
}

/**
 * 导出数据到EXCEL
 *
 * @param string $expTitle 文件名
 * @param HashMap $map 过滤条件
 * @param array $expCellName 列名
 * @param array $xlsData 数据
 */
function exportExcel($expTitle, $expCellName, $expTableData)
{
    $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
    $fileName = $_SESSION['account'] . date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
    $cellNum = count($expCellName);
    $dataNum = count($expTableData);

    vendor("PHPExcel.PHPExcel");

    $objPHPExcel = new PHPExcel();
    $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

    $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格
    // $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
    for ($i = 0; $i < $cellNum; $i++) {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
    }
    // Miscellaneous glyphs, UTF-8
    for ($i = 0; $i < $dataNum; $i++) {
        for ($j = 0; $j < $cellNum; $j++) {
            $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $expTableData[$i][$expCellName[$j][0]]);
        }
    }

    header('pragma:public');
    header('Content-type:application/vnd.ms-excel;charset=utf-8;name="' . $xlsTitle . '.xls"');
    header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
}


/**
 * 无限分类树
 * @param int $root_id 根id
 * @param array $rows 需要排序集
 * @param array $data 分类结果集
 * @return array|null 排序好的数组
 * wangzhoubin@live.com
 */
function classifiedTree($root_id = 0, $rows = array(), &$data = array())
{
    foreach ($rows as $key => $row) {
        if ($row['pid'] == $root_id) {
            $data[] = $row;
            unset($rows[$key]);
            classifiedTree($row['id'], $rows, $data);
        }
    }
    return $data;
}


/**
 * 设置子级 code
 * @param int $root_id 根id
 * @param string $code code
 * @param int $level 层级
 * @param array $rows 需要排序集
 * @param array $data 分类结果集
 * @return array|null 排序好的数组
 * wangzhoubin@live.com
 */
function classifiedTreeChildCode($root_id = 0, $code = '', $level = 0, $rows = array(), &$data = array())
{
    foreach ($rows as $key => $row) {
        if ($row['pid'] == $root_id) {
            $row['level'] = $level + 1;
            $row['code'] = $code . ',' . $root_id;
            $data[] = $row;
            unset($rows[$key]);
            classifiedTreeChildCode($row['id'], $row['code'], $row['level'], $rows, $data);
        }
    }
    return $data;
}

/**
 * 生成以时间为准的文件名
 * @param string $prefix 前缀
 * @param bool $more_entropy
 * @param string $suffix 后缀
 * @return string wangzhoubin@live.com
 * wangzhoubin@live.com
 */
function fileUniqueName($suffix = '', $prefix = '', $more_entropy = false)
{

    //$prefix = $prefix == '' ? date('YmhsHis') : $prefix;
    return uniqid($prefix, $more_entropy) . $suffix;
}

/**
 * 生成指定是软件的唯一激活码
 * 已经通过数据库对比，排除重复性
 * wangzhoubin@live.com
 * @param int $softid 软件id
 * @param int $num 数量
 * @return array
 */
function activeCodeHandle($softid, $num = 1)
{
    if ($num > 1000) return false;
    $length = 0;
    $str = 'qwertyuioplkjhgfdsazxcvbnm0987654321';
    $arrCode = array();
    while ($length < $num) {
        $code = $str[rand(1, 36) - 1] . $str[rand(1, 36) - 1] . $str[rand(1, 36) - 1] . $str[rand(1, 36) - 1] . $str[rand(1, 36) - 1] . $str[rand(1, 36) - 1];
        $isHave = M('active_code')->where('softid=' . $softid . ' and activeCode="' . $code . '"')->field('id')->find();
        if ($isHave === null && !in_array($code, $arrCode)) {
            $arrCode[] = $code;
            ++$length;
        }
    }
    return $arrCode;
}

/**
 * 邮件发送发送
 * @param string $mailto 接受对象
 * @param string $subject 主题
 * @param string $content 邮件内容
 * @param bool $debug 是否开启debug
 * @param string $charset 编码
 * @param int $is_html 是否是html
 * @return bool|error_info 成功 返回true 错误返回错误信息
 */
function sendEmail($mailto = 'wangzhoubin@live.com', $subject = '测试标题', $content = '测试内容', $debug = false, $charset = 'utf-8', $is_html = 1)
{
    static $mailer = null;
    if (is_null($mailer)) {
        vendor('Mail.Mailapi');
        $mailer = new Mailer();
    }
    $mailer->debug = $debug;
    return $mailer->send($mailto, $subject, $content, $charset, $is_html);
}

function sendSMS($mobile, $content)
{
    vendor('Sms.UmsSms');
    $sms = new UmsSms();
    $rs = $sms->sendSMS($mobile, $content);
    return $rs;
}

/**
 * @todo 需要修改
 * 省份缓存函数
 * 以id=>name格式来换成省份
 * @param null|integer $action 获取所有数据|获取指定id名称
 * @return array|bool|mixed|string|void
 */
function cache_assoc_province($action = null)
{
    //获取省份 优先从缓存获取，再次从数据库获取，并且生成缓存
    if ($action === true) {
        $province = M('Province')->field('id,name')->select();
        $data = array();
        foreach ($province as $item) {
            $data[$item['id']] = $item['name'];
        }
        return S('cache_province', $data);
    } elseif ($action === null) {
        if (S('cache_province') === false) {
            $province = M('Province')->field('id,name')->select();
            $data = array();
            foreach ($province as $item) {
                $data[$item['id']] = $item['name'];
            }
            return S('cache_province');
        }
        return S('cache_province');
    } elseif (is_numeric($action)) {
        $data = S('cache_province');
        if ($data === false) {
            $data = cache_assoc_province();
        }
        return isset($data[$action]) ? $data[$action] : false;
    }
    return false;
}

/**
 * 通用数据缓存函数
 * 格式：array('id'=>array(),)
 *
 * $id='' 获取所有数据，如果没有则查询数据库后再次生成并且返回
 *
 * $id=null 获取所有数据，如果没有则查询数据库后再次生成并且返回
 *
 * $id=int 获取指定id记录信息
 *
 * $id=true 重新生成缓存
 *
 * @param $table 表名称
 * @param string $id
 * @param array $where 缓存数据的查询条件
 * @return array|bool|mixed|string|void
 */
function cache_assoc_table($table, $id = '', $where = array('status' => array('neq', -1)))
{
    $cache_name = "cache_$table";
    if ($id === '') {//获取所有记录信息
        if (S($cache_name) === false) {//没有缓存生成缓存
            cache_assoc_table($table, true);
        }
        return S($cache_name);
    } elseif ($id === true) {//重新生成缓存
        $data = M($table)->where($where)->select();
        $cache_data = array();
        foreach ($data as $item) {
            $cache_data[$item['id']] = $item;
        }
        return S($cache_name, $cache_data);
    } elseif (is_integer($id)) {//获取指定id分类信息，优先从缓存获取再次从数据库获取(并且生成缓存)
        $cache_data = S($cache_name);
        if ($cache_data === false) {
            cache_assoc_table($table, true);
            $cache_data = S($cache_name);
        }
        return isset($cache_data[$id]) ? $cache_data[$id] : false;
    } elseif (is_null($id)) {//删除缓存
        S($cache_name, null);
    }
    return false;
}

/**
 * 字典缓存类
 * 格式：array('id'=>array(),)
 *
 * $action='' 获取所有数据，如果没有则查询数据库后再次生成并且返回
 *
 * $action=null 获取所有数据，如果没有则查询数据库后再次生成并且返回
 *
 * $action=int 获取指定id记录信息
 *
 * $action=true 重新生成缓存
 *
 * @param $dict_type 字典name
 * @param $action $id
 * @return array|bool|mixed|string|void
 */
function cache_assoc_dict($dict_type, $action = '')
{
    $cache_name = "cache_dict_$dict_type";//某个字典属性缓存
    if ($action === true) {//重新生成缓存
        $data = M('dict')->join('left join dicttype type on type.id=dict.type_id')->where("dict.status!=-1 and type.en='$dict_type'")->field('dict.*')->select();
        $cache_data = array();
        foreach ($data as $item) {
            $cache_data[$item['id']] = $item;
        }
        return S($cache_name, $cache_data);
    } elseif (is_integer($action)) {//获取指定id的属性
        $cache_data = S($cache_name);
        if ($cache_data === false) {
            cache_assoc_dict($dict_type, true);
            $cache_data = S($cache_name);
        }
        return isset($cache_data[$action]) ? $cache_data[$action] : false;
    } elseif (is_null($action)) {//删除缓存
        S($cache_name, null);
    } else {//获取指定类别的字典属性信息，优先从缓存获取再次从数据库获取(并且生成缓存)
        $cache_data = S($cache_name);
        if ($cache_data === false) {
            cache_assoc_dict($dict_type, true);
            $cache_data = S($cache_name);
        }
        return $cache_data;
    }
}


/**
 * 批量移动文件(重命名)
 *
 * $oldFile=>newFile
 * @param array $need_file 需要移动的文件组
 * @return array|null 返回失败的键名
 */
function rename_file(array $need_file = array())
{
    $status = null;
    foreach ($need_file as $old => $item) {
        $path = dirname($item);
        if (file_exists($path) === false) {
            mkdir($path, 0777, true);
        }
        @rename($old, $item);
    }
}

/**
 * 批量删除文件(重命名)
 * @param array $file 需要删除的文件组
 */
function unlink_file(array $file = array())
{
    foreach ($file as $item) {
        @unlink($item);
    }
}

/**
 * 用户绑定至软件
 * 登录执行该操作
 * @return array|bool 错误返回false，正确返回记录信息
 */
function user_soft_bind()
{
    $data = array(
        'userId' => $_SESSION[C('USER_AUTH_KEY')],
        'softId' => $_SESSION['softId'],
        'bindTime' => time(),
        'loginTime' => time(),
        'expireTime' => $expireTime = strtotime('+ ' . C('PROBATION_EXPIRE_TIME') . ' day'),
    );
    $id = M('user_soft')->add($data);
    if ($id === false) return false;
    $data['id'] = $id;
    return $data;
}


/**
 * 用户绑定设备
 * 注意：必须登录后方能继续改操作
 * @return array|bool 错误返回false，正确返回记录信息
 */
function user_dev_bind()
{
    $data = array(
        'userId' => $_SESSION[C('USER_AUTH_KEY')],
        'softId' => $_SESSION['softId'],
        'devId' => $_SESSION['devId'],
        'bindTime' => time(),
    );
    $id = M('user_dev')->add($data);
    if ($id === false) return false;
    $data['id'] = $id;
    return $data;
}

/**
 * 激活码激活或检查激活码可用性
 *
 * return 0 激活码不存在
 *
 * return -1 激活码过期
 *
 * return -2 激活码已经被使用
 *
 * return 1 激活码可以使用
 *
 * return false 激活使用激活码成功失败
 *
 * return true 激活使用激活码成功
 * @param $active_code 激活码
 * @return array|int|bool 激活码可以使用，info，激活码成功
 */
function active_code_check_or_active($active_code)
{
    $where = array('activeCode' => strtolower($active_code), 'softid' => $_SESSION['softId']);
    $model = M('active_code');
    $info = $model->where($where)->find();
    //激活码不存在
    if ($info === null) return -1;
    //激活码不能在此软件使用
    if ($info['softid'] !== $_SESSION['softId']) return -2;
    //激活码已经被使用
    if ($info['activeTime']) return -3;
    //激活码过期
    if ($info['expireTime'] < time()) return -4;// 已经过期
    //激活
    $data = array('activeTime' => time(), 'status' => 0, 'userId' => $_SESSION[C('USER_AUTH_KEY')]);
    $res = $model->where('id=' . $info['id'])->data($data)->save();
    if ($res === false) return 0;
    return $info;
}