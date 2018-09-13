<?php
interface VendingMachineController {

	public function getDetailVendingMachine($id);

	/**
	 * @api {get} api/getDetailVendingMachine/:id/:token Get detail of Vending Machine
	 * @apiName Get Vending Machine
	 * @apiGroup VendingMachine
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {Int} id Id of Utility
	 * @apiParam {String} token Json Web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
        "body": [
            {
                "id": 138,
                "name": "ガイア　割山店　スロットエリア入口付近",
                "address": null,
                "memo": null,
                "address_vi": null,
                "address_en": null,
                "address_cn": null,
                "address_es": null,
                "address_ko": null,
                "name_vi": null,
                "name_en": null,
                "name_cn": null,
                "name_es": null,
                "name_ko": null,
                "lat": "39.703958",
                "long": "140.091910",
                "category_id": null,
                "memo_vi": null,
                "memo_en": null,
                "memo_cn": null,
                "memo_es": null,
                "memo_ko": null,
                "workingtime_weekday": null,
                "workingtime_saturday": null,
                "workingtime_holiday": null,
                "workingtime_before_holiday": null,
                "type": "1",
                "icon_tags_id": null,
                "created_by": null,
                "created_at": "2018-06-28 12:39:04",
                "updated_at": "2018-06-28 12:39:04",
                "images": [],
                "tags": [
                    {
                        "id": 17,
                        "name": "差出箱13号",
                        "tag_name": "差出箱13号",
                        "created_at": "2018-06-28 12:38:16",
                        "updated_at": "2018-06-28 12:38:16",
                        "pivot": {
                            "utilities_id": 138,
                            "tag_id": 17
                        }
                    },
                    {
                        "id": 18,
                        "name": "銘板なし",
                        "tag_name": "銘板なし",
                        "created_at": "2018-06-28 12:38:16",
                        "updated_at": "2018-06-28 12:38:16",
                        "pivot": {
                            "utilities_id": 138,
                            "tag_id": 18
                        }
                    },
                    {
                        "id": 19,
                        "name": "丸柱",
                        "tag_name": "丸柱",
                        "created_at": "2018-06-28 12:38:16",
                        "updated_at": "2018-06-28 12:38:16",
                        "pivot": {
                            "utilities_id": 138,
                            "tag_id": 19
                        }
                    },
                    {
                        "id": 22,
                        "name": "13号一体型ひさし",
                        "tag_name": "13号一体型ひさし",
                        "created_at": "2018-06-28 12:38:16",
                        "updated_at": "2018-06-28 12:38:16",
                        "pivot": {
                            "utilities_id": 138,
                            "tag_id": 22
                        }
                    },
                    {
                        "id": 265,
                        "name": "オフィスビル",
                        "tag_name": "オフィスビル",
                        "created_at": "2018-06-28 12:43:38",
                        "updated_at": "2018-06-28 12:43:38",
                        "pivot": {
                            "utilities_id": 138,
                            "tag_id": 265
                        }
                    },
                    {
                        "id": 25,
                        "name": "レターパック表記",
                        "tag_name": "レターパック表記",
                        "created_at": "2018-06-28 12:38:17",
                        "updated_at": "2018-06-28 12:38:17",
                        "pivot": {
                            "utilities_id": 138,
                            "tag_id": 25
                        }
                    }
        	            ]
        	        },
        	        [],
        	            {
        	                "id": 17,
        	                "name": "差出箱13号",
        	                "tag_name": "差出箱13号",
        	                "created_at": "2018-06-28 12:38:16",
        	                "updated_at": "2018-06-28 12:38:16",
        	                "pivot": {
        	                    "utilities_id": 138,
        	                    "tag_id": 17
        	                }
        	            },
        	            {
        	                "id": 18,
        	                "name": "銘板なし",
        	                "tag_name": "銘板なし",
        	                "created_at": "2018-06-28 12:38:16",
        	                "updated_at": "2018-06-28 12:38:16",
        	                "pivot": {
        	                    "utilities_id": 138,
                                "tag_id": 18
        	                }
        	            },
        	            {
        	                "id": 19,
        	                "name": "丸柱",
        	                "tag_name": "丸柱",
        	                "created_at": "2018-06-28 12:38:16",
        	                "updated_at": "2018-06-28 12:38:16",
        	                "pivot": {
        	                    "utilities_id": 138,
        	                    "tag_id": 19
        	                }
        	            },
        	            {
        	                "id": 22,
        	                "name": "13号一体型ひさし",
        	                "tag_name": "13号一体型ひさし",
        	                "created_at": "2018-06-28 12:38:16",
        	                "updated_at": "2018-06-28 12:38:16",
        	                "pivot": {
        	                    "utilities_id": 138,
        	                    "tag_id": 22
        	                }
        	            },
        	            {
        	                "id": 265,
        	                "name": "オフィスビル",
        	                "tag_name": "オフィスビル",
        	                "created_at": "2018-06-28 12:43:38",
        	                "updated_at": "2018-06-28 12:43:38",
        	                "pivot": {
        	                    "utilities_id": 138,
        	                    "tag_id": 265
        	                }
        	            },
        	            {
        	                "id": 25,
        	                "name": "レターパック表記",
        	                "tag_name": "レターパック表記",
        	                "created_at": "2018-06-28 12:38:17",
        	                "updated_at": "2018-06-28 12:38:17",
        	                "pivot": {
        	                    "utilities_id": 138,
        	                    "tag_id": 25
        	                }
        	            }
                ]
        	    ],
        	    "msg": "Get success",
        	    "code": "S200"
        	}
	*
	*
	* @apiErrorExample Error
	 * HTTP/1.1 400 Error
	 * {
	 * 	"body": "",
	 * 	"msg": "Not found",
	 * 	"code": "E404"
	 * }
	 *
	 */
	
	public function createNewVendingMachine();

	/**
	 * @api {post} api/createNewVendingMachine Create New Vending Machine
	 * @apiName Create Vending Machine
	 * @apiGroup VendingMachine
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {String} name Name of Vending Machine
	 * @apiParam {String} address Address of Vending Machine
	 * @apiParam {String} memo Memo of Vending Machine
	 * @apiParam {String} lat Latitude of Vending Machine
	 * @apiParam {String} long Longitude of Vending Machine
	 * @apiParam {Int} category_id Category id
	 * @apiParam {String} lang Language of device
	 * @apiParam {String} tags List tag of Vending Machine
	 * @apiParam {File} imagesAdd List Image of Vending Machine
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
                "type": 1,
                "updated_at": "2018-08-14 23:48:03",
                "created_at": "2018-08-14 23:48:03",
                "id": 9450
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
    
    public function editVendingMachine();

    /**
     * @api {post} editVendingMachine/:id/:token Edit Vending Machine
     * @apiName Edit Vending Machine
     * @apiGroup VendingMachine
     * @apiVersion 1.0.0
     *
     * @apiParam {Int} id Vending Machine's ID
     * @apiParam {String} name Name of Vending Machine
     * @apiParam {String} address Address of Vending Machine
     * @apiParam {String} memo Memo of Vending Machine
     * @apiParam {String} lat Latitude of Vending Machine
     * @apiParam {String} long Longitude of Vending Machine
     * @apiParam {Int} category_id Category id
     * @apiParam {String} lang Language of device
     * @apiParam {String} tags List tag of Vending Machine
     * @apiParam {File} imagesAdd List Image of Vending Machine
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