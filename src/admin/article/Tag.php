<?php

namespace app\admin\article;

use app\common\controllers\module\admin\TagAdmin;
use app\model\article\ArticleTag;

class Tag extends TagAdmin
{
    protected static string $modelClass = ArticleTag::class;
}
