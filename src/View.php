<?php
/**
 * View.php
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-27 22:04:17
 */

namespace xjx;


class View {
  /**
   * 模板文件
   * @var string
   */
  protected $file = '';
  /**
   * 模板变量
   * @var array
   */
  protected $vars = [];

  public function make($file) {
    $this->file = 'view/' . $file . '.html';
    return $this;
  }

  public function with($name, $value) {
    $this->vars[$name] = $value;
    return $this;
  }

  public function __toString() {
    extract($this->vars);
    include $this->file;
    return '';
  }
}