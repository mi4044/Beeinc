<?php
/**
 * ECMALL: Email Sender
 * ============================================================================
 */

/* 发送邮件的协议类型 */
define('MAIL_PROTOCOL_LOCAL', 0, true);
define('MAIL_PROTOCOL_SMTP', 1, true);


/**
 *    邮件队列模型
 *
 * @author    Garbin
 * @usage    none
 */
class Mailqueue
{
    var $table = 'mail_queue';
    var $prikey = 'queue_id';
    var $_name = 'mailqueue';

    /**
     *    清除发送N次错误和过期的邮件
     *
     * @author    Garbin
     * @return    void
     */
    function clear()
    {
        return $this->drop("err_num > 3 OR add_time < " . (gmtime() - 259200));
    }

    /**
     *    发送邮件
     *
     * @author    Garbin
     * @param     int $limit
     * @return    void
     */
    function send($limit = 5)
    {
        /* 清除不能发送的邮件 */
        $this->clear();

        /* 获取待发送的邮件，按发送时间，优先及除序，错误次数升序 */
        $gmtime = gmtime();
        $mailmodel = M("mail_queue");
        /* 取出所有未锁定的 */
        $mails = $mailmodel->where("lock_expiry < {$gmtime}")->order('add_time DESC, priority DESC, err_num ASC')->limit($limit)->find();

        if (!$mails) {
            /* 没有邮件，不需要发送 */
            return 0;
        }

        /* 锁定待发送邮件 */
        $queue_ids = array_keys($mails);
        $lock_expiry = $gmtime + 30;    //锁定30秒
        $mailmodel->save(array('id' => $mails['id'], 'err_num' => $mails['err_num'] + 1, 'lock_expiry' => $lock_expiry));
        //$this->edit($queue_ids, "err_num = err_num + 1, lock_expiry = {$lock_expiry}");

        /* 获取邮件发送接口 */
        $mailer =& $this->get_mailer();
        $mail_count = count($queue_ids);
        $error_count = 0;
        $error = '';

        /* 逐条发送 */
        for ($i = 0; $i < $mail_count; $i++) {
            $mail = $mails[$queue_ids[$i]];
            $result = $mailer->send($mail['mail_to'], $mail['mail_subject'], $mail['mail_body'], $mail['mail_encoding'], 1);
            if ($result) {
                /* 发送成功，从队列中删除 */
                $this->drop("id =" . $queue_ids[$i]);
            } else {
                $error_count++;
            }
        }

        return array('mail_count' => $mail_count, 'error_count' => $error_count, 'error' => $mailer->errors);

    }


    /**
     *  简化删除记录操作
     *
     * @param  mixed $ids
     * @return int
     */
    function drop($conditions)
    {
        if (empty($conditions)) {
            return;
        }/*
		if ($conditions === DROP_CONDITION_TRUNCATE)
		{
			$conditions = '';
		}
		else
		{
			$conditions = $this->_getConditions($conditions, false);
		}
	
		// 保存删除的记录的主键值，便于关联删除时使用 
		$fields && $fields = ',' . $fields;
	
		// 这是个瓶颈，当删除的数据量非常大时会有问题 
		$this->_saveDroppedData("SELECT {$this->prikey}{$fields} FROM {$this->table}{$conditions}");
	
		$droped_data = $this->getDroppedData();
		if (empty($droped_data))
		{
			return 0;
		}*/
        $mode = M('mail_queue');
        $mode->query("DELETE FROM mail_queue where  {$conditions}");

    }

    /**
     *    获取邮件发送网关
     *
     * @author    Garbin
     * @return    object
     */
    function &get_mailer()
    {
        static $mailer = null;
        if ($mailer === null) {
            $mailer = new Mailer();
        }

        return $mailer;
    }

}


/*
 * Send Mail Class
 *
 * This class depends on other two classes: class.phpmailer.php and class.smtp.php
 * --------------------------------------------
 * Usage:
 *
 * $mailer = new Mailer();
 * $mailer->debug = true|false;
 * $res = $mailer->send('who@domain.com,you@domain.com', 'Email Subject', 'Message Body');
*/

class Mailer
{
    var $timeout = 30;
    var $errors = array();
    var $priority = 3; // 1 = High, 3 = Normal, 5 = low
    var $debug = false;

    var $PluginDir = "";
    var $mailer;

    function __construct()
    {
        $from = C('mail.site_name');
        $email = C('mail.email_addr');
        $protocol = C('mail.email_type');
        $host = C('mail.email_host');
        $port = C('mail.email_port');
        $user = C('mail.email_id');
        $pass = C('mail.email_pass');
        $this->Mailer($from, $email, $protocol, $host, $port, $user, $pass);
    }

    function Mailer($from, $email, $protocol, $host = '', $port = '', $user = '', $pass = '')
    {
        include_once("phpmailer.php");
        $this->mailer = new phpmailer();

        $this->mailer->From = $email;
        $this->mailer->FromName = $this->_base64_encode($from);

        if ($protocol == MAIL_PROTOCOL_LOCAL) {
            /* mail */
            $this->mailer->IsMail();
        } else {
            /* smtp */
            $this->mailer->IsSMTP();
            $this->mailer->Host = $host;
            $this->mailer->Port = $port;
            $this->mailer->SMTPAuth = !empty($pass);
            $this->mailer->Username = $user;
            $this->mailer->Password = $pass;
        }
    }

    /**
     * 发送邮件
     * @param unknown $mailto 收件人
     * @param unknown $subject 邮件主题
     * @param unknown $content 邮件内容
     * @param string $charset 编码
     * @param string $is_html 是否为HTML格式
     * @param bool $receipt
     * @return Ambigous <s, boolean>
     */
    function send($mailto, $subject, $content, $charset = 'utf-8', $is_html = 1, $receipt = false)
    {
        $this->mailer->Priority = $this->priority;
        $this->mailer->CharSet = $charset;
        $this->mailer->IsHTML($is_html);
        $this->mailer->Subject = $this->_base64_encode($subject);//@todo 用了乱码
        $this->mailer->Subject = ($subject);
        $this->mailer->Body = $content;
        $this->mailer->Timeout = $this->timeout;
        $this->mailer->SMTPDebug = $this->debug;
        $this->mailer->ClearAddresses();
        $this->mailer->AddAddress($mailto);
        $res = $this->mailer->Send();
        if ($res !== true) {
            return $this->errors[] = $this->mailer->ErrorInfo;
        }
        return $res;
    }

    function _base64_encode($str = '')
    {
        return '=?' . CHARSET . '?B?' . base64_encode($str) . '?=';
    }
}

;

?>
