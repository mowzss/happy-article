<?php

use think\facade\Route;

Route::group('article', function () {
    Route::rule(':id', 'content/index');
    Route::rule('list_:id', 'column/index');
    Route::rule('tag_:id', 'tag/show');
    Route::rule('', 'index/index');
})->pattern(['id' => '\d+']);
