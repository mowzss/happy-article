<?php

use think\facade\Route;

//前台内容页
Route::rule('article/:id', 'article/content/index')->pattern(['id' => '\d+']);
//后台内容管理
Route::rule('article/content_index', 'article/content/index');
//前台栏目内容列表
Route::rule('article/list_:id', 'article/column/index')->pattern(['id' => '\d+']);
//后台栏目管理
Route::rule('article/column_index', 'article/column/index')->pattern(['id' => '\d+']);
//前台标签内容列表
Route::rule('article/tag_:id', 'article/tag/show')->pattern(['id' => '\d+']);
