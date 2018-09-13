<?php
interface CategoriesController {
	public function getAllCate();

	/**
	 * @api {get} api/getAllCate
	 * @apiName Get all Categories
	 * @apiGroup Category
	 * @apiVersion 1.0.0
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 Ok
	 *
	 *{
		    "body": [
		        {
		            "id": 1,
		            "slug": "Hc1DNwxh3jwfIdT5HXJY",
		            "name": "自動販売機\r\n",
		            "name_vi": "Máy bàn hàng tự đông",
		            "name_en": "Vending Machine",
		            "name_cn": "autobot",
		            "name_es": "autobot",
		            "name_ko": "autobot",
		            "type": "0",
		            "created_at": "2018-06-28 12:31:43",
		            "updated_at": "2018-06-28 12:31:43"
		        },
		        {
		            "id": 2,
		            "slug": "aBrLdn5vvT0uukRTMNV6",
		            "name": "ポストボックス\r\n",
		            "name_vi": "Hòm thư",
		            "name_en": "Postbox",
		            "name_cn": "autobot",
		            "name_es": "autobot",
		            "name_ko": "autobot",
		            "type": "0",
		            "created_at": "2018-06-28 12:31:43",
		            "updated_at": "2018-06-28 12:31:43"
		        },
		        {
		            "id": 3,
		            "slug": "6AylaqmiHAYa9JbesxVc",
		            "name": "コーヒー\r\n",
		            "name_vi": "Quán cafe",
		            "name_en": "Coffee",
		            "name_cn": "autobot",
		            "name_es": "autobot",
		            "name_ko": "autobot",
		            "type": "0",
		            "created_at": "2018-06-28 12:31:43",
		            "updated_at": "2018-06-28 12:31:43"
		        },
		        {
		            "id": 4,
		            "slug": "TFUErEV33w0hP2CWYC7O",
		            "name": "コンビニ",
		            "name_vi": "Cửa hàng tiện ích",
		            "name_en": "Convenience Store",
		            "name_cn": "autobot",
		            "name_es": "autobot",
		            "name_ko": "autobot",
		            "type": "0",
		            "created_at": "2018-06-28 12:31:43",
		            "updated_at": "2018-06-28 12:31:43"
		        },
		        {
		            "id": 5,
		            "slug": "4DvhhEKwAjYaU69EMt29",
		            "name": "スーパーマーケット",
		            "name_vi": "Siêu thị",
		            "name_en": "Supermarket",
		            "name_cn": "autobot",
		            "name_es": "autobot",
		            "name_ko": "autobot",
		            "type": "0",
		            "created_at": "2018-06-28 12:31:43",
		            "updated_at": "2018-06-28 12:31:43"
		        }
		    ],
		    "msg": "Get success!",
		    "code": "S200"
		}
	 * 
	 */
}