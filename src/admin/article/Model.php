<?php

namespace app\admin\article;

use app\common\controllers\module\admin\ModelAdmin;
use app\model\article\ArticleField;
use app\model\article\ArticleModel;

class Model extends ModelAdmin
{
    /**
     * 模型类 模型
     * @var string
     */
    protected static string $modelClass = ArticleModel::class;
    /**
     * 字段类 模型
     * @var string
     */
    protected static string $fieldClass = ArticleField::class;
}
