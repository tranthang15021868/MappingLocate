<?php

namespace App\Services;

use App\Models\SuperMarket;
use App\Models\Utilities;
use App\Models\Images;
use App\Models\Tags;
use Helpers\Api;

use Stichoza\GoogleTranslate\TranslateClient;

class SuperMarketService extends BaseService
{

    protected $utilitiesService;

    /**
     * SuperMarketService constructor.
     * @param UtilitiesService $utilitiesService\
     */
    public function __construct(UtilitiesService $utilitiesService)
    {
        parent::__construct();

        $this->utilitiesService = $utilitiesService;
    }

    /**
     * Get Model
     * @return string
     */
    public function getModel()
    {
        return SuperMarket::class;
    }

    /**
     * @param $ward_replace
     * @return mixed
     */
    public function searchByArea($ward_replace)
    {
        $model = $this->_model;
        return $model::where('area', 'like', '%' . $ward_replace . '%')->get();
    }

    /**
     * Find Supermarket with id
     * @param $id
     * @return array
     */
    public function findSM($id)
    {
        $result = array();
        $ut = $this->utilitiesService->find($id);
        $supermarket = Utilities::select('*')->join('supermarket', 'utilities.id', 'supermarket.utilities_id')->where('utilities.id', $id)->first();
        $result['supermarket'] = $supermarket;

        if ($supermarket != null) {

            $imageOfSM = $ut->images;
            $result['images'] = $imageOfSM;

            $tagOfSM = $ut->cates;
            $result['tags'] = $tagOfSM;

            $serviceOfSM = $this->find($supermarket->id)->supermarketService;
            $result['services'] = $serviceOfSM;
        }
        return $result;
    }

    /**
     * Create Supermarket
     * @param array $attribute
     * @return mixed
     */
    public function createSupermarket($attribute = [])
    {

        // add new Utility
        $attribute = $this->translateUtility($attribute);
        $user = new UsersService();
        $user_id = $user->findCondition('device_code', '=', $attribute['created_by']);
        $attribute['created_by'] = $user_id['id'];
        $utilities = $this->utilitiesService->create($attribute + ['type' => 5,]);

        // Add new Supermarket
        $utilities_id = $utilities->id;
        $supermarket = $this->create(['utilities_id' => $utilities_id, 'tel' => $attribute['phone'], 'business_hour' => $attribute['business_hour'], 'payment_method' => $attribute['paymentMethod'], 'road_goal' => $attribute['roadGoal'], 'store_type' => $attribute['storeType']]);

        // add new images
        if (!empty($attribute['imagesAdd'])) {
            foreach ($attribute['imagesAdd'] as $file) {
                if (!isset($file)) continue;
                $img_name = md5(date('ymdhis') . $file->getClientOriginalName()) . '.' . $file->getClientOriginalExtension();
                $des = 'upload/';
                $file->move($des, $img_name);
                $utilities->images()->create(['url' => $img_name]);
            }
        }

        // add Tag of Utilities
        if (!empty($attribute['tags'])) {
            $tags = explode(".", $attribute['tags']);
            foreach ($tags as $tag) {
                // new UtilitiesTags
                $utilities->utilitiesCates()->create(['category_id' => $tag]);
            }
        }

        // add service of Supermarket
        if (!empty($attribute['smService'])) {
            $smService = explode(".", $attribute['smService']);
            foreach ($smService as $service) {
                // new supermarketService
                $supermarket->supermarketService()->create(['service_id' => $service]);
            }
        }
        return $utilities;
    }

    /**
     * Edit Supermarket
     * @param $id
     * @param array $attribute
     * @return bool
     */
    public function edit($id, $attribute = [])
    {

        // update Utility
        $attribute = $this->translateUtility($attribute);
        $utilities = $this->utilitiesService->update($id, $attribute + ['type' => 5,]);

        // Update Supermarket
        $supermarket = Supermarket::select("*")->where('utilities_id', $id)->first();
        $this->update($supermarket->id, ['tel' => $attribute['phone'], 'business_hour' => $attribute['business_hour'], 'payment_method' => $attribute['paymentMethod'], 'road_goal' => $attribute['roadGoal'], 'store_type' => $attribute['storeType']]);

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

        // Del Service
        $supermarket->supermarketService()->delete();

        // Add Service
        if (!empty($attribute['smServiceAdd'])) {
            $smServiceAdd = explode(".", $attribute['smServiceAdd']);
            foreach ($smServiceAdd as $service) {
                $supermarket->supermarketService()->create(['service_id' => $service]);
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