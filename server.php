<?php
/**
 * Created by PhpStorm.
 * User: symphp <symphp@foxmail.com>
 * Date: 2017/8/8
 * Time: 22:20
 */
include __DIR__.'/vendor/autoload.php'; // 引入 composer 入口文件
use EasyWeChat\Foundation\Application;
use EasyWeChat\Message\Text;

$options = [
	'debug'  => false,
	'app_id' => 'wxf7e5222400f59d85',
	'secret' => 'be0961b440ac6eebed2c71ec5a889e08',
	'token'  => 'cqgdpm',
	// 'aes_key' => null, // 可选
	'log' => [
		'level' => 'debug',
		'file'  => '/tmp/easywechat.log', // XXX: 绝对路径！！！！
	],
	//...
];

$app  = new Application($options);
$text = new Text();    //消息类


$server = $app->server;
$oauth  = $app->oauth;
//$userService = $app->user;
$message = $server->getMessage();
if ($message['MsgType'] == 'event' && $message['Event'] == 'subscribe') {
	$openId = $message['FromUserName'];
}


//$server->setMessageHandler(function ($message) {
//	switch ($message->MsgType) {
//		case 'event':
//			return '收到事件消息';
//			break;
//		case 'text':
//			return $this->token;
//			break;
//		case 'image':
//			return '收到图片消息';
//			break;
//		case 'voice':
//			return '收到语音消息';
//			break;
//		case 'video':
//			return '收到视频消息';
//			break;
//		case 'location':
//			return '收到坐标消息';
//			break;
//		case 'link':
//			return '收到链接消息';
//			break;
//		// ... 其它消息
//		default:
//			return '收到其它消息';
//			break;
//	}
//});

$response = $server->serve();

// 将响应输出
$response->send(); // Laravel 里请使用：return $response;