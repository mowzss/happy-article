<?php

use think\facade\Route;

Route::group('article', static function () {
    Route::rule('', 'article/index');
    //前台内容页
    Route::rule(':id', 'article/content');
    //前台栏目内容列表
    Route::rule('list_:id', 'article/column');
    //前台标签内容列表
    Route::rule('tag_:id', 'article/tag_show');
})->pattern(['id' => '\d+']);
