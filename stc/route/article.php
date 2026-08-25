<?php

use think\facade\Route;

Route::group('article', function () {
    Route::get('', 'article/index/index');
    //前台内容页
    Route::get(':id', 'article/details/index');
    //前台栏目内容列表
    Route::get('list_:id', 'article/columns/index');
    //前台标签内容列表
    Route::get('tag_:id', 'article/tag/show');
    Route::get('tag', 'article/tag/index');
})->pattern(['id' => '\d+']);
