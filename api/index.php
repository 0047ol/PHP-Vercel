<?php
//禁用错误显示，正式环境请开启
ini_set('display_errors','off');
error_reporting(E_ALL || ~E_NOTICE);

//自定义的404文件
$NOT_FOUND = __DIR__ . '/../404.php';
//传递过来的路径参数
$SOURCE_PATH = $_GET['__source_path'];

//路径为空访问根目录
if (empty($SOURCE_PATH)) {
	$SOURCE_PATH = 'index.php';
}

//禁止访问api目录，跳转404
if (explode('/', $SOURCE_PATH)[0] == 'api') {
    exit();
}

//最终的指向路径
$__FILE = __DIR__ . '/../' . $SOURCE_PATH;
//如果是目录自动追加index.php
$__FILE = is_dir($__FILE) ? $__FILE . '/index.php' : $__FILE;
require_once($__FILE);