<?php

interface UtilitiesController {

	public function getUtiilities($lat, $long);

	/**
	 * @api {get} api/getUtiilities/:lat/:long/:token Get Utilities list around the selected location less than 1km
	 * @apiName get Utilities
	 * @apiGroup Utility
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {String} lat Latitude of location
	 * @apiParam {String} long Longitude of location
	 * @apiParam {String} token Json web token
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
	 * 	"body": [
	 * 		{
	 * 			"id": 9303,
	 * 			"name": "自動販売機01",
	 * 			"address": "振り返ると、Cau Giay、 Ha Noi",
	 * 			"address_vi": "Dịch vọng hậu, Cầu Giấy, Hà Nội",
	 * 			"address_en": "Dich vong hau, Cau giay, Ha Noi",
	 * 			"address_cn": null,
	 * 			"address_es": null,
	 * 			"address_ko": null,
	 * 			"name_vi": "Máy bán hàng tự động 01",
	 * 			"name_en": "Vending Machine 01",
	 * 			"name_cn": null,
	 * 			"name_es": null,
	 * 			"name_ko": null,
	 * 			"lat": "21.038427",
	 * 			"long": "105.782023",
	 * 			"category_id": 1
	 * 		},
	 * 		{
	 * 			"id": 9305,
	 * 			"name": "メールボックス01",
	 * 			"address": "振り返ると、Cau Giay、 Ha Noi",
	 * 			"address_vi": "Dịch vọng hậu, Cầu Giấy, Hà Nội",
	 * 			"address_en": "Dich vong hau, Cau giay, Ha Noi",
	 * 			"address_cn": null,
	 * 			"address_es": null,
	 * 			"address_ko": null,
	 * 			"name_vi": "Hòm thư 01",
	 * 			"name_en": "Postbox 0",
	 * 			"name_cn": null,
	 * 			"name_es": null,
	 * 			"name_ko": null,
	 * 			"lat": "21.0377237",
	 * 			"long": "105.783925",
	 * 			"category_id": 2
	 * 		}
	 * 	],
	 * 	"msg": "Get success!",
	 * 	"code": "S200"
	 * }
	 *
	 *
	 *  @apiErrorExample Error
	 * HTTP/1.1 400 Error
	 * {
	 * 	"body": "",
	 * 	"msg": "Not found",
	 * 	"code": "E404"
	 * }
	 */
	

	public function searchUtilitiesWithLocation();

	/**
	 * @api {get} api/searchUtilitiesWithLocation/:lat/:long/:cate/:token Search Utilites with category around the selected location less than 1km
	 * @apiName Search Utilities With Category
	 * @apiGroup Utility
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {String} lat Latitude of location
	 * @apiParam {String} long Longitude of location
	 * @apiParam {String} cate Category's Id
	 * @apiParam {String} token Json web token
	 *
	 * @apiSuccessExample  Success
	 * HTTP/1.1 200 OK
	 * {
	 * 	"body": [
	 * 		{
	 * 			"id": 6,
	 * 			"name": "セイコーマート札幌渓仁会リハビリテーション病院店",
	 * 			"address": "北海道札幌市中央区北10条西17丁目36番13号",
	 * 			"address_vi": "null",
	 * 			"address_en": "null",
	 * 			"address_cn": null,
	 * 			"address_es": null,
	 * 			"address_ko": null,
	 * 			"name_vi": "Hòm thư 01",
	 * 			"name_en": "Postbox 0",
	 * 			"name_cn": null,
	 * 			"name_es": null,
	 * 			"name_ko": null,
	 * 			"lat": "43.0704746",
	 * 			"long": "141.3275977",
	 * 			"category_id": 6
	 * 		},
	 * 		{
	 * 			"id": 11,
	 * 			"name": "セイコーマートぎょれんビル店",
	 * 			"address": "振り返ると、Cau Giay、 Ha Noi",
	 * 			"address_vi": "北海道札幌市中央区北13条西19丁目37番地の6",
	 * 			"address_en": "null",
	 * 			"address_cn": null,
	 * 			"address_es": null,
	 * 			"address_ko": null,
	 * 			"name_vi": "null",
	 * 			"name_en": "null",
	 * 			"name_cn": null,
	 * 			"name_es": null,
	 * 			"name_ko": null,
	 * 			"lat": "43.07274125",
	 * 			"long": "141.3235431",
	 * 			"category_id": 6
	 * 		},
	 * 		{
	 * 			"id": 12,
	 * 			"name": "セイコーマート北14条店",
	 * 			"address": "北海道札幌市中央区北14条西15丁目7",
	 * 			"address_vi": "null",
	 * 			"address_en": "null",
	 * 			"address_cn": null,
	 * 			"address_es": null,
	 * 			"address_ko": null,
	 * 			"name_vi": "null",
	 * 			"name_en": "null",
	 * 			"name_cn": null,
	 * 			"name_es": null,
	 * 			"name_ko": null,
	 * 			"lat": "43.07413016",
	 * 			"long": "141.3329867",
	 * 			"category_id": 6
	 * 		}
	 * 	],
	 * 	"msg": "Get success!",
	 * 	"code": "S200"
	 * }
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
	
	public function searchUtilitiesInCity();

	/**
	 * @api {get} api/searchUtilitiesInCity/:city/:cate/:lang/:lat/:long/:device_code/:token Search Utilities with cate in Device's City
	 * @apiName search Utilities In City
	 * @apiGroup Utility
	 * @apiVersion 1.0.0
	 *
	 * @apiParam {String} city City's name of Device
	 * @apiParam {Int} cate Category's Id
	 * @apiParam {String} lang Language of Device
	 * @apiParam {String} token Json web token
	 * @apiParam {String} lat latitude of device
	 * @apiParam {String} long longtitude of device
	 * @apiParam {String} device_code Code of device
	 *
	 * @apiSuccessExample Success
	 * HTTP/1.1 200 OK
	 * {
	 * 	"body": [
	 * 		{
	 * 			"id": 9303,
	 * 			"name": "自動販売機01",
	 * 			"address": "振り返ると、Cau Giay、 Ha Noi",
	 * 			"address_vi": "Dịch vọng hậu, Cầu Giấy, Hà Nội",
	 * 			"address_en": "Dich vong hau, Cau giay, Ha Noi",
	 * 			"address_cn": null,
	 * 			"address_es": null,
	 * 			"address_ko": null,
	 * 			"name_vi": "Máy bán hàng tự động 01",
	 * 			"name_en": "Vending Machine 01",
	 * 			"name_cn": null,
	 * 			"name_es": null,
	 * 			"name_ko": null,
	 * 			"lat": "21.038427",
	 * 			"long": "105.782023",
	 * 			"category_id": 1
	 * 		},
	 * 		{
	 * 			"id": 9304,
	 * 			"name": "自動販売機02",
	 * 			"address": "振り返ると、Cau Giay、 Ha Noi",
	 * 			"address_vi": "Dịch vọng hậu, Cầu Giấy, Hà Nội",
	 * 			"address_en": "Dich vong hau, Cau giay, Ha Noi",
	 * 			"address_cn": null,
	 * 			"address_es": null,
	 * 			"address_ko": null,
	 * 			"name_vi": "Máy bán hàng tự động 02",
	 * 			"name_en": "Vending Machine 02",
	 * 			"name_cn": null,
	 * 			"name_es": null,
	 * 			"name_ko": null,
	 * 			"lat": "21.037761",
	 * 			"long": "105.182176",
	 * 			"category_id": 1
	 * 		},
	 * 	],
	 * 	 "msg": "Get success!",
	 * 	 "code": "S200"
	 * }
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
	
	public function deleteUtility($id);

	/**
	 * @api {post} api/deleteUtility/:id Delete Utility
	 * @apiName Delete Utility
	 * @apiGroup Utility
	 * @apiVersion 1.0.0
	 * 
	 * @apiParam {Int} id Utility's ID
	 * @apiParam {String} token Json WebToken
	 * 
	 *@apiSuccessExample Success
	 *HTTP/1.1 200 OK
	 * {
	 *  "body": "",
	 *  "msg": "Delete success!",
	 *  "code": "S200"
	 * }
	 *
	 * @apiErrorExample Error
	 * HTTP/1.1 404 Error
	 * {
	 *  "body": "",
	 *  "msg": "Not found",
	 *  "code": "E404"
	 * }
	 */
}