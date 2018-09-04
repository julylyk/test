<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use PHPMailer\PHPMailer\PHPMailer;

class Index extends Common
{
    public function index()
    {
    	$res=Db::name('etl_slide')->order('id desc')->limit(3)->select();
    	$this->assign('res',$res);
        return view();
    }

    public function mail($tomail, $content)
    {
    	// july阿里云邮箱
    	// qq邮箱发送 
    	// $mail = new PHPMailer();
    	// //是否启用smtp的debug进行调试 开发环境建议开启 生产环境注释掉即可 默认关闭debug调试模式
    	// $mail->SMTPDebug = 0;
    	// //使用smtp鉴权方式发送邮件，当然你可以选择pop方式 sendmail方式等 本文不做详解
    	// //可以参考http://phpmailer.github.io/PHPMailer/当中的详细介绍
    	// $mail->isSMTP();
    	// //smtp需要鉴权 这个必须是true
    	// $mail->SMTPAuth=true;
    	// //链接qq域名邮箱的服务器地址
    	// $mail->Host = 'smtp.qq.com';
    	// //设置使用ssl加密方式登录鉴权
    	// $mail->SMTPSecure = 'ssl';
    	// //设置ssl连接smtp服务器的远程服务器端口号 可选465或587
    	// $mail->Port = 465;
    	// //设置smtp的helo消息头 这个可有可无 内容任意
    	// // $mail->Helo = 'Hello smtp.qq.com Server';
    	// //设置发件人的主机域 可有可无 默认为localhost 内容任意，建议使用你的域名
    	// // $mail->Hostname = 'jjonline.cn';
    	// //设置发送的邮件的编码 可选GB2312 我喜欢utf-8 据说utf8在某些客户端收信下会乱码
    	// $mail->CharSet = 'UTF-8';
    	// //设置发件人姓名（昵称） 任意内容，显示在收件人邮件的发件人邮箱地址前的发件人姓名
    	// $mail->FromName = '益高国际';
    	// //smtp登录的账号 这里填入字符串格式的qq号即可
    	// $mail->Username ='909199238';
    	// //smtp登录的密码 这里填入“独立密码” 若为设置“独立密码”则填入登录qq的密码 建议设置“独立密码”
    	// $mail->Password = 'vpippawshwqobfbg';
    	// //设置发件人邮箱地址 这里填入上述提到的“发件人邮箱”
    	// $mail->From = '909199238@qq.com';
    	// //邮件正文是否为html编码 注意此处是一个方法 不再是属性 true或false
    	// $mail->isHTML(true); 
    	// //设置收件人邮箱地址 该方法有两个参数 第一个参数为收件人邮箱地址 第二参数为给该地址设置的昵称 不同的邮箱系统会自动进行处理变动 这里第二个参数的意义不大
    	// $mail->addAddress($tomail,'');
    	// //添加多个收件人 则多次调用方法即可
    	// // $mail->addAddress('xxx@163.com','晶晶在线用户');
    	// //添加该邮件的主题
    	// $mail->Subject = '益高国际物流在线留言系统';
    	// //添加邮件正文 上方将isHTML设置成了true，则可以是完整的html字符串 如：使用file_get_contents函数读取本地的html文件
    	// $mail->Body = $content;
    	// //为该邮件添加附件 该方法也有两个参数 第一个参数为附件存放的目录（相对目录、或绝对目录均可） 第二参数为在邮件附件中该附件的名称
    	// // $mail->addAttachment('./d.jpg','mm.jpg');
    	// //同样该方法可以多次调用 上传多个附件
    	// // $mail->addAttachment('./Jlib-1.1.0.js','Jlib.js');
    	// //发送命令 返回布尔值 
    	// //PS：经过测试，要是收件人不存在，若不出现错误依然返回true 也就是说在发送之前 自己需要些方法实现检测该邮箱是否真实有效
    	// // $status = $mail->send();
    	// return $mail->Send(); //发送方法，发送成功返回true，失败返回false
    	// // 简单的判断与提示信息
    	// // if($status) {
    	// //  echo '发送邮件成功';
    	// // }else{
    	// //  echo '发送邮件失败，错误信息未：'.$mail->ErrorInfo;
    	// // }

    	$mail = new PHPMailer();
    	$mail->isSMTP(); // 启用SMTP
    	$mail->SMTPDebug=1; //开启调试模式
    	// $mail->SMTPSecure = "ssl";
    	$mail->CharSet='utf-8'; //设置邮件编码格式
    	$mail->Host="s90.cn4e.com"; //smtp服务器的名称（这里以126邮箱为例）
    	$mail->SMTPAuth = true; //启用smtp认证
    	$mail->Username = "admin3@eagletrans.com.hk"; //你的邮箱名可以不写@后缀，也可以写
    	$mail->Password = "!@QW34er" ; //邮箱密码，现在开启邮箱SMTP后叫做安全码
    	$mail->Port=25; //SMTP端口号
    	// $mail->Port = 994;
    	$mail->setFrom("admin3@eagletrans.com.hk","July学习网"); //发件人地址（也就是你的邮箱地址）和发件人名称
    	$mail->AddAddress($tomail,""); //接收人地址和名称
    	$mail->WordWrap = 100; //设置每行字符长度
    	$mail->isHTML(true); // 是否HTML格式邮件
    	$mail->Subject ="July学习网在线注册"; //邮件主题
    	$mail->Body = $content; //邮件内容
    	//$mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    	return $mail->Send(); //发送方法，发送成功返回true，失败返回false
    	// echo $mail->ErrorInfo; //获取错误信息

    }

    public function sendmail()
    {
        // dump(input('post.'));die;
    	$res=input('post.');
    	// dump($res);
    	$tomail="admin3@eagletrans.com.hk";
    	Db::name('etl_message')->insert($res);
         //邮件内容
         $content="姓名".$res['name']."电话".$res['phone']."留言".$res['content'];

         // $result=$this->mail($tomail,$content);
         // 如果页面打印bool(true)则发送成功
         if($this->mail($tomail,$content)){
         	$this->success('发送成功');
         }else{
         	$this->error('发送失败');
           	}
     }		
}
