<?php
/**
 * Client.php
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-27 07:13:34
 */

namespace xjx\string;


class Client {

  /**
   * 判断访问是否来自移动端
   */
  public static function isMobile() {
    $useragent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $useragent_commentsblock = preg_match('|\(.*?\)|', $useragent, $matches) > 0 ? $matches[0] : '';
    $mobile_os_list = ['Google Wireless Transcoder', 'Windows CE', 'WindowsCE', 'Symbian', 'Android', 'armv6l', 'armv5', 'Mobile', 'CentOS', 'mowser', 'AvantGo', 'Opera Mobi', 'J2ME/MIDP', 'Smartphone', 'Go.Web', 'Palm', 'iPAQ'];
    $mobile_token_list = ['Profile/MIDP', 'Configuration/CLDC-', '160¡Á160', '176¡Á220', '240¡Á240', '240¡Á320', '320¡Á240', 'UP.Browser', 'UP.Link', 'SymbianOS', 'PalmOS', 'PocketPC', 'SonyEricsson', 'Nokia', 'BlackBerry', 'Vodafone', 'BenQ', 'Novarra-Vision', 'Iris', 'NetFront', 'HTC_', 'Xda_', 'SAMSUNG-SGH', 'Wapaka', 'DoCoMo', 'iPhone', 'iPod'];
    $found_mobile = self::contain($mobile_os_list, $useragent_commentsblock) || self::contain($mobile_token_list, $useragent);
    if ($found_mobile) {
      return true;
    } else {
      return false;
    }
  }


  /**
   * 检测指定的字符串是否在源数组或字符串中存在
   * @param $haystack
   * @param $needles
   * @return bool
   */
  private static function contain($haystack, $needles) {
    foreach ($needles as $needle) {
      if (false !== strpos($haystack, $needle)) {
        return true;
      }
    }
    return false;
  }
}