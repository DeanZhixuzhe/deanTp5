<?php
use think\Route;
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::pattern(['id'=>'\d+','name'=>'\w+']);
Route::any('base/sdfl/sdf11','admin/Admin/base');
// Route::get('luyoutest/[:name]/[:city]','admin/Admin/luyoutest',[],[  'city' => '[A-Za-z]+' ]);
// Route::get(':action/[:name]','admin/Admin/:action');
// Route::alias('admin','admin/Admin');
// Route::get('ceshitihuan/[:name]',function(){
// 	return  '测试替换';
// });

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//         'id'   => '\d+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],
//     // 'base/adidj'		=> 'admin/admin/base',

// ];

