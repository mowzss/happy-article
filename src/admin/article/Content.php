<?php
declare (strict_types=1);

namespace app\admin\article;

use app\model\article\ArticleColumn;
use app\model\article\ArticleContent;
use app\model\article\ArticleField;
use app\model\article\ArticleModel;
use mowzs\lib\module\controller\admin\ContentAdmin;

/**
 * 内容管理
 */
class Content extends ContentAdmin
{
    /**
     * 当前操作主模型
     * @var string
     */
    protected static string $modelClass = ArticleContent::class;
    /**
     * 栏目信息模型
     * @var string
     */
    protected static string $columnModelClass = ArticleColumn::class;
    /**
     * 字段信息模型
     * @var string
     */
    protected static string $fieldModelClass = ArticleField::class;
    /**
     * 模型信息 数据模型
     * @var string
     */
    protected static string $modelModelClass = ArticleModel::class;


}
