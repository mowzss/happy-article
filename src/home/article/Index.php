<?php
declare (strict_types=1);

namespace app\home\article;

use app\common\controllers\BaseHome;

class Index extends BaseHome
{
    /**
     * 模块首页
     * @return void
     */
    public function index(): void
    {
        $this->fetch();
    }
}
