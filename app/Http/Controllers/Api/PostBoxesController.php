<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\PostBoxesService;
use App\Services\UtilitiesService;

use JWTAuth;
use Helpers\Api;
use DB;

class PostBoxesController extends Controller
{
    protected $user;

    protected $postBox;

    /**
     * PostBoxesController constructor.
     * @param PostBoxesService $postBoxesService
     */
    public function __construct(PostBoxesService $postBoxesService)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->postBox = $postBoxesService;
    }

    /**
     * Get Detail PostBox
     * @param  [Int] $id ID of PostBox
     * @return [Json]
     */
    public function getDetailPostBox($id)
    {
        $result = $this->postBox->findPB($id);
        if ($result['postBoxes'] != null) {
            return Api::r_response($result, 'Get success!', 'S200');
        } else {
            return Api::r_response("", 'Not found', 'E404');
        }
    }

    /**
     * create New Postbox
     * @param  Request $reques
     * @return [Json]
     */
    public function createNewPostbox(Request $request)
    {

        $result = $this->postBox->createPostBox($request->except(['token']));

        if ($result) {
            return Api::r_response($result, 'Create success!', 'S200');
        } else {
            return Api::r_response("", 'Server error', 'E500');
        }
    }

    /**
     * editPostbox
     * @param  Request $request
     * @param  [int]  $id
     * @return [json]
     */
    public function editPostbox(Request $request, $id)
    {
        $result = $this->postBox->edit($id, $request->except(['token']));
        if ($result) {
            return Api::r_response("", 'Edit success!', 'S200');
        } else {
            return Api::r_response("", 'Server Error!', 'E500');
        }
    }
}
