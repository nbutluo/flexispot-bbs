<?php

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function category_nav_active($category_id)
{
    return active_category_tab((if_route('categories.show') && if_route_param('category', $category_id)));
}

function make_excerpt($value, $length = 200)
{
    $excerpt = trim(preg_replace('/\r\n|\r|\n+/', ' ', strip_tags($value)));
    return Str::limit($excerpt, $length);
}

function dda($model)
{
    if (method_exists($model, 'toArray')) {
        dd($model->toArray());
    } else {
        dd($model);
    }
}

function active_navbar_class($condition, $activeClass = 'navbar-active', $inactiveClass = '')
{
    return app('active')->getClassIf($condition, $activeClass, $inactiveClass);
}

function active_admin_class($condition, $activeClass = 'active', $inactiveClass = '')
{
    return app('active')->getClassIf($condition, $activeClass, $inactiveClass);
}

function active_categories_class($category_id)
{
    return ($category_id % 2) == 0 ? 'DGtype' : 'QAtype';
}

function active_tab_class($condition, $activeClass = 'active_tab', $inactiveClass = '')
{
    return app('active')->getClassIf($condition, $activeClass, $inactiveClass);
}

function active_category_tab($condition, $activeClass = 'active-category-tab', $inactiveClass = '')
{
    return app('active')->getClassIf($condition, $activeClass, $inactiveClass);
}
