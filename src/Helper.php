<?php
/**
 * Helper.php
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-26 23:23:57
 */

namespace Xjx\XjxHelper;

use Xjx\XjxHelper\json\Resp;

class Helper {
  /**
   * 成功提示信息
   * @param string|array $data   数据信息(默认为null)
   * @param string       $msg    提示信息(默认：Token验证成功)
   * @param string       $status 操作结果状态(自定义,默认为 err)
   * @param string|int   $code   操作结果代码(数值型,默认为1)
   * @return void
   */
  public static function success($data = null, $msg = '操作成功', $status = 'ok', $code = '1') {
    Resp::success($data, $msg, $status, $code);
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
    Resp::error($data, $msg, $status, $code);
  }
}