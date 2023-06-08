<?php
namespace xjx\json;

/**
 * 接口响应类
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-26 23:26:09
 */
class Resp {

  protected static $tmp_result = [];

  /**
   * 成功提示信息
   * @param string|array $data   数据信息(默认为null)
   * @param string       $msg    提示信息(默认：Token验证成功)
   * @param string       $status 操作结果状态(自定义,默认为 err)
   * @param string|int   $code   操作结果代码(数值型,默认为1)
   * @return void
   */
  public static function success($data = null, $msg = '操作成功', $status = 'ok', $code = '1') {
    header("Content-type:application/json;charset=utf-8");
    static::$tmp_result = [
      'status' => $status,
      'code'   => $code,
      'msg'    => $msg,
    ];

    if (is_array($data)) {
      if (empty($data)) {
        $result = array_merge(static::$tmp_result, ['data' => $data]);
      } else {
        if (count($data) != count($data, 1)) { // 二维数组
          $result = array_merge(static::$tmp_result, ['data' => $data]);
        } else { // 一维数组
          $result = array_merge(static::$tmp_result, ['data' => [$data]]);
        }
      }
    } elseif (is_object($data)) {
      $result = array_merge(static::$tmp_result, ['data' => [$data]]);
    } else {
      $result = array_merge(static::$tmp_result, ['data' => []]);
    }

    # ob_clean();
    exit(json_encode($result, JSON_UNESCAPED_UNICODE));
  }

  /**
   * 错误提示信息
   * @param string|array $data   数据信息(默认为null)
   * @param string       $msg    提示信息
   * @param string       $status 操作结果状态(自定义,默认为 err)
   * @param string|int   $code   操作结果代码(数值型,默认为0)
   * @return void
   */
  public static function error($data = null, $msg = '操作失败', $status = 'err', $code = '0') {
    header("Content-type:application/json;charset=utf-8");
    static::$tmp_result = [
      'status' => $status,
      'code'   => $code,
      'msg'    => $msg,
    ];

    if (is_array($data)) {
      if (empty($data)) {
        $result = array_merge(static::$tmp_result, ['data' => $data]);
      } else {
        if (count($data) != count($data, 1)) {
          $result = array_merge(static::$tmp_result, ['data' => $data]);
        } else {
          $result = array_merge(static::$tmp_result, ['data' => [$data]]);
        }
      }
    } elseif (is_object($data)) {
      $result = array_merge(static::$tmp_result, ['data' => [$data]]);
    }
    else {
      $result = array_merge(static::$tmp_result, ['data' => []]);
    }

    # ob_clean();
    exit(json_encode($result, JSON_UNESCAPED_UNICODE));
  }
}