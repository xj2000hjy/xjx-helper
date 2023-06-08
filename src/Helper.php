<?php namespace xjx;
/**
 * Helper.php
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-26 23:23:57
 */
class Helper {
  public static function run() {
    if(session_status()){
      session_start();
    }
    self::parseUrl();
  }

  public static function parseUrl() {
    # dump($_SERVER);
    /*
    array(
        'DOCUMENT_ROOT' => '/Users/jacklau/Work/PHP/xjx-helper'
        'REMOTE_ADDR' => '127.0.0.1'
        'REMOTE_PORT' => '53464'
        'SERVER_SOFTWARE' => 'PHP 7.4.33 Development Server'
        'SERVER_PROTOCOL' => 'HTTP/1.1'
        'SERVER_NAME' => 'localhost'
        'SERVER_PORT' => '8080'
        'REQUEST_URI' => '/'
        'REQUEST_METHOD' => 'GET'
        'SCRIPT_NAME' => '/index.php'
        'SCRIPT_FILENAME' => '/Users/jacklau/Work/PHP/xjx-helper/index.php'
        'PHP_SELF' => '/index.php'
        'HTTP_HOST' => 'localhost:8080'
        'HTTP_CONNECTION' => 'keep-alive'
        'HTTP_CACHE_CONTROL' => 'max-age=0'
        'HTTP_UPGRADE_INSECURE_REQUESTS' => '1'
        'HTTP_USER_AGENT' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_16_0) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.100 Safari/537.36'
        'HTTP_SEC_FETCH_DEST' => 'document'
        'HTTP_ACCEPT' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,;q=3;q=0.9'
        'HTTP_SEC_FETCH_SITE' => 'none'
        'HTTP_SEC_FETCH_MODE' => 'navigate'
        'HTTP_SEC_FETCH_USER' => '?1'
        'HTTP_ACCEPT_ENCODING' => 'gzip, deflate, br'
        'HTTP_ACCEPT_LANGUAGE' => 'zh-CN,zh;q=0.9'
        'HTTP_COOKIE' => 'csrftoken=Lz6GAV3npWNJGRTI4wg9ghMfZxVFfP1DSwO31szSakZ9IxY3rnHM9N2EwtWXZBHd; _ga=GA1.1.1126346612.1673361671; Webstorm-e53d62d=bdf73dc5-af48-40e0-bf99-8564113f7460; Phpstorm-1883790b=280626bf-045f-4dab-9b6b-6f5daa8f1324'
        'REQUEST_TIME_FLOAT' => 1685194856.9393
        'REQUEST_TIME' => 1685194856
      )
     */

    # http://localhost:8080/index.php?s=index/show
    # dump($_GET);
    if (isset($_GET['s'])) {
      $s = explode('/', $_GET['s']);
      $controller = $s[0];
      $action = $s[1];
      $class = '\\xjx\\controller\\' . ucfirst($controller);
    } else {
      $class = '\\xjx\\controller\\Index';
      $action = 'show';
    }
    # dump($action);
    echo (new $class)->$action();
  }


}