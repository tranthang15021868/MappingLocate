<?php

namespace App\Services;

use App\Models\VendingMachines;
use App\Models\Images;

use Stichoza\GoogleTranslate\TranslateClient;
use Helpers\Api;
use DB;
use File;

class VendingMachinesService extends BaseService
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

    public function getModel()
    {
        return VendingMachines::class;
    }

    /**
     * find VendingMachine with id
     * @param $id
     * @return array
     */
    public function findVM($id)
    {
        $result = array();
        $vendingMachine = $this->utilitiesService->find($id);
        $result[] = $vendingMachine;

        if ($vendingMachine != null) {
            $imageOfVM = $vendingMachine->images;
            $result[] = $imageOfVM;
            $result[] = $vendingMachine->cates;
        }
        return $result;
    }

    /**
     * Create VendingMachine
     * @param array $attribute
     * @return mixed
     */
    public function createVendingMachine($attribute = [])
    {

        // add new Utility
        $attribute = $this->translateUtility($attribute);
        $user = new UsersService();
        $user_id = $user->findCondition('device_code', '=', $attribute['created_by']);
        $attribute['created_by'] = $user_id['id'];
        $utilities = $this->utilitiesService->create($attribute + ['type' => 1,]);

        // add new Vending Machine
        $utilities_id = $utilities->id;
        $this->create(['utilities_id' => $utilities_id]);

        // add list image of Vending Machine to images table
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
     * Esit VendingMachine
     * @param $id
     * @param array $attribute
     * @return bool
     */
    public function edit($id, $attribute = [])
    {
        //update Utility
        $attribute = $this->translateUtility($attribute);
        $utilities = $this->utilitiesService->update($id, $attribute + ['type' => 1,]);
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
                $img = Images::find($image);
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