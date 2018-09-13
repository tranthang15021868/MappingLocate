<?php
interface CafeShopsController {
	public function getDetailCafeShop($id);

	/**
	 * @api {get} api/getDetailCafeShop/:id/:token Get detail of CafeShop
	 * @apiName Get CafeShop
	 * @apiGroup CafeShop
	 * @apiVersion 1.0.0
	 * @apiParam {Int} id CafeShops's Id
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 *{
		   "body":{
		      "cafeShop":{
		         "id":5,
		         "name":"コーヒーショップ",
		         "address":"155 Cau Giay、Quan Hoa、Cau Giay、ハノイ、ベトナム",
		         "memo":"ノート",
		         "address_vi":"155 Cầu Giấy, Quan Hoa, Cầu Giấy, Hà Nội, Việt Nam",
		         "address_en":"155 Cau Giay, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		         "address_cn":"155 Cau Giay，Quan Hoa，Cau Giay，河内，越南",
		         "address_es":"155 Cau Giay, Quan Hoa, Cau Giay, Hanoi, Vietnam",
		         "address_ko":"155 Cau Giay, Quan Hoa, Cau Giay, 하노이, 베트남",
		         "name_vi":"Quán cà phê",
		         "name_en":"Cafe",
		         "name_cn":"咖啡厅",
		         "name_es":"Cafetería",
		         "name_ko":"커피 숍",
		         "lat":"21.0318615",
		         "long":"105.7990658",
		         "category_id":3,
		         "memo_vi":"Ghi chú",
		         "memo_en":"Note",
		         "memo_cn":"注意",
		         "memo_es":"Nota",
		         "memo_ko":"참고",
		         "workingtime_weekday":"[\"01:38  AM\",\"01:38  PM\"]",
		         "workingtime_saturday":null,
		         "workingtime_holiday":null,
		         "workingtime_before_holiday":null,
		         "type":"3",
		         "icon_tags_id":null,
		         "created_by":null,
		         "created_at":"2018-08-14 01:07:54",
		         "updated_at":"2018-08-14 17:52:20",
		         "phone":"12355555555",
		         "website":"cà phê ominext",
		         "utilities_id":9443
		      },
		      "images":[
		         {
		            "id":2034,
		            "url":"e008fc94f64c006237600cf9ff0352d1.png",
		            "utilities_id":9443,
		            "created_at":"2018-08-14 01:11:40",
		            "updated_at":"2018-08-14 01:11:40"
		         },
		         {
		            "id":2035,
		            "url":"721e9db3adcaf25b07870ad301292d68.png",
		            "utilities_id":9443,
		            "created_at":"2018-08-14 01:11:40",
		            "updated_at":"2018-08-14 01:11:40"
		         }
		      ],
		      "tags":[
		         {
		            "id":2,
		            "slug":"aBrLdn5vvT0uukRTMNV6",
		            "name":"ポストボックス\r\n",
		            "name_vi":"Hòm thư",
		            "name_en":"Postbox",
		            "name_cn":"邮箱",
		            "name_es":"Buzón",
		            "name_ko":"게시물 상자",
		            "type":"0",
		            "created_at":"2018-06-28 12:31:43",
		            "updated_at":"2018-06-28 12:31:43",
		            "pivot":{
		               "utilities_id":9443,
		               "category_id":2
		            }
		         },
		         {
		            "id":1,
		            "slug":"Hc1DNwxh3jwfIdT5HXJY",
		            "name":"自動販売機\r\n",
		            "name_vi":"Máy bán hàng tự động",
		            "name_en":"Vending Machine",
		            "name_cn":"售货机",
		            "name_es":"Máquina expendedora",
		            "name_ko":"자판기",
		            "type":"0",
		            "created_at":"2018-06-28 12:31:43",
		            "updated_at":"2018-06-28 12:31:43",
		            "pivot":{
		               "utilities_id":9443,
		               "category_id":1
		            }
		         }
		      ]
		   },
		   "msg":"Get success!",
		   "code":"S200"
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
	
	public function createNewCafeShop();
	/**
	 * @api {post} api/createNewCafeShop Create New CafeShop
	 * @apiName Create CafeShop
	 * @apiGroup CafeShop
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {String} name Name of CafeShop
	 * @apiParam {String} address Address of CafeShop
	 * @apiParam {String} memo Memo of CafeShop
	 * @apiParam {String} lat Latitude of CafeShop
	 * @apiParam {String} long Longitude of CafeShop
	 * @apiParam {Int} category_id Category id
	 * @apiParam {String} lang Language of device
	 * @apiParam {String} phone Phone of device
	 * @apiParam {String} website Website of device
	 * @apiParam {String} workingtime_weekday Workingtime of device
	 * @apiParam {String} tags List tag of CafeShop
	 * @apiParam {File} imagesAdd List Image of CafeShop
	 * @apiParam {String} created_by Code of device
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 *{
		    "body": {
		        "name": "コーヒーショップ",
		        "address": "155 Cau Giay Street、Quan Hoa、ハノイ、ベトナム",
		        "memo": "m",
		        "address_vi": "155 đường Cầu Giấy, Quan Hoa, Hà Nội, Việt nam",
		        "address_en": "155 Cau Giay Street, Quan Hoa, Hanoi, Vietnam",
		        "address_cn": "155 Cau Giay Street，Quan Hoa，河内，越南",
		        "address_es": "155 Cau Giay Street, Quan Hoa, Hanoi, Vietnam",
		        "address_ko": "155 Cau Giay Street, Quan Hoa, 하노이, 베트남",
		        "name_vi": "Quán cà phê",
		        "name_en": "Cafe",
		        "name_cn": "咖啡厅",
		        "name_es": "Cafetería",
		        "name_ko": "커피 숍",
		        "memo_vi": "m",
		        "memo_en": "m",
		        "memo_cn": "米",
		        "memo_es": "m",
		        "memo_ko": "m",
		        "lat": "21.031123",
		        "long": "105.799456",
		        "category_id": "3",
		        "workingtime_weekday": null,
		        "type": 3,
		        "updated_at": "2018-08-14 23:39:29",
		        "created_at": "2018-08-14 23:39:29",
		        "id": 9448
		    },
		    "msg": "Create success!",
		    "code": "S200"
		}
	 *
	 * @apiErrorExample Error
	 * HTTP/1.1 500 Error
     * {
     *   "body": "",
     *   "msg": "Server error",
     *   "code": "S500"
     * }
	 */
	
	public function editCafeShop();

	/**
     * @api {post} editCafeShop/:id/:token Edit CafeShop
     * @apiName Edit CafeShop
     * @apiGroup CafeShop
     * @apiVersion 1.0.0
     *
     * @apiParam {Int} id CafeShop's ID
     * @apiParam {String} name Name of CafeShopCafeShop
     * @apiParam {String} address Address of CafeShop
     * @apiParam {String} memo Memo of CafeShop
     * @apiParam {String} lat Latitude of CafeShop
     * @apiParam {String} long Longitude of CafeShop
     * @apiParam {Int} category_id Category id
     * @apiParam {String} lang Language of device
     * @apiParam {String} phone Phone Number of CafeShop
     * @apiParam {String} workingtime_weekday Workingtime of CafeShop
     * @apiParam {String} website Website of CafeShop
     * @apiParam {String} tags List tag of CafeShop
     * @apiParam {File} imagesAdd List Image of CafeShop
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