<?php
/**
 * Str.php
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-26 23:38:54
 */

namespace xjx\string;


class Str {
  /**
   * 下划线（蛇形）格式缓存数组
   * @var array
   */
  protected static $snakeCache = [];

  /**
   * 小驼峰格式缓存数组
   * @var array
   */
  protected static $camelCache = [];

  /**
   * 大驼峰格式缓存数组
   * @var array
   */
  protected static $studlyCache = [];

  /**
   * 检查字符串中是否包含某些字符串
   * @param string       $haystack  待检查指定的字符串
   * @param string|array $needles   比较的源数组或字符串
   * @return bool                   是否包含
   */
  public static function contains(string $haystack, $needles): bool {
    foreach ((array)$needles as $needle) {
      if ('' != $needle && mb_strpos($haystack, $needle) !== false) {
        return true;
      }
    }

    return false;
  }

  /**
   * 检查字符串是否以某些字符串结尾
   * @param string       $haystack
   * @param string|array $needles
   * @return bool
   */
  public static function endsWith(string $haystack, $needles): bool {
    foreach ((array)$needles as $needle) {
      if ((string)$needle === static::substr($haystack, -static::length($needle))) {
        return true;
      }
    }

    return false;
  }

  /**
   * 检查字符串是否以某些字符串开头
   * @param string       $haystack  源字符串
   * @param string|array $needles   待检查的字符(集)
   * @return bool                   是否以待检查的字符(集)开头
   */
  public static function startsWith(string $haystack, $needles): bool {
    foreach ((array)$needles as $needle) {
      if ('' != $needle && mb_strpos($haystack, $needle) === 0) {
        return true;
      }
    }

    return false;
  }

  /**
   * 获取指定长度的随机字母数字组合的字符串
   * @param int    $length    随机字符个数
   * @param int    $type      随机字符类型(0:大小写字母,1:数字,2:大写字母+特殊字符,3:小写字母+特殊字符, 4:中文字符+特殊字符, 默认为：数字+字母+特殊字符)
   * @param string $addChars  特殊字符(默认为空,若填写，可以选择或全部: !@#$%&_-)
   * @return string           指定长度的随机字符串
   */
  public static function random(int $length = 6, int $type = null, string $addChars = ''): string {
    $str = '';
    switch ($type) {
      case 0:
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnpqrstuvwxyz' . $addChars;
        break;
      case 1:
        $chars = str_repeat('0123456789', 3);
        break;
      case 2:
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ' . $addChars;
        break;
      case 3:
        $chars = 'abcdefghjkmnpqrstuvwxyz' . $addChars;
        break;
      case 4:
        $chars = "们以我到他会作时要动国产的一是工就年阶义发成部民可出能方进在了不和有大这主中人上为来分生对于学下级地个用同行面说种过命度革而多子后自社加小机也经力线本电高量长党得实家定深法表着水理化争现所二起政三好十战无农使性前等反体合斗路图把结第里正新开论之物从当两些还天资事队批点育重其思与间内去因件日利相由压员气业代全组数果期导平各基或月毛然如应形想制心样干都向变关问比展那它最及外没看治提五解系林者米群头意只明四道马认次文通但条较克又公孔领军流入接席位情运器并飞原油放立题质指建区验活众很教决特此常石强极土少已根共直团统式转别造切九你取西持总料连任志观调七么山程百报更见必真保热委手改管处己将修支识病象几先老光专什六型具示复安带每东增则完风回南广劳轮科北打积车计给节做务被整联步类集号列温装即毫知轴研单色坚据速防史拉世设达尔场织历花受求传口断况采精金界品判参层止边清至万确究书" . $addChars;
        break;
      default:
        $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz123456789' . $addChars;
        break;
    }
    if ($length > 10) {
      $chars = $type == 1 ? str_repeat($chars, $length) : str_repeat($chars, 5);
    }
    if ($type != 4) {
      $chars = str_shuffle($chars);
      $str = substr($chars, 0, $length);
    } else {
      for ($i = 0; $i < $length; $i++) {
        $str .= mb_substr($chars, floor(mt_rand(0, mb_strlen($chars, 'utf-8') - 1)), 1);
      }
    }
    return $str;
  }

  /**
   * 字符串转小写
   * @param string $value 待转换的字符串
   * @return string       字母全部小写的字符串
   */
  public static function lower(string $value): string {
    return mb_strtolower($value, 'UTF-8');
  }

  /**
   * 字符串转大写
   * @param string $value   待转换的字符串
   * @return string         字母全部大写的字符串
   */
  public static function upper(string $value): string {
    return mb_strtoupper($value, 'UTF-8');
  }

  /**
   * 获取字符串的长度
   * @param string $value   字符串
   * @return int            字符串的长度
   */
  public static function length(string $value): int {
    return mb_strlen($value);
  }

  /**
   * 截取字符串
   * @param string   $string  待截取的字符串
   * @param int      $start   截取开始位置（从0开始)
   * @param int|null $length  截取的长度
   * @return string           截取后的字符串
   */
  public static function substr(string $string, int $start, int $length = null): string {
    return mb_substr($string, $start, $length, 'UTF-8');
  }

  /**
   * 驼峰转下划线
   * @param string $value       大或小驼峰字符串
   * @param string $delimiter   连接符(默认为 _ 下划线)
   * @return string             蛇形格式字符串
   */
  public static function snake(string $value, string $delimiter = '_'): string {
    $key = $value;

    if (isset(static::$snakeCache[$key][$delimiter])) {
      return static::$snakeCache[$key][$delimiter];
    }

    if (!ctype_lower($value)) {
      $value = preg_replace('/\s+/u', '', ucwords($value));

      $value = static::lower(preg_replace('/(.)(?=[A-Z])/u', '$1' . $delimiter, $value));
    }

    return static::$snakeCache[$key][$delimiter] = $value;
  }

  /**
   * 下划线转大驼峰(首字母大写)
   * @param string $value   带有下划线的字符串
   * @return string         大驼峰格式的字符串
   */
  public static function studly(string $value): string {
    $key = $value;

    if (isset(static::$studlyCache[$key])) {
      return static::$studlyCache[$key];
    }

    $value = ucwords(str_replace(['-', '_'], ' ', $value));

    return static::$studlyCache[$key] = str_replace(' ', '', $value);
  }

  /**
   * 下划线转小驼峰(首字母小写)
   * @param string $value   带有下划线的字符串
   * @return string         小驼峰格式的字符串
   */
  public static function camel(string $value): string {
    if (isset(static::$camelCache[$value])) {
      return static::$camelCache[$value];
    }

    return static::$camelCache[$value] = lcfirst(static::studly($value));
  }

  /**
   * 转为首字母大写的标题格式
   * @param string $value 待转换的字符串
   * @return string       首字母大写的字符串
   */
  public static function title(string $value): string {
    return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
  }
}