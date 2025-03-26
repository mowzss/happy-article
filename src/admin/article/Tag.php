<?php

namespace app\admin\article;

use app\model\article\ArticleTag;
use mowzs\lib\module\controller\admin\TagAdmin;

/**
 * TAG标签管理
 */
class Tag extends TagAdmin
{
    protected static string $modelClass = ArticleTag::class;
    
}
