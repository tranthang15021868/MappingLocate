<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languageService = new \App\Services\LanguagesService();
        $currentTime = date('Y-m-d H:i:s');
        $listLangs = [
            ['id' => 1, 'name' => 'Tiếng Nhật', 'slug' => 'jp'],
            ['id' => 2, 'name' => 'Tiếng Việt', 'slug' => 'vi'],
            ['id' => 3, 'name' => 'Tiếng Anh', 'slug' => 'en'],
            ['id' => 4, 'name' => 'Tiếng Trung', 'slug' => 'cn'],
            ['id' => 5, 'name' => 'Tiếng Tây Ban Nha', 'slug' => 'es'],
            ['id' => 6, 'name' => 'Tiếng Pháp', 'slug' => 'fr'],
        ];
        foreach ($listLangs as $key => $lang) {
            $lang = array_merge($lang, ['created_at' => $currentTime, 'updated_at' => $currentTime]);
            $languageService->updateOrCreate(['id' => $lang['id']], $lang);
        }
    }
}
