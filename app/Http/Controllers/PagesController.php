<?php

namespace App\Http\Controllers;

use App\Models\Advertise;
use App\Models\Announcement;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Models\Category;
use PhpParser\Node\Expr\Cast\Object_;

class PagesController extends Controller
{
    public function root(Category $category)
    {
        $announcements = Announcement::first();
        $advertises = Advertise::where('is_show', true)->get();
        $categories = $category->getCategoryLevel();

        $topics = Topic::OrderBy('created_at', 'desc')
            ->OrderBy('updated_at', 'desc')
            ->paginate();

        // foreach ($categories as $category) {

        //     dd($category->getCategoryLevel());

        //     // dda($category);
        //     // if (condition) {
        //     //     # code...
        //     // }
        //     // dd($category->isChildCategory());
        //     // foreach ($category_level = $category->getCategoryLevel() as $value) {
        //     //     if ($value['_data']) {
        //     //         $value['children'] = $value['_data'];
        //     //     }
        //     //     var_dump($value);
        //     // }
        //     // // dd($category->getCategoryLevel());
        //     // if ($category->hasChildCategory()) {
        //     //     dd($list);
        //     //     // foreach ($level = $category->getCategoryLevel() as $value) {
        //     //     //     dd($level);
        //     //     //     $category['child_category'] = $value['_data'];
        //     //     // }
        //     // }
        //     // // $category['child_category'] = $category->getCategoryLevel()['_data'];
        // }
        // dd($categories);
        // return;

        return view('pages.root', compact('announcements', 'advertises', 'topics', 'categories'));
    }
}
