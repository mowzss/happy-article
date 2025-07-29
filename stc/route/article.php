<?php

use think\facade\Route;

Route::rule('article/:id', 'article/content/index')->pattern(['id' => '\d+']);
Route::rule('article/list_:id', 'article/column/index')->pattern(['id' => '\d+']);
Route::rule('article/tag_:id', 'article/tag/show')->pattern(['id' => '\d+']);
Route::rule('article', 'article/index/index')->pattern(['id' => '\d+']);
