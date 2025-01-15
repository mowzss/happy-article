<?php

use think\facade\Route;

Route::group('article', function () {
    Route::rule(':id', 'article/content/index');
    Route::rule('list_:id', 'article/column/index');
    Route::rule('tag_:id', 'article/tag/show');
    Route::rule('tag', 'article/tag/index');
    Route::rule('', 'article/index/index');
})->pattern(['id' => '\d+', 'name' => '\w+']);

Route::auto();
