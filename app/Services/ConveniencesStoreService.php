<?php

namespace App\Services;

use App\Models\ConvenienceStores;
use App\Models\Utilities;
use App\Models\Images;
use App\Models\Tags;
use Helpers\Api;
use Stichoza\GoogleTranslate\TranslateClient;

class ConveniencesStoreService extends BaseService
{

    protected $utilitiesService;

    /**
     * EloquentRepository constructor.
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
        return ConvenienceStores::class;
    }

    /**
     * Find Conveniences Store
     * @param $id
     * @return array
     */
    public function findCS($id)
    {
        $result = array();
        $ut = $this->utilitiesService->find($id);
        $convenienceStores = Utilities::select('*')->join('convenience_stores', 'utilities.id', 'convenience_stores.utilities_id')->where('utilities.id', $id)->first();
        $result['convenienceStores'] = $convenienceStores;

        if ($convenienceStores != null) {

            $imageOfCS = $ut->images;
            $result['images'] = $imageOfCS;

            $tagOfCS = $ut->cates;
            $result['tags'] = $tagOfCS;

            $serviceOfCS = $this->find($convenienceStores->id)->convenienceStoreService;
            $result['services'] = $serviceOfCS;
        }
        return $result;
    }

    /**
     * Create Convenince Store
     * @param array $attribute
     * @return mixed
     */
    public function createConveninceStore($attribute = [])
    {
        // add new Utility
        $attribute = $this->translateUtility($attribute);
        $user = new UsersService();
        $user_id = $user->findCondition('device_code', '=', $attribute['created_by']);
        $attribute['created_by'] = $user_id['id'];
        $utilities = $this->utilitiesService->create($attribute + ['type' => 4,]);

        // add new Convenience Store
        $utilities_id = $utilities->id;
        $cvStore = $this->create(['utilities_id' => $utilities_id, 'phone' => $attribute['phone'], 'allow_receive_items' => $attribute['allow_receive_items'], 'allow_send_items' => $attribute['allow_send_items'], 'bussiness_hour' => $attribute['businessHour'], 'payment_method' => $attribute['paymentMethod']]);

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

        // add service of ConvenienceStore
        if (!empty($attribute['services'])) {
            $services = explode(".", $attribute['services']);
            foreach ($services as $service) {

                // new supermarketService
                $cvStore->convenienceStoreService()->create(['service_id' => $service]);
            }
        }
        return $utilities;
    }

    /**
     * Edit Convenince Store
     * @param $id
     * @param array $attribute
     * @return bool
     */
    public function edit($id, $attribute = [])
    {

        //update Utility
        $attribute = $this->translateUtility($attribute);
        $utilities = $this->utilitiesService->update($id, $attribute + ['type' => 4,]);

        // Update Convenience
        $cvStore = ConvenienceStores::select("*")->where('utilities_id', $id)->first();
        $this->update($cvStore->id, ['phone' => $attribute['phone'], 'allow_receive_items' => $attribute['allow_receive_items'], 'allow_send_items' => $attribute['allow_send_items'], 'bussiness_hour' => $attribute['businessHour'], 'payment_method' => $attribute['paymentMethod']]);

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

        // delete all service of ConvenienceStore
        $cvStore->convenienceStoreService()->delete();

        // add service of ConvenienceStore
        if (!empty($attribute['services'])) {
            $services = explode(".", $attribute['services']);
            foreach ($services as $service) {
                // new supermarketService
                $cvStore->convenienceStoreService()->create(['service_id' => $service]);
            }
        }

        return true;
    }
}