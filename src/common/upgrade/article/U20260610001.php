<?php

namespace app\common\upgrade\article;

use think\Exception;

class U20260610001
{
    /**
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        $this->updateModuleConfig();
    }
    
    /**
     * @return void
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
        \app\model\system\SystemConfig::create(
            [
                'name' => 'posters_image',
                'type' => 'image',
                'title' => '默认海报图片',
                'group_id' => $group_id,
                'options' => '',
                'help' => '当前模块默认海报图片，海报生成时候如果没有设置图片则使用此图片，优先级高于系统设置的全局默认海报图片',
                'value' => '',
                'extend' => NULL,
                'list' => '0',
                'module' => 'article',
                'status' => '1',
            ]);
    }
}
