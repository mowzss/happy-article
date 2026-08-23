<?php

use think\facade\Route;

Route::group('article', function () {
    Route::get('', 'index/index');
    //前台内容页
    Route::get(':id', 'content/index');
    //前台栏目内容列表
    Route::get('list_:id', 'column/index');
    //前台标签内容列表
    Route::get('tag_:id', 'tag/show');
    Route::get('tag', 'tag/index');
})->pattern(['id' => '\d+'])->namespace('app\home\article');
