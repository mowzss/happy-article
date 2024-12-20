<?php
declare (strict_types=1);

namespace app\admin\article;

use app\common\controllers\BaseAdmin;
use app\model\article\ArticleColumn;
use app\traits\CrudTrait;
use think\App;

/**
 * 栏目管理
 */
class Column extends BaseAdmin
{
    use CrudTrait;

    public function __construct(App $app, ArticleColumn $column)
    {
        parent::__construct($app);
        $this->model = $column;
    }
}
