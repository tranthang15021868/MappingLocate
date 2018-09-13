<?php
interface PostBoxesController {
	public function getDetailPostBox($id);

	/**
	 * @api {get} api/getDetailPostBox/:id/:token Get detail of PostBox
	 * @apiName Get PostBox
	 * @apiGroup PostBox
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {Int} id PostBox's Id
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
		    "body": {
		        "postBoxes": {
		            "id": 1328,
		            "name": "box2",
		            "address": "155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム",
		            "memo": "終わりに集める",
		            "address_vi": "155 Đường Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam",
		            "address_en": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		            "address_cn": "155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam",
		            "address_es": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		            "address_ko": "155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남",
		            "name_vi": "box2",
		            "name_en": "box2",
		            "name_cn": "BOX2",
		            "name_es": "box2",
		            "name_ko": "상자 2",
		            "lat": "21.0123002",
		            "long": "105.7331653",
		            "category_id": 2,
		            "memo_vi": "thu cuối ngày",
		            "memo_en": "collect at the end of the day",
		            "memo_cn": "在一天结束时收集",
		            "memo_es": "recoger al final del día",
		            "memo_ko": "하루가 끝날 무렵 수집하다",
		            "workingtime_weekday": "[\"07:34\",\"09:34\",\"08:34\"]",
		            "workingtime_saturday": "[\"19:34\",\"18:34\",\"14:38\"]",
		            "workingtime_holiday": null,
		            "workingtime_before_holiday": null,
		            "type": "2",
		            "icon_tags_id": null,
		            "created_by": null,
		            "created_at": "2018-08-13 23:35:34",
		            "updated_at": "2018-08-14 00:47:56",
		            "post_id": null,
		            "utilities_id": 9428,
		            "code": "9797949888",
		            "collection_branch": "cau giấy"
		        },
		        "images": [
		            {
		                "id": 2033,
		                "url": "7d6fdfd9074543293220247e3948e8d9.png",
		                "utilities_id": 9428,
		                "created_at": "2018-08-14 00:47:56",
		                "updated_at": "2018-08-14 00:47:56"
		            }
		        ],
		        "tags": []
		    },
		    "msg": "Get success!",
		    "code": "S200"
		}
	*
	* @apiErrorExample Error
	 * HTTP/1.1 400 Error
	 * {
	 * 	"body": "",
	 * 	"msg": "Not found",
	 * 	"code": "E404"
	 * }
	 */
	
	public function createNewPostbox();

	/**
	 * @api {post} api/createNewPostbox Create New PostBox
	 * @apiName Create PostBox
	 * @apiGroup PostBox
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} name Name of PostBox
	 * @apiParam {String} address Address of PostBox
	 * @apiParam {String} memo Memo of PostBox
	 * @apiParam {String} lat Latitude of PostBox
	 * @apiParam {String} long Longitude of PostBox
	 * @apiParam {Int} category_id Category id
	 * @apiParam {Int} code code of PostBox
     * @apiParam {String} collection_branch Collection Branch
     * @apiParam {String} workingtime_weekday Workingtime Weekday
     * @apiParam {String} workingtime_weekend Workingtime Weekend
	 * @apiParam {String} lang Language of device
	 * @apiParam {String} tags List tag of PostBox
	 * @apiParam {File} imagesAdd List Image of PostBox
	 * @apiParam {String} created_by Code of device
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
		    "body": {
		        "name": "m",
		        "address": "155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム",
		        "memo": "m",
		        "address_vi": "155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam",
		        "address_en": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		        "address_cn": "155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam",
		        "address_es": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		        "address_ko": "155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남",
		        "name_vi": "m",
		        "name_en": "m",
		        "name_cn": "米",
		        "name_es": "metro",
		        "name_ko": "엠",
		        "memo_vi": "m",
		        "memo_en": "m",
		        "memo_cn": "米",
		        "memo_es": "metro",
		        "memo_ko": "엠",
		        "lat": "21.031887",
		        "long": "105.799034",
		        "category_id": "2",
		        "workingtime_weekday": "[\"15:41\",\"15:42\"]",
		        "workingtime_saturday": "[\"15:41\",\"15:41\"]",
		        "type": 2,
		        "updated_at": "2018-08-14 23:46:54",
		        "created_at": "2018-08-14 23:46:54",
		        "id": 9449
		    },
		    "msg": "Create success!",
		    "code": "S200"
		}
	 *
	 *
	 * @apiErrorExample Error
    * HTTP/1.1 500 Error
     * {
     *   "body": "",
     *   "msg": "Server error",
     *   "code": "S500"
     * }
	 */
	
	public function editPostbox();

	/**
     * @api {post} editPostbox/:id/:token Edit PostBox
     * @apiName Edit PostBox
     * @apiGroup PostBox
     * @apiVersion 1.0.0
     *
     * @apiParam {Int} id PostBox's ID
     * @apiParam {String} name Name of PostBox
     * @apiParam {String} address Address of PostBox
     * @apiParam {String} memo Memo of PostBox
     * @apiParam {String} lat Latitude of PostBox
     * @apiParam {String} long Longitude of PostBox
     * @apiParam {Int} category_id Category id
     * @apiParam {String} lang Language of device
     * @apiParam {Int} code code of PostBox
     * @apiParam {String} collection_branch Collection Branch
     * @apiParam {String} workingtime_weekday Workingtime Weekday
     * @apiParam {String} workingtime_weekend Workingtime Weekend
     * @apiParam {String} tags List tag of PostBox
     * @apiParam {File} imagesAdd List Image of PostBox
     * @apiParam {String} imagesDel List id of image
     * @apiParam {String} token Json Web token
     *
     * @apiSuccessExample Success
     * HTTP/1.1 200 Ok
     * {
     *   "body": "",
     *   "msg": "Edit success!",
     *   "code": "S200"
     * }
     *
     * @apiErrorExample Error
     * HTTP/1.1 500 Error
     * {
     *   "body": "",
     *   "msg": "Server Error!",
     *   "code": "E500"
     * }
     * 
     */
}