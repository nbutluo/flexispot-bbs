<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SeedCategoriesData extends Migration
{
    public function up()
    {
        $categories = [
            [
                'name'        => 'News & Announcements',
                'description' => '新闻与公告',
                'pid' => 0
            ],
            [
                'name'        => 'Deals & Giveaways',
                'description' => '优惠与赠品',
                'pid' => 0
            ],
            [
                'name'        => 'General & Product Discussion',
                'description' => '产品讨论',
                'pid' => 0
            ],
            [
                'name'        => 'Questions & Answers',
                'description' => '问题与答案',
                'pid' => 0
            ],
            [
                'name'        => 'Product Reviews',
                'description' => '产品评论',
                'pid' => 0
            ],
            [
                'name'        => 'Ideas & Suggestions',
                'description' => '想法与建议',
                'pid' => 0
            ],
            [
                'name' =>  'Serie 1',
                'description' => '产品讨论',
                'pid' => 3
            ],
            [
                'name' =>  'Serie 2',
                'description' => '产品讨论',
                'pid' => 3
            ],
            [
                'name' =>  'Standing desks',
                'description' => '想法与建议',
                'pid' => 6
            ],
            [
                'name' =>  'Desk bikes',
                'description' => '想法与建议',
                'pid' => 6
            ],
            [
                'name' =>  'Desk converters',
                'description' => '想法与建议',
                'pid' => 6
            ],
            [
                'name' =>  'Services',
                'description' => '想法与建议',
                'pid' => 6
            ],
            [
                'name' =>  'Others',
                'description' => '想法与建议',
                'pid' => 6
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    public function down()
    {
        DB::table('categories')->truncate();
    }
}
