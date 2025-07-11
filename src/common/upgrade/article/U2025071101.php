<?php

namespace app\common\upgrade\article;

use think\Exception;

class U2025071101
{
    /**
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $this->updateModuleConfig();
    }

    /**
     * @throws Exception
     */
    private function updateModuleConfig(): void
    {
        $group_id = (new \app\model\system\SystemConfigGroup)->where('module', 'article')->column('id');
        if (count($group_id) > 1) {
            $new_group_id = (new \app\model\system\SystemConfigGroup)->where(['module' => 'article', 'title' => '模块设置'])->value('id');
            if (empty($new_group_id)) $group_id = $group_id[0];
            else $group_id = $new_group_id;
        } else {
            $group_id = $group_id[0];
        }
        if (empty($group_id)) {
            throw new Exception('分组id为空');
        }
        (new \app\model\system\SystemConfig)->insertAll([
            [
                'name' => 'is_open_baidu_push',
                'type' => 'radio',
                'title' => '百度推送',
                'group_id' => $group_id,
                'options' => '1|允许' . PHP_EOL . '0|禁止',
                'help' => '当前模块内容是否允许百度推送,开启后内容发布后自动推送',
                'value' => '1',
                'extend' => NULL,
                'list' => '0',
                'module' => 'article',
                'status' => '1',
            ], [
                'name' => 'is_open_bing_push',
                'type' => 'radio',
                'title' => 'bing推送',
                'group_id' => $group_id,
                'options' => '1|允许' . PHP_EOL . '0|禁止',
                'help' => '当前模块内容是否允许bing推送,开启后内容发布后自动推送',
                'value' => '1',
                'extend' => NULL,
                'list' => '0',
                'module' => 'article',
                'status' => '1',
            ]
        ]);
    }

}
