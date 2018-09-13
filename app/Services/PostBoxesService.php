<?php

namespace App\Services;

use App\Models\PostBoxes;
use App\Models\Utilities;
use App\Models\Images;
use App\Models\Tags;
use App\Models\UtilitiesTags;
use App\Models\UtilitiesCate;

use Helpers\Api;
use Stichoza\GoogleTranslate\TranslateClient;

class PostBoxesService extends BaseService
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
        return PostBoxes::class;
    }

    /**
     * Find Postbox with id
     * @param $id
     * @return array
     */
    public function findPB($id)
    {
        $result = array();
        $ut = $this->utilitiesService->find($id);
        $postBoxes = Utilities::select('*')->join('postboxes', 'utilities.id', 'postboxes.utilities_id')->where('utilities.id', $id)->first();
        $result['postBoxes'] = $postBoxes;

        if ($postBoxes != null) {
            $imageOfPB = $ut->images;
            $result['images'] = $imageOfPB;

            $tagOfPB = $ut->cates;
            $result['tags'] = $tagOfPB;
        }
        return $result;
    }

    /**
     * Create Postbox
     * @param array $attribute
     * @return mixed
     */
    public function createPostBox($attribute = [])
    {

        // add new Utility
        $attribute = $this->translateUtility($attribute);
        $user = new UsersService();
        $user_id = $user->findCondition('device_code', '=', $attribute['created_by']);
        $attribute['created_by'] = $user_id['id'];
        $utilities = $this->utilitiesService->create($attribute + ['type' => 2,]);

        // add new PostBox
        $utilities_id = $utilities->id;
        $this->create(['code' => $attribute['code'], 'utilities_id' => $utilities_id, 'collection_branch' => $attribute['collection_branch']]);

        // add new images of Post Box to images table
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
     * Edit Postbox
     * @param $id
     * @param array $attribute
     * @return bool
     */
    public function edit($id, $attribute = [])
    {

        //update Utility
        $attribute = $this->translateUtility($attribute);
        $utilities = $this->utilitiesService->update($id, $attribute + ['type' => 2,]);

        // Update Post Box
        $postBox = PostBoxes::select("*")->where('utilities_id', $id)->first();
        $this->update($postBox->id, ['code' => $attribute['code'], 'collection_branch' => $attribute['collection_branch']]);

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