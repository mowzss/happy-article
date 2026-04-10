<?php

use think\facade\Route;

Route::group('article', static function () {
    Route::rule('', 'article/index/index');
    //前台内容页
    Route::rule(':id', 'article/content/index');
//后台内容管理
    Route::rule('content_index', 'article/content/index');
//前台栏目内容列表
    Route::rule('list_:id', 'article/column/index');
//后台栏目管理
    Route::rule('column_index', 'article/column/index');
//前台标签内容列表
    Route::rule('tag_:id', 'article/tag/show');
})->pattern(['id' => '\d+']);
