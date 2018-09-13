<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $category_service = new \App\Services\CategoriesService();
        $categoryType = \App\Models\Categories::TYPE_ALL;
        $currentTime = date('Y-m-d H:i:s');
        $listCats = [[
            'id' => \App\Models\Categories::TYPE_VENDING_MACHINE,
            'slug' => str_random('20'),
            'name' => 'Máy bàn hàng tự đông',
            'name_vi' => 'autobot',
            'name_en' => 'autobot',
            'name_cn' => 'autobot',
            'name_es' => 'autobot',
            'name_fr' => 'autobot',
            'type' => $categoryType
        ], [
            'id' => \App\Models\Categories::TYPE_POSTBOX,
            'slug' => str_random('20'),
            'name' => 'Hòm thư',
            'name_vi' => 'autobot',
            'name_en' => 'autobot',
            'name_cn' => 'autobot',
            'name_es' => 'autobot',
            'name_fr' => 'autobot',
            'type' => $categoryType
        ], [
            'id' => \App\Models\Categories::TYPE_CAFE_SHOP,
            'slug' => str_random('20'),
            'name' => 'Quán cafe',
            'name_vi' => 'autobot',
            'name_en' => 'autobot',
            'name_cn' => 'autobot',
            'name_es' => 'autobot',
            'name_fr' => 'autobot',
            'type' => $categoryType
        ], [
            'id' => \App\Models\Categories::TYPE_CONVENIENCE_STORE,
            'slug' => str_random('20'),
            'name' => 'Cửa hàng tiện ích',
            'name_vi' => 'autobot',
            'name_en' => 'autobot',
            'name_cn' => 'autobot',
            'name_es' => 'autobot',
            'name_fr' => 'autobot',
            'type' => $categoryType
        ], [
            'id' => \App\Models\Categories::TYPE_SUPERMARKET,
            'slug' => str_random('20'),
            'name' => 'Siêu thị',
            'name_vi' => 'autobot',
            'name_en' => 'autobot',
            'name_cn' => 'autobot',
            'name_es' => 'autobot',
            'name_fr' => 'autobot',
            'type' => $categoryType
        ],
        ];

        foreach ($listCats as $key => $cat) {
            $cat = array_merge($cat, ['created_at' => $currentTime, 'updated_at' => $currentTime]);
            $category_service->updateOrCreate(['id' => $cat['id']], $cat);
        }
    }
}
