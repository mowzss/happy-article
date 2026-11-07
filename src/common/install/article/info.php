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
    //卸载声明：仅清理以下声明范围内的数据，未声明的数据不会被删除
    'uninstall' => [
        //需要删除的数据表（ha_ 会按当前数据库前缀自动替换）
        'tables' => [
            'ha_article_column',
            'ha_article_content',
            'ha_article_content_1',
            'ha_article_content_1s',
            'ha_article_field',
            'ha_article_model',
            'ha_article_tag',
            'ha_article_tag_info',
        ],
        //后台菜单：按 slot 与节点前缀删除（含所有子菜单）
        'menus' => [
            'slot' => 'content_article',
            'node_prefix' => 'article/',
        ],
        //模块配置：system_config / system_config_group 中的 module 标记
        'configs' => [
            'module' => 'article',
        ],
        //需要删除的已部署文件（相对项目根目录）
        'files' => [
            'app/home/article',
            'app/admin/article',
            'app/model/article',
            'app/common/install/article',
            'app/common/upgrade/article',
            'route/article.php',
        ],
    ],
    'keyword' => 'article'
];
