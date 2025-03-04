<?php

namespace app\common\upgrade\article;

class U20250304
{

    public function run()
    {
        $this->updateModuleConfig();
    }

    private function updateModuleConfig()
    {
        $group_id = (new \app\model\system\SystemConfigGroup)->where('module', 'article')->column('id');
        if (count($group_id) > 1) {
            $new_group_id = (new \app\model\system\SystemConfigGroup)->where(['module' => 'article', 'title' => '模块设置'])->value('id');
            if (empty($new_group_id)) $group_id = $group_id[0];
            else $group_id = $new_group_id;
        }
        (new \app\model\system\SystemConfig)->insertAll([
            [
                'name' => 'is_open_fav',
                'type' => 'radio',
                'title' => '用户收藏',
                'group_id' => $group_id,
                'options' => '1|允许' . PHP_EOL . '0|禁止',
                'help' => '当前模块内容是否允许用户收藏',
                'value' => '1',
                'extend' => NULL,
                'list' => '0',
                'module' => 'article',
                'status' => '1',
            ], [
                'name' => 'is_open_sitemap',
                'type' => 'radio',
                'title' => '生成sitemap',
                'group_id' => $group_id,
                'options' => '1|允许' . PHP_EOL . '0|禁止',
                'help' => '当前模块内容是否允许生成sitemap,开启后可在系统管理》系统功能》Sitemap地图中开启自动生成计划任务',
                'value' => '1',
                'extend' => NULL,
                'list' => '0',
                'module' => 'article',
                'status' => '1',
            ], [
                'name' => 'is_open_search',
                'type' => 'radio',
                'title' => '搜索功能',
                'group_id' => $group_id,
                'options' => '1|开启' . PHP_EOL . '0|关闭',
                'help' => '当前模块内容是否允许搜索,系统默认使用迅搜全文搜索,开启后的内容自动索引,开启前数据需手动入库索引',
                'value' => '1',
                'extend' => NULL,
                'list' => '0',
                'module' => 'article',
                'status' => '1',
            ],
        ]);
    }

}
