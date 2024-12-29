<?php

namespace app\admin\article;

use app\common\controllers\module\admin\FieldAdmin;
use app\model\article\ArticleColumn;
use app\model\article\ArticleContent;
use app\model\article\ArticleField;
use app\model\article\ArticleModel;

class Field extends FieldAdmin
{
    /**
     * 字段模型
     * @var string
     */
    protected static string $modelClass = ArticleField::class;
    /**
     * 内容设计模型
     * @var string
     */
    protected static string $moduleModelClass = ArticleModel::class;

    /**
     *内容 模型
     * @var string
     */
    protected static string $contentModelClass = ArticleContent::class;
    /**
     * 分类模型
     * @var string
     */
    protected static string $columnModelClass = ArticleColumn::class;
}
