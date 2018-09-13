<?php

namespace App\Services;

use App\Models\CafeShops;
use App\Models\Utilities;
use App\Models\Images;
use App\Models\Tags;
use App\Models\UtilitiesTags;

use Stichoza\GoogleTranslate\TranslateClient;
use Helpers\Api;

class CafeShopsService extends BaseService
{

    protected $utilitiesService;

    public function __construct(UtilitiesService $utilitiesService)
    {
        parent::__construct();

        $this->utilitiesService = $utilitiesService;
    }

    public function getModel()
    {
        return CafeShops::class;
    }

    /**
     * Find Cafe Shop
     * @param $id
     * @return array
     */
    public function findCF($id)
    {
        $result = array();

        $ut = $this->utilitiesService->find($id);
        $cafeShop = Utilities::select('*')->join('cafe_shops', 'utilities.id', 'cafe_shops.utilities_id')->where('utilities.id', $id)->first();
        $result['cafeShop'] = $cafeShop;

        if ($cafeShop != null) {

            $imageOfCS = $ut->images;
            $result['images'] = $imageOfCS;

            $tagOfCS = $ut->cates;
            $result['tags'] = $tagOfCS;
        }
        return $result;
    }

    /**
     * Create Cafe Shop
     * @param array $attribute
     * @return mixed
     */
    public function createCafeShop($attribute = [])
    {

        // add new Utility
        $attribute = $this->translateUtility($attribute);
        $user = new UsersService();
        $user_id = $user->findCondition('device_code', '=', $attribute['created_by']);
        $attribute['created_by'] = $user_id['id'];
        $utilities = $this->utilitiesService->create($attribute + ['type' => 3,]);

        // add new Vending Machine
        $utilities_id = $utilities->id;
        $this->create(['phone' => $attribute['phone'], 'website' => $attribute['website'], 'utilities_id' => $utilities_id]);

        // add new images of Vending Machine to images table
        if (!empty($attribute['imagesAdd'])) {
            foreach ($attribute['imagesAdd'] as $file) {
                if (!isset($file)) continue;
                $img_name = md5(date('ymdhis') . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                $des = 'upload/';
                $file->move($des, $img_name);
                $utilities->images()->create(['url' => $img_name]);
            }
        }

        // add new tags of Vending Machine to tags table
        if (!empty($attribute['tags'])) {
            $tags = explode(".", $attribute['tags']);
            foreach ($tags as $tag) {
                // new UtilitiesTags
                $utilities->utilitiesCates()->create(['category_id' => $tag]);
            }
        }

        return $utilities;
    }

    /**
     * Edit Post Box
     * @param $id
     * @param array $attribute
     * @return bool
     */
    public function edit($id, $attribute = [])
    {

        //Update Utility
        $attribute = $this->translateUtility($attribute);

        $utilities = $this->utilitiesService->update($id, $attribute + ['type' => 3,]);

        // Update Cafe Shop
        $cafeShop = CafeShops::select("*")->where('utilities_id', $id)->first();
        $this->update($cafeShop->id, ['phone' => $attribute['phone'], 'website' => $attribute['website']]);

        // Add images of Utilities
        if (!empty($attribute['imagesAdd'])) {
            foreach ($attribute['imagesAdd'] as $file) {
                if (!isset($file)) continue;
                $img_name = md5(date('ymdhis') . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                $des = 'upload/';
                $file->move($des, $img_name);
                $utilities->images()->create(['url' => $img_name]);
            }
        }

        // Delete Images of Utilities
        if (!empty($attribute['imagesDel'])) {
            $imagesDel = explode(".", $attribute['imagesDel']);
            foreach ($imagesDel as $image) {
                $img = Images::findOrFail($image);

                if (empty($img)) continue;
                $img_url = "upload/" . $img->url;

                if (File::exists($img_url)) {
                    File::delete($img_url);
                }
                $img->delete();
            }
        }

        // Delete all current tags
        $utilities->utilitiesCates()->delete();

        // add tags of Vending Machine to utilities_tags table
        if (!empty($attribute['tags'])) {
            $tags = explode(".", $attribute['tags']);
            foreach ($tags as $tag) {

                // new UtilitiesTags
                $utilities->utilitiesCates()->create(['category_id' => $tag]);
            }
        }
        return true;
    }
}
