<?php
/**
 * 模块基本信息
 * install_files 可以包含 sql文件名和 安装助手类
 * 注 sql文件一般用于建表 增删字段 等数据库操作
 * 安装助手，一般用于处理与其他模块的关联数据 如写入系统模块数据 系统菜单等操作 不便于直接使用原生sql语句处理的数据操作
 */
return [
    //模块名称
    'name' => '文章模块',
    //模块简介
    'info' => '模块简介',
    //版本号
    'version' => '1.0.0',
    //是否允许复制模块
    'is_copy' => true,
    //安装数据文件
    'install_files' => [
        'install.sql',
        app\common\install\article\Install::class,
    ],
    //安装模块标记 系统唯一
    'keyword' => 'article'
];
