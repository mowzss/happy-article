<?php


namespace app\common\install\article;

use app\logic\system\MenuLogic;
use app\model\system\SystemConfigGroup;

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
        (new \app\model\system\SystemConfig)->insertAll(
            [
                ['name' => 'name', 'type' => 'text', 'title' => '模块名称', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块首页的SEO信息', 'value' => '文章模块', 'module' => 'article', 'status' => '1',],
                ['name' => 'seo_title', 'type' => 'text', 'title' => 'SEO标题', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块首页的SEO信息', 'value' => '文章模块', 'module' => 'article', 'status' => '1',],
                ['name' => 'seo_keywords', 'type' => 'text', 'title' => 'SEO关键词', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块首页的SEO信息', 'value' => '文章模块', 'module' => 'article', 'status' => '1',],
                ['name' => 'seo_description', 'type' => 'textarea', 'title' => 'SEO描述', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块首页的SEO信息', 'value' => '文章模块', 'module' => 'article', 'status' => '1',],
                ['name' => 'is_content_image_down', 'type' => 'switchs', 'title' => '远程图片', 'group_id' => $config_group, 'options' => '1|下载
0|不下载', 'help' => '是否自动下载远程图片本地化，保存位置和系统设置的上传位置一致', 'value' => '1', 'module' => 'article', 'status' => '1',],
                ['name' => 'is_content_thum', 'type' => 'switchs', 'title' => '缩略图', 'group_id' => $config_group, 'options' => '0|不处理
1|自动提取|is_content_thum_num', 'help' => '内容字段提取缩略图', 'value' => '', 'module' => 'article', 'status' => '1',],
                ['name' => 'is_content_thum_num', 'type' => 'text', 'title' => '缩略图数量', 'group_id' => $config_group, 'options' => '', 'help' => '自动提取内容字段缩略图数量，默认提取前5张图片，不支持指定排序，且组图字段有内容时不会自动提取', 'value' => '5', 'module' => 'article', 'status' => '1'],
                ['name' => 'is_content_purifer_html', 'type' => 'switchs', 'title' => '内容HTML过滤', 'group_id' => $config_group, 'options' => '1|开启|content_purifer_html,content_purifer_css,content_purifer_remove_empty
0|关闭', 'help' => '使用HTML Purifier对主题内容的html进行过滤', 'value' => '0', 'module' => 'article', 'status' => '1'],
                ['name' => 'content_purifer_html', 'type' => 'textarea', 'title' => 'HTML过滤规则', 'group_id' => $config_group, 'options' => '', 'help' => '设置允许使用的的html,推荐使用 h2,h3,h4,h5,p,strong,a[href|title],span[style],img[width|height|alt|src],table 可以根据自己的实际需求进行增删', 'value' => 'h2,h3,h4,h5,p,strong,a[href|title],span,img[width|height|alt|src],table', 'module' => 'article', 'status' => '1'],
                ['name' => 'content_purifer_css', 'type' => 'textarea', 'title' => 'CSS过滤规则', 'group_id' => $config_group, 'options' => '', 'help' => '可自行设置允许的css属性 默认数据 font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align 可根据自己实际需求进行增删', 'value' => 'font,font-size,font-weight,font-style,font-family,text-decoration,padding-left,color,background-color,text-align', 'module' => 'article', 'status' => '1',],
                ['name' => 'content_purifer_remove_empty', 'type' => 'switchs', 'title' => '移除空行', 'group_id' => $config_group, 'options' => '1|是
0|否', 'help' => '删除不含内容的段落标签 请按需合理设置', 'value' => '0', 'module' => 'article', 'status' => '1',],
                ['name' => 'is_open_fav', 'type' => 'switchs', 'title' => '用户收藏', 'group_id' => $config_group, 'options' => '1|允许' . PHP_EOL . '0|禁止', 'help' => '当前模块内容是否允许用户收藏', 'value' => '1', 'module' => 'article', 'status' => '1',],
                ['name' => 'is_open_sitemap', 'type' => 'switchs', 'title' => '生成sitemap', 'group_id' => $config_group, 'options' => '1|允许' . PHP_EOL . '0|禁止', 'help' => '当前模块内容是否允许生成sitemap,开启后可在系统管理》系统功能》Sitemap地图中开启自动生成计划任务', 'value' => '1', 'module' => 'article', 'status' => '1',],
                ['name' => 'is_open_search', 'type' => 'switchs', 'title' => '搜索功能', 'group_id' => $config_group, 'options' => '1|开启' . PHP_EOL . '0|关闭', 'help' => '当前模块内容是否允许搜索,系统默认使用迅搜全文搜索,开启后的内容自动索引,开启前数据需手动入库索引', 'value' => '1', 'module' => 'article', 'status' => '1',],
                ['name' => 'is_open_baidu_push', 'type' => 'switchs', 'title' => '百度推送', 'group_id' => $config_group, 'options' => '1|允许' . PHP_EOL . '0|禁止', 'help' => '当前模块内容是否允许百度推送,开启后内容发布后自动推送', 'value' => '1', 'module' => 'article', 'status' => '1',],
                ['name' => 'is_open_bing_push', 'type' => 'switchs', 'title' => 'bing推送', 'group_id' => $config_group, 'options' => '1|允许' . PHP_EOL . '0|禁止', 'help' => '当前模块内容是否允许bing推送,开启后内容发布后自动推送', 'value' => '1', 'module' => 'article', 'status' => '1',],
                ['name' => 'column_list_rows', 'type' => 'text', 'title' => '栏目列表页条数', 'group_id' => $config_group, 'options' => '', 'help' => '栏目列表页每页显示的内容条数，默认20条，模板不可单独指定', 'value' => '20', 'module' => 'article', 'status' => '1',],
                ['name' => 'posters_image', 'type' => 'image', 'title' => '默认海报图片', 'group_id' => $config_group, 'options' => '', 'help' => '当前模块默认海报图片，海报生成时候如果没有设置图片则使用此图片，优先级高于系统设置的全局默认海报图片', 'value' => '', 'module' => 'article', 'status' => '1',],
                ['name' => 'content_title_repeat_check', 'type' => 'switchs', 'title' => '标题重复检查', 'group_id' => $config_group, 'options' => '', 'help' => '开启后，后台新增或编辑内容时，同一栏目下标题重复将被拦截（仅后台提交生效）', 'value' => '0', 'module' => 'article', 'status' => '1',],
            ]
        );
    }
    
    private function installSystemMenu(): void
    {
        $MenuLogic = new MenuLogic();
        $MenuLogic->insertMenusBySlot($this->menu, 'content');
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
