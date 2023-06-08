<?php
/**
 * Index.php
 * @author  小俊侠
 * @version V1.0
 * @date    2023-05-27 21:47:11
 */

namespace xjx\controller;


use xjx\View;

use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class Index {
  protected $view;

  public function __construct() {
    $this->view = new View();
  }

  public function show() {
    return $this->view->make('show')->with('copyright', '小俊侠@copyright 2023-2024');
//    dump('default show page.');
  }

  public function post() {
    return $this->view->make('post');
  }

  /**
   * 提交信息
   * 访问： http://localhost:8080/index.php?s=index/submit
   */
  public function submit() {
//    dump($_SESSION['code'], false);
//    dump($_POST['verify_code']);
    if (stristr($_SESSION['code'], $_POST['verify_code'])) {
      // instructions if user phrase is good
      dump('验证码正确');
    } else {
      // user phrase is wrong
      dump('验证码错误');
    }
  }

  /**
   * 获取验证码图片
   * 访问： http://localhost:8080/index.php?s=index/code
   */
  public function code() {

    $phraseBuilder = new PhraseBuilder(4);
    $builder = new CaptchaBuilder(null, $phraseBuilder);
    $builder->build();
    header('Content-type: image/jpeg');
    $_SESSION['code'] = $builder->getPhrase();
    $builder->output();
  }

}