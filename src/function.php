<?php
/**
 * function.php
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-27 20:42:27
 */

use xjx\libs\CVarDumper;

/**
 * 打印并高亮函数(推荐使用)
 * @param Mixed   $target 打印的信息内容
 * @param Boolean $bool   是否终止到当前位置退出(默认为true)
 */
function dump($target, $bool = true) {
  ob_start();
  static $i = 0;
  if ($i == 0) {
    header('Content-Type:text/html;charset=utf-8');
  }
  if (PHP_SAPI === 'cli') {
    # 适合终端调试
    CVarDumper::dump($target, 10, false);
  } else {
    # 适合WEB页面调试
    CVarDumper::dump($target, 10, true);
  }
  $i++;
  if ($bool) {
    # Server Application Programming Interface 服务器应用程序编程接口
    # cli 是PHP的命令运行模式
    if (PHP_SAPI === 'cli') {
      echo PHP_EOL;
    }
    exit;
  } else {
    if (PHP_SAPI === 'cli') {
      echo PHP_EOL;
    } else {
      echo nl2br(PHP_EOL);
    }
  }
  ob_end_flush();
}