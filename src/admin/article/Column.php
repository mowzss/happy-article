<?php
declare (strict_types=1);

namespace app\admin\article;

use app\model\article\ArticleColumn;
use app\model\article\ArticleModel;
use mowzs\lib\module\controller\admin\ColumnAdmin;

/**
 * 栏目管理
 */
class Column extends ColumnAdmin
{

    protected static string $moduleModelClass = ArticleModel::class;

    protected static string $modelClass = ArticleColumn::class;
}
