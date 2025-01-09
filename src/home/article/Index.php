<?php
declare (strict_types=1);

namespace app\home\article;

use app\common\controllers\BaseHome;
use think\Exception;

class Index extends BaseHome
{
    /**
     * 模块首页
     * @return string
     * @throws Exception
     */
    public function index(): string
    {
        return $this->fetch();
    }
}
