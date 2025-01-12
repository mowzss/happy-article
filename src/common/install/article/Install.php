<?php

namespace app\common\install\article;

use app\model\system\SystemConfigGroup;
use app\service\system\MenuService;

/**
 * 模块安装
 * 用于数据库插入记录
 * 建表操作建议使用sql文件 模块安装默认使用install.sql文件
 * 升级操作在 src/common/upgrade目录
 *
 */
class Install
{

    public function run(): void
    {
        //插入模块管理菜单
        $this->installSystemMenu();
        //插入模块配置信息
        $this->installSysConfig();
    }

    private function installSysConfig(): void
    {
        $config_group = (new SystemConfigGroup())->insert(['title' => '文章模块设置', 'sys_show' => '0', 'module' => 'article', 'status' => '1'], true);
        (new \app\model\system\SystemConfig)->insertAll([
                ['name' => 'name', 'type' => 'text', 'title' => '模块名称', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块首页的SEO信息', 'value' => '文章模块', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1',],
                ['name' => 'seo_title', 'type' => 'text', 'title' => 'SEO标题', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块首页的SEO信息', 'value' => '文章模块', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1',],
                ['name' => 'seo_keywords', 'type' => 'text', 'title' => 'SEO关键词', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块首页的SEO信息', 'value' => '文章模块', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1',],
                ['name' => 'seo_description', 'type' => 'textarea', 'title' => 'SEO描述', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块首页的SEO信息', 'value' => '文章模块', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1',],
                ['id' => '47', 'name' => 'is_content_image_down', 'type' => 'radio', 'title' => '远程图片', 'group_id' => '7', 'options' => '1|下载
0|不下载', 'help' => '是否自动下载远程图片本地化，保存位置和系统设置的上传位置一致', 'value' => '1', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1', 'create_time' => '1736671442', 'update_time' => '1736671442'],
                ['id' => '48', 'name' => 'is_content_thum', 'type' => 'radio', 'title' => '缩略图', 'group_id' => '7', 'options' => '0|不处理
1|自动提取|is_content_thum_num', 'help' => '内容字段提取缩略图', 'value' => '', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1', 'create_time' => '1736671570', 'update_time' => '1736671570'],
                ['id' => '49', 'name' => 'is_content_thum_num', 'type' => 'text', 'title' => '缩略图数量', 'group_id' => '7', 'options' => '', 'help' => '自动提取内容字段缩略图数量，默认提取前5张图片，不支持指定排序，且组图字段有内容时不会自动提取', 'value' => '5', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1', 'create_time' => '1736671655', 'update_time' => '1736671706'],
                ['id' => '50', 'name' => 'is_content_purifer_html', 'type' => 'radio', 'title' => '内容HTML过滤', 'group_id' => '7', 'options' => '1|开启|content_purifer_html,content_purifer_css,content_purifer_remove_empty
0|关闭', 'help' => '使用HTML Purifier对主题内容的html进行过滤', 'value' => '0', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1', 'create_time' => '1736671976', 'update_time' => '1736671976'],
                ['id' => '51', 'name' => 'content_purifer_html', 'type' => 'textarea', 'title' => 'HTML过滤规则', 'group_id' => '7', 'options' => '', 'help' => '设置允许使用的的html,推荐使用 h2,h3,h4,h5,p,strong,a[href|title],span[style],img[width|height|alt|src],table 可以根据自己的实际需求进行增删', 'value' => 'h2,h3,h4,h5,p,strong,a[href|title],span,img[width|height|alt|src],table', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1', 'create_time' => '1736672068', 'update_time' => '1736672228'],
                ['id' => '52', 'name' => 'content_purifer_css', 'type' => 'textarea', 'title' => 'CSS过滤规则', 'group_id' => '7', 'options' => '', 'help' => '可自行设置允许的css属性 默认数据 font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align 可根据自己实际需求进行增删', 'value' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1', 'create_time' => '1736672154', 'update_time' => '1736672154'],
                ['id' => '53', 'name' => 'content_purifer_remove_empty', 'type' => 'radio', 'title' => '移除空行', 'group_id' => '7', 'options' => '1|是
0|否', 'help' => '删除不含内容的段落标签 请按需合理设置', 'value' => '0', 'extend' => NULL, 'list' => '0', 'module' => 'article', 'status' => '1', 'create_time' => '1736672204', 'update_time' => '1736672204']

            ]
        );
    }

    private function installSystemMenu(): void
    {
        $menuService = new MenuService();
        $menuService->insertMenusBySlot($this->menu, 'content');
    }

    /**
     * 菜单数据
     * @var array|array[]
     */
    private array $menu = [
        [
            'title' => '文章模块',
            'slot' => 'content_article',
            'icon' => 'layui-icon layui-icon-app',
            'node' => '',
            'params' => '',
            'class' => '1',
            'list' => '0',
            'status' => '1',
            'sub' => [
                ['title' => '模块设置', 'icon' => '', 'node' => 'article/setting/index', 'params' => '', 'class' => '1', 'list' => '10000', 'status' => '1'],
                ['title' => '内容列表', 'icon' => '', 'node' => 'article/content/index', 'params' => '', 'class' => '1', 'list' => '9000', 'status' => '1'],
                ['title' => '分类管理', 'icon' => '', 'node' => 'article/column/index', 'params' => '', 'class' => '1', 'list' => '8000', 'status' => '1'],
                ['title' => 'TAG标签', 'icon' => '', 'node' => 'article/tag/index', 'params' => '', 'class' => '1', 'list' => '7000', 'status' => '1'],
                ['title' => '模型设计', 'icon' => '', 'node' => 'article/model/index', 'params' => '', 'class' => '1', 'list' => '6000', 'status' => '1'],
            ],
        ],

    ];
}
