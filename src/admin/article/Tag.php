<?php

namespace app\admin\article;

use app\model\article\ArticleTag;
use mowzs\lib\module\controller\admin\TagAdmin;

class Tag extends TagAdmin
{
    protected static string $modelClass = ArticleTag::class;
}
