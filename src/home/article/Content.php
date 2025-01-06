<?php

namespace app\home\article;

use mowzs\lib\module\controller\home\ContentHome;
use mowzs\lib\module\service\ContentBaseService;

class Content extends ContentHome
{
    /**
     * 定义服务类
     * @var string
     */
    protected static string $serviceClass = ContentBaseService::class;
}
