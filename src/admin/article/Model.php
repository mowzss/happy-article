<?php

namespace app\admin\article;

use app\common\controllers\module\admin\ModelAdmin;
use app\model\article\ArticleModel;

class Model extends ModelAdmin
{
    protected static string $modelClass = ArticleModel::class;
}
