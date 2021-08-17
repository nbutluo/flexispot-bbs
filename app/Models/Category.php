<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Houdunwang\Arr\Arr as HdArr;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['name', 'description', 'is_show', 'pid'];

    public function getAllCategories($category = null)
    {
        $categories = $this->get()->toArray();

        if (!is_null($category)) {
            foreach ($categories as $key => $value) {
                // 遍历的分类id 等于 传递进来分类的pid则选中
                $categories[$key]['_selected'] =  $category['pid'] == $value['id'];

                // 当前分类不能选择自身，也不可以选择其自身的子分类
                $categories[$key]['_disabled'] = $category['id'] == $value['id'] || (new HdArr)->isChild($categories, $value['id'], $category['id'], 'id');
            }
        }
        return (new HdArr)->tree($categories, 'name',  'id');
    }

    // 判断是否含有子分类
    public function hasChildCategory()
    {
        $categories = $this->get()->toArray();

        return (new HdArr)->hasChild($categories, $this->id);
    }

    // 获得多级目录列表（多维数组）
    public function getCategoryLevel()
    {
        $categories = $this->get()->toArray();

        return (new HdArr)->channelLevel($categories, 0, "&nbsp;", 'id');
    }
}
