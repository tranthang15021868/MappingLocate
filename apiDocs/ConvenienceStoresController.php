<?php
interface ConvenienceStoresController {
	public function getDetailConvenienceStore($id);

	/**
	 * @api {get} api/getDetailConvenienceStore/:id/:token Get detail of ConvenienceStore
	 * @apiName Get ConvenienceStore
	 * @apiGroup ConvenienceStore
	 * @apiVersion 1.0.0
	 * @apiParam {Int} id ConvenienceStore's Id
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
		    "body": {
		        "convenienceStores": {
		            "id": 2204,
		            "name": "コンビニエンスストア",
		            "address": "155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム",
		            "memo": "注1",
		            "address_vi": "155 Đường Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam",
		            "address_en": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		            "address_cn": "155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam",
		            "address_es": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		            "address_ko": "155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남",
		            "name_vi": "cửa hàng tiện lợi",
		            "name_en": "grocery store",
		            "name_cn": "便利店",
		            "name_es": "tienda de conveniencia",
		            "name_ko": "편의점",
		            "lat": "21.0328901",
		            "long": "105.8002134",
		            "category_id": 4,
		            "memo_vi": "ghi chú 1",
		            "memo_en": "note 1",
		            "memo_cn": "注1",
		            "memo_es": "nota 1",
		            "memo_ko": "주 1",
		            "workingtime_weekday": null,
		            "workingtime_saturday": null,
		            "workingtime_holiday": null,
		            "workingtime_before_holiday": null,
		            "type": "4",
		            "icon_tags_id": null,
		            "created_by": null,
		            "created_at": "2018-08-14 00:09:00",
		            "updated_at": "2018-08-14 22:43:17",
		            "city_id": null,
		            "phone": "12309999999999999999",
		            "bussiness_hour": "",
		            "allow_eat_in": null,
		            "electronic_money": null,
		            "tax": null,
		            "package_shipping": null,
		            "package_receipt": null,
		            "locker": null,
		            "administrative_service": null,
		            "website": null,
		            "nearest_station": null,
		            "nearest_bus_stop": null,
		            "allow_receive_items": 1,
		            "allow_send_items": 1,
		            "payment_method": "1.2.3",
		            "utilities_id": "9439",
		            "store_code": null
		        },
		        "images": [
		            {
		                "id": 2031,
		                "url": "c1bec611919346e56df9e444f082520a.png",
		                "utilities_id": 9439,
		                "created_at": "2018-08-14 00:43:40",
		                "updated_at": "2018-08-14 00:43:40"
		            },
		            {
		                "id": 2032,
		                "url": "26ec2c8a7a71a5632a1dc6938bb91f29.png",
		                "utilities_id": 9439,
		                "created_at": "2018-08-14 00:43:40",
		                "updated_at": "2018-08-14 00:43:40"
		            }
		        ],
		        "tags": [],
		        "services": [
		            {
		                "id": 18,
		                "convenience_stores_id": 2204,
		                "service_id": 1,
		                "created_at": "2018-08-14 22:43:17",
		                "updated_at": "2018-08-14 22:43:17"
		            },
		            {
		                "id": 19,
		                "convenience_stores_id": 2204,
		                "service_id": 2,
		                "created_at": "2018-08-14 22:43:17",
		                "updated_at": "2018-08-14 22:43:17"
		            },
		            {
		                "id": 20,
		                "convenience_stores_id": 2204,
		                "service_id": 3,
		                "created_at": "2018-08-14 22:43:17",
		                "updated_at": "2018-08-14 22:43:17"
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
	
	public function createNewConveninceStore();

	/**
	 * @api {post} api/createNewConveninceStore Create New ConveninceStore
	 * @apiName Create ConveninceStore
	 * @apiGroup ConvenienceStore
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} name Name of ConveninceStore
	 * @apiParam {String} address Address of ConveninceStore
	 * @apiParam {String} memo Memo of ConveninceStore
	 * @apiParam {String} lat Latitude of ConveninceStore
	 * @apiParam {String} long Longitude of ConveninceStore
	 * @apiParam {Int} category_id Category id
	 * @apiParam {String} lang Language of device
	 * @apiParam {String} phone Phone number of ConveninceStore
	 * @apiParam {String} business_hour Business Hour of ConveninceStore
	 * @apiParam {String} allow_receive_items allow_receive_items of ConveninceStore
	 * @apiParam {String} allow_send_items allow_send_items of ConveninceStore
	 * @apiParam {String} tags List tag of ConveninceStore
	 * @apiParam {File} imagesAdd List Image of ConveninceStore
	 * @apiParam {String} servives List id of service
	 * @apiParam {String} paymetMethod List Payment method
	 * @apiParam {String} created_by Code of device
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
		    "body": {
		        "name": "mm",
		        "address": "155 Cau Giay Street、Quan Hoa、Cau Giay、ハノイ、ベトナム",
		        "memo": "dmmm",
		        "address_vi": "155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam",
		        "address_en": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		        "address_cn": "155 Cau Giay Street，Quan Hoa，Cau Giay，Hanoi，Vietnam",
		        "address_es": "155 Cau Giay Street, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		        "address_ko": "155 Cau Giay Street, Quan Hoa, Cau Giay, 하노이, 베트남",
		        "name_vi": "mm",
		        "name_en": "mm",
		        "name_cn": "mm",
		        "name_es": "mm",
		        "name_ko": "흠",
		        "memo_vi": "mm",
		        "memo_en": "mm",
		        "memo_cn": "mm",
		        "memo_es": "mm",
		        "memo_ko": "흠",
		        "lat": "21.031887",
		        "long": "105.799034",
		        "category_id": "4",
		        "type": 4,
		        "updated_at": "2018-08-14 00:08:09",
		        "created_at": "2018-08-14 00:08:09",
		        "id": 9438
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
	
	public function editConveninceStore();

	/**
     * @api {post} editConveninceStore/:id/:token Edit ConvenienceStore
     * @apiName Edit ConvenienceStore
     * @apiGroup ConvenienceStore
     * @apiVersion 1.0.0
     *
     * @apiParam {Int} id ConvenienceStore's ID
     * @apiParam {String} name Name of ConvenienceStore
     * @apiParam {String} address Address of ConvenienceStore
     * @apiParam {String} memo Memo of ConvenienceStore
     * @apiParam {String} lat Latitude of ConvenienceStore
     * @apiParam {String} long Longitude of ConvenienceStore
     * @apiParam {Int} category_id Category id
     * @apiParam {String} lang Language of device
     * @apiParam {Int} phone Phone number of ConvenienceStore
     * @apiParam {String} business_hour Business Hour
     * @apiParam {Boolean} allow_receive_items Allow receive items
     * @apiParam {Boolean} allow_send_items Allow send items
     * @apiParam {String} tags List tag of ConvenienceStore
     * @apiParam {File} imagesAdd List Image of ConvenienceStore
     * @apiParam {String} imagesDel List id of image
     * @apiParam {String} servives List id of service
	 * @apiParam {String} paymetMethod List Payment method
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