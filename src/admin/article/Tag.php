<?php
declare (strict_types=1);

namespace app\admin\article;

use app\model\article\ArticleTag;
use mowzs\cms\controller\admin\TagAdmin;

/**
 * TAG标签管理
 */
class Tag extends TagAdmin
{
    protected static string $modelClass = ArticleTag::class;

}
