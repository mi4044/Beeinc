<?php

/**
 * 检查是否是合格11位手机号
 * @param $phone
 * @return bool
 */
function checkIsMobile($phone)
{
    return preg_match('/^1[\d]{10}$/', $phone) ? true : false;
}

/**
 *  文件上传日志函数
 * 该函数的操作目录，仅仅对该项目有效
 * @param array|string $fileName 文件名称
 * @param string $operation $operation='' 上传记录，$operation=false 删除数据库和文件
 * @param bool $deleteFile 是否删除文件
 * @return array|bool|string
 */
function file_upload_log($fileName, $operation = '', $deleteFile = false)
{
    if ($operation === '') {
        //上传
        if (empty($fileName)) return false;
        if (is_array($fileName)) {
            $data = array_map(function ($fileName) {
                return array('name' => $fileName, 'upload_time' => time());
            }, $fileName);
        } else {
            $data = array('name' => $fileName, 'upload_time' => time());
        }
        return M('file_upload_log')->addAll($data);
    }
    if ($operation == false) {
        //删除
        if (empty($fileName)) return false;
        $where = is_array($fileName) ? 'name in("' . implode('","', $fileName) . '")' : 'name="' . $fileName . '"';
        $dataStatus = M('file_upload_log')->where($where)->delete();
        $fileStatus = array();
        if ($dataStatus === false) return false;
        //仅仅删除数据库
        if (!$deleteFile) return array('file_delete_status' => $fileStatus);
        //文件一同删除
        if (is_array($fileName)) {
            foreach ($fileName as $value) {
                if (file_exists($value)) $fileStatus[$value] = unlink($value);
                else $fileStatus[$value] = true;
            }
        } else {
            if (file_exists($fileName)) $fileStatus[$fileName] = unlink($fileName);
            else $fileStatus[$fileName] = true;
        }
        return array('file_delete_status' => $fileStatus);
    }
}

/**
 * 获取软件系列函数(缓存支持和跨项目)
 * @param string $act 操作 $act='' 获取
 *                          $act=null 清除缓存
 *                          $act=numeric 获取指定id
 *                          $act=true 重新生成缓存
 * @return array|bool|mixed|string|void
 */
function getSoftSeries($act = '')
{
    $config = array('temp' => C('COMMON_CACHE_DIR'));
    $name = 'software_series';
    //获取缓存，如果没有缓存会自动去数据库获取数据，然后缓存并且返回
    if ($act === true) {
        $data = M($name)->where('status!=-1')->select();
        $softArr = array();
        foreach ($data as $soft) {
            $softArr[$soft['id']] = $soft;
        }
        return S($name, $softArr, $config);
    } elseif ($act === '') {
        $data = S($name, '', $config);
        if ($data !== false) return $data;
        $data = M($name)->where('status!=-1')->select();
        $softArr = array();
        foreach ($data as $soft) {
            $softArr[$soft['id']] = $soft;
        }
        return S($name, $softArr, $config) ? $softArr : false;
    } elseif (is_null($act)) {
        //清空缓存
        return S($name, null, $config);
    } elseif (is_numeric($act)) {
        //获取信息，如果换成不存在先获取数据库，再缓存，然后返回
        $name = S($name, '', $config);
        if ($name === false) $name = getSoftSeries();
        if (!isset($name[$act])) return false;
        return $name[$act];
    }
    return false;
}

/**
 * 获取软件平台函数(缓存支持和跨项目)
 * @param string $act 操作 $act='' 获取
 *                          $act=null 清除缓存
 *                          $act=numeric 获取指定id
 *                          $act=true 重新生成缓存
 * @return array|bool|mixed|string|void
 */
function getSoftPlatform($act = '')
{
    $config = array('temp' => C('COMMON_CACHE_DIR'));
    $name = 'softplatform';
    //获取缓存，如果没有缓存会自动去数据库获取数据，然后缓存并且返回
    if ($act === true) {
        $data = M($name)->where('status!=-1')->select();
        $softArr = array();
        foreach ($data as $soft) {
            $softArr[$soft['id']] = $soft;
        }
        return S($name, $softArr, $config);
    } elseif ($act === '') {
        $data = S($name, '', $config);
        if ($data !== false) return $data;
        $data = M($name)->where('status!=-1')->select();
        $softArr = array();
        foreach ($data as $soft) {
            $softArr[$soft['id']] = $soft;
        }
        return S($name, $softArr, $config) ? $softArr : false;
    } elseif (is_null($act)) {
        //清空缓存
        return S($name, null, $config);
    } elseif (is_numeric($act)) {
        //获取单条信息，如果换成不存在先获取数据库，再缓存，然后返回
        $name = S($name, '', $config);
        if ($name === false) $name = getSoftPlatform();
        if (!isset($name[$act])) return false;
        return $name[$act];
    }
    return false;
}

/**
 * 获取软件各版本函数(缓存支持和跨项目)
 * @param string $act 操作  $act = '' 获取
 *                          $act = null 清除缓存
 *                          $act = numeric 获取指定id
 *                          $act = true 重新生成缓存
 * @return array|bool | mixed | string | void
 */
function getSoftware($act = '')
{
    $config = array('temp' => C('COMMON_CACHE_DIR'));
    $name = 'software';
    //获取缓存，如果没有缓存会自动去数据库获取数据，然后缓存并且返回
    if ($act === true) {
        $data = M($name)->where('status!=-1')->select();
        $softArr = array();
        foreach ($data as $soft) {
            $softArr[$soft['id']] = $soft;
        }
        return S($name, $softArr, $config);
    } elseif ($act === '') {
        $data = S($name, '', $config);
        if ($data !== false) return $data;
        $data = M($name)->where('status!=-1')->select();
        $softArr = array();
        foreach ($data as $soft) {
            $softArr[$soft['id']] = $soft;
        }
        return S($name, $softArr, $config) ? $softArr : false;
    } elseif (is_null($act)) {
        //清空缓存
        return S($name, null, $config);
    } elseif (is_numeric($act)) {
        //获取信息，如果换成不存在先获取数据库，再缓存，然后返回
        $name = S($name, '', $config);
        if ($name === false) $name = getSoftware();
        if (!isset($name[$act])) return false;
        return $name[$act];
    }
    return false;
}

/**
 * @param $string 软件加密|解密操作 生成软件码
 * @param null $softSeries 软件系列ID 软件分类为null则解密软件码
 * @param null $softPlatform 软件平台
 * @param null $softVersion 软件版本
 * @return string 返回解密|加密字符
 * wangzhoubin@live.com
 */
function appSoftCodeCrypt($string = null, $softSeries = null, $softPlatform = null, $softVersion = null)
{
    //解密
    if ($string !== null) {
        $arr = explode('_', base64_decode($string));
        return array('softSeries' => $arr[0], 'softPlatform' => $arr[1], 'softVersion' => $arr[2]);
    }
    //加密
    $string = $softSeries . '_' . $softPlatform . '_' . $softVersion . '_' . time();
    return base64_encode($string);
}

/**
 * 软件软件码处理器
 * @param int|string $softid 字符串解密，软件id加密
 * @param bool $decode true 解密
 * wangzhoubin@live.com
 */
function softwareCodeHandle($softwareId, $decode = false)
{
    //加密
    if ($decode === false) {
        return base64_encode($softwareId);
    } else {
        //解密
        return base64_decode($softwareId);
    }
}


/**
 * 编辑功能，文件自动处理器
 * @param string|array $inputName inputName
 * @param array $info 当条数据库记录
 * @return array|bool|string
 */
function file_upload_auto_handle($inputName, $info = array())
{
    if (is_array($inputName)) {
        foreach ($inputName as $item) {
            file_upload_auto_handle($item, $info);
        }
    }
    if (ACTION_NAME === 'update') {
        //如果记录有，表单提交没有，则是删除
        if (empty($_POST[$inputName]) && $info[$inputName]) {
            return unlink($info[$inputName]);
        } elseif (empty($info[$inputName]) && !empty($_POST[$inputName])) {
            //如果记录没有，表单有，则是添加，需要在上传记录数据表中删除
            return file_upload_log($_POST[$inputName], false);
        } elseif (!empty($_POST[$inputName]) && !empty($info[$inputName]) && $_POST[$inputName] != $info[$inputName]) {
            //表单提交了，并且记录中有，并且地址不相等，则是变更，则需要删除原来的，并且删除新上传的数据库中的记录
            if (file_upload_log($_POST[$inputName], false) === false) return false;
            return unlink($info[$inputName]);
        }
    }
    if (ACTION_NAME === 'insert') {
        //表单提交了，并且记录中有，并且地址不相等，则是变更，则需要删除原来的，并且删除新上传的数据库中的记录
        if (!empty($_POST[$inputName])) {
            if (file_upload_log($_POST[$inputName], false) === false) return false;
            return true;
        }
    }
    return false;
}

/**
 * 检查是否是合法邮箱
 * @param $email 邮箱
 * @return bool
 */
function checkIsEmail($email)
{
    return preg_match("/^([a-zA-Z0-9])+([.a-zA-Z0-9_-])*@([.a-zA-Z0-9_-])+([.a-zA-Z0-9_-]+)+([.a-zA-Z0-9_-])$/", $email) ? true : false;
}

/**
 * 检查是否是邮箱或者手机号
 * @param string|int $str mobile/email
 * @return int 2：邮箱 ，1：手机号 ，0：错误格式
 */
function checkIsMobileOrEmail($str)
{
    if (checkIsEmail($str))
        return 2;
    if (checkIsMobile($str))
        return 1;
    return 0;
}

/**
 * 获取软件列表
 * @param string $act 操作  $act = '' 获取
 *                          $act = null 清除缓存
 *                          $act = numeric 获取指定id
 *                          $act = true 重新生成缓存
 * @return array|bool | mixed | string | void
 */
function getSoftSeriesPlatform($act = '')
{
    $config = array('temp' => C('COMMON_CACHE_DIR'));
    $name = 'softseries_platform';
    //获取缓存，如果没有缓存会自动去数据库获取数据，然后缓存并且返回
    if ($act === true) {
        $data = M($name)->select();
        $softArr = array();
        foreach ($data as $soft) {
            $softArr[$soft['id']] = $soft;
        }
        return S($name, $softArr, $config);
    } elseif ($act === '') {
        $data = S($name, '', $config);
        if ($data !== false) return $data;
        $data = M($name)->where('status!=-1')->select();
        $softArr = array();
        foreach ($data as $soft) {
            $softArr[$soft['id']] = $soft;
        }
        return S($name, $softArr, $config) ? $softArr : false;
    } elseif (is_null($act)) {
        //清空缓存
        return S($name, null, $config);
    } elseif (is_numeric($act)) {
        //获取信息，如果换成不存在先获取数据库，再缓存，然后返回
        $name = S($name, '', $config);
        if ($name === false) $name = getSoftSeriesPlatform();
        if (!isset($name[$act])) return false;
        return $name[$act];
    }
    return false;
}