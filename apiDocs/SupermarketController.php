<?php
interface SupermarketController {
	public function getDetailSupermarket($id);

	/**
	 * @api {get} api/getDetailSupermarket/:id/:token Get detail of Supermarket
	 * @apiName Get Supermarket
	 * @apiGroup Supermarket
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {Int} id Supermarket's Id
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
		    "body": {
		        "supermarket": {
		            "id": 3,
		            "name": "ヴィンマール",
		            "address": "155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム",
		            "memo": "",
		            "address_vi": "155 Đường Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam",
		            "address_en": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		            "address_cn": "155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam",
		            "address_es": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		            "address_ko": "155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남",
		            "name_vi": "Vinmart",
		            "name_en": "Vinmart",
		            "name_cn": "Vinmart",
		            "name_es": "Vinmart",
		            "name_ko": "빈 마트",
		            "lat": "21.0318287",
		            "long": "105.7990688",
		            "category_id": 5,
		            "memo_vi": "",
		            "memo_en": "",
		            "memo_cn": "",
		            "memo_es": "",
		            "memo_ko": "",
		            "workingtime_weekday": null,
		            "workingtime_saturday": null,
		            "workingtime_holiday": null,
		            "workingtime_before_holiday": null,
		            "type": "5",
		            "icon_tags_id": null,
		            "created_by": null,
		            "created_at": "2018-08-14 17:58:27",
		            "updated_at": "2018-08-14 17:58:27",
		            "store_id": null,
		            "city_id": null,
		            "utilities_id": 9444,
		            "province_group_id": null,
		            "nearest_station": null,
		            "store_type": null,
		            "tel": "09888888888",
		            "business_hour": "[\"08:57  AM\",\"08:57  PM\"]",
		            "road_goal": null,
		            "payment_method": null
		        },
		        "images": [
		            {
		                "id": 2036,
		                "url": "b5443e1af30d22a839d788e151f7a343.png",
		                "utilities_id": 9444,
		                "created_at": "2018-08-14 17:58:27",
		                "updated_at": "2018-08-14 17:58:27"
		            },
		            {
		                "id": 2037,
		                "url": "026634ecca2fa21788b4f3dbe8213c69.png",
		                "utilities_id": 9444,
		                "created_at": "2018-08-14 17:58:27",
		                "updated_at": "2018-08-14 17:58:27"
		            }
		        ],
		        "tags": [],
		        "services": [
		            {
		                "id": 15,
		                "supermarket_id": 3,
		                "service_id": 1,
		                "created_at": "2018-08-14 17:58:27",
		                "updated_at": "2018-08-14 17:58:27"
		            },
		            {
		                "id": 16,
		                "supermarket_id": 3,
		                "service_id": 2,
		                "created_at": "2018-08-14 17:58:27",
		                "updated_at": "2018-08-14 17:58:27"
		            },
		            {
		                "id": 17,
		                "supermarket_id": 3,
		                "service_id": 3,
		                "created_at": "2018-08-14 17:58:27",
		                "updated_at": "2018-08-14 17:58:27"
		            },
		            {
		                "id": 18,
		                "supermarket_id": 3,
		                "service_id": 4,
		                "created_at": "2018-08-14 17:58:27",
		                "updated_at": "2018-08-14 17:58:27"
		            }
		        ]
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
	
	public function createNewSupermarket();
	
	/**
	 * @api {post} api/createNewSupermarket Create New Supermarket
	 * @apiName Create Supermarket
	 * @apiGroup Supermarket
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {String} name Name of Supermarket
	 * @apiParam {String} address Address of Supermarket
	 * @apiParam {String} memo Memo of Supermarket
	 * @apiParam {String} lat Latitude of Supermarket
	 * @apiParam {String} long Longitude of Supermarket
	 * @apiParam {Int} category_id Category id
	 * @apiParam {String} lang Language of device
	 * @apiParam {String} roadGoal Road Goal
	 * @apiParam {String} phone
	 * @apiParam {String} business_hour
	 * @apiParam {String} smService
	 * @apiParam {String} paymentMethod
	 * @apiParam {String} tags List tag of Supermarket
	 * @apiParam {File} imagesAdd List Image of Supermarket
	 * @apiParam {String} storeType Type of Supermarket
	 * @apiParam {String} created_by Code of device
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
		    "body": {
		        "name": "new",
		        "address": "155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム",
		        "memo": "dmmm",
		        "address_vi": "155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam",
		        "address_en": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		        "address_cn": "155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam",
		        "address_es": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		        "address_ko": "155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남",
		        "name_vi": "new",
		        "name_en": "new",
		        "name_cn": "new",
		        "name_es": "new",
		        "name_ko": "흠",
		        "memo_vi": "new",
		        "memo_en": "new",
		        "memo_cn": "new",
		        "memo_es": "new",
		        "memo_ko": "흠",
		        "lat": "21.031887",
		        "long": "105.799034",
		        "category_id": "5",
		        "type": 5,
		        "updated_at": "2018-08-14 23:35:51",
		        "created_at": "2018-08-14 23:35:51",
		        "id": 9447
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
	
	public function editSupermarket();

	/**
     * @api {post} editSupermarket/:id/:token Edit Supermarket
     * @apiName Edit Supermarket
     * @apiGroup Supermarket
     * @apiVersion 1.0.0
     *
     * @apiParam {Int} id Supermarket's ID
     * @apiParam {String} name Name of Supermarket
     * @apiParam {String} address Address of Supermarket
     * @apiParam {String} memo Memo of Supermarket
     * @apiParam {String} lat Latitude of Supermarket
     * @apiParam {String} long Longitude of Supermarket
     * @apiParam {Int} category_id Category id
     * @apiParam {String} lang Language of device
     * @apiParam {String} roadGoal Road Guide
     * @apiParam {Int} phone Phone number of Supermarket
     * @apiParam {String} business_hour Business Hour
     * @apiParam {String} smServiceAdd
     * @apiParam {String} paymentMethod
     * @apiParam {String} tags List tag of Supermarket
     * @apiParam {File} imagesAdd List Image of Supermarket
     * @apiParam {String} imagesDel List id of image
     * @apiParam {String} storeType Type of Supermarket
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