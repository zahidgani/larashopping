<?php
Route::get("test","laravelcms\shopping\ProductController@index");
Route::get("add-product","laravelcms\shopping\ProductController@form_product");
Route::get("manage-product","laravelcms\shopping\ProductController@list_product");
Route::post("add-products","laravelcms\shopping\ProductController@form_submitted");