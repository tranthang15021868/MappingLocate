<?php

interface MailController {

	public function sendMailReport();

	/**
     * @api {post} api/sendMailReport/:id/:token Send mail report
     * @apiName Send mail report
     * @apiGroup Mail
     * @apiVersion 1.0.0
     *
     * @apiParam {String} id Id of Utility
     * @apiParam {String} deviceCode  Code of device
     * @apiParam {String} mailRevice Mail revice
     * @apiParam {String} contents Content of report
     * @apiParam {String} lat Latitude of device
     * @apiParam {String} long Longtitude of device
     * 
     * @apiSuccessExample Success
     * HTTP/1.1 200 OK
     *{
	    "body": "",
	    "msg": "Send mail success",
	    "code": "S200"
	   }
     *
     *
     * @apiErrorExample Error(500)
     * HTTP/1.1 500 Error
     * {
	    "body": "",
	    "msg": "Server Error",
	    "code": "E500"
		}
     * 
     */
}