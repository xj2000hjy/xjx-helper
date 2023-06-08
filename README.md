# xjx-helper
> PHP常用辅助类

## 前言

汇总作者发布的后端PHP开发常用的辅助方法，供大家一起交流学习，如果喜欢或者有所启发，请帮忙给个 Star ~，对作者也是一种鼓励，谢谢！

## 安装

```perl
composer require xjx/xjx-helper dev-master --prefer-dist
```

## Composer的基本使用
> 参考网址：
-  https://php.cnpkg.org
-  https://pkg.phpcomposer.com
-  https://mirrors.aliyun.com/composer/
-  https://packagist.org/

### 查看composer版本信息
```bash
composer --version
Composer version 2.5.4 2023-02-15 13:10:06
```

### 升级Composer到最新版本
```bash
composer self-update
```

### 查看全局配置选项参数
```bash
composer config -g  -l
```

### 配置全局阿里云镜像
```bash
composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
```

### 取消全局配置
```bash
composer config -g --unset repos.packagist
```

### 清除缓存
```bash
composer clear
```

### 初始化项目 -n 选项不需回答问题
```bash
composer init -n
```

### 安装项目所有的依赖包
```bash
composer install
```

### 快速的安装一个依赖包
```bash
composer require 类库标识(开发者/库名称)
```

### 更新所有依赖包
```bash
$ composer update
```
### update命令
> 可以更新lock文件，但是如果仅仅增加了一些描述，应该是不打算更新任何库。

```bash
composer update nothing
```

### 搜索依赖包：
```bash
composer search 类库标识(开发者/库名称)
```

### 优化一下自动加载
```bash
composer dump-autoload --optimize
```

### 重新根据composer.json文件配置autoload
```bash
composer dump
```

### 创建项目
```bash
composer create-project 类库标识(开发者/库名称) 项目名称 版本号 dev-master -prefer-dist
```
