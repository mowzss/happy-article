<?php

namespace app\common\upgrade\article;

use think\facade\Db;

/**
 * 2026-11-21 百度自动生成 TAG 开关
 *
 * 为当前模块新增配置项 is_open_baidu_tag，用于控制保存内容时是否调用百度 AI
 * 自动提取关键词生成 TAG。
 *
 * 幂等：配置项已存在则跳过，可重复执行。
 */
class U2026112101
{
    /**
     * 所属模块标识
     * @var string
     */
    protected string $module = 'article';

    /**
     * 升级入口
     * @return void
     */
    public function run(): void
    {
        $this->ensureConfig();
    }

    /**
     * 确保 is_open_baidu_tag 配置存在
     * @return void
     */
    protected function ensureConfig(): void
    {
        $exists = Db::name('system_config')
            ->where('module', $this->module)
            ->where('name', 'is_open_baidu_tag')
            ->find();
        if ($exists) {
            return;
        }

        $groupId = $this->resolveGroupId();
        if (empty($groupId)) {
            // 未找到当前模块的配置分组时不创建，避免挂到错误分组
            return;
        }

        Db::name('system_config')->insert([
            'name'        => 'is_open_baidu_tag',
            'type'        => 'switchs',
            'title'       => '百度自动生成TAG',
            'group_id'    => $groupId,
            'options'     => '1|开启' . PHP_EOL . '0|关闭',
            'help'        => '开启后，保存内容时若未手动填写TAG，将通过百度AI自动提取关键词生成TAG；关闭则跳过（需先在系统设置中配置百度Token）',
            'value'       => '1',
            'extend'      => '',
            'list'        => 9000,
            'module'      => $this->module,
            'status'      => 1,
            'create_time' => time(),
            'update_time' => time(),
        ]);
    }

    /**
     * 解析当前模块的配置分组ID
     * 优先取「标题重复检查」所在分组，其次取该模块最早创建的配置分组
     * @return int
     */
    protected function resolveGroupId(): int
    {
        $anchor = Db::name('system_config')
            ->where('module', $this->module)
            ->where('name', 'content_title_repeat_check')
            ->find();
        if ($anchor) {
            return (int)$anchor['group_id'];
        }
        return (int)Db::name('system_config_group')
            ->where('module', $this->module)
            ->order('id', 'asc')
            ->value('id');
    }
}
