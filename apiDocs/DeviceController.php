<?php

interface DeviceController
{
    public function login();

    /**
     * @api {post} api/auth/login Login for get json web token
     * @apiName Login for get token
     * @apiGroup Authenticate
     * @apiVersion 1.0.0
     *
     * @apiParam {String} email  Email login
     * @apiParam {String} password Password login
     * @apiParam {String} device_code Code of device
     * @apiParam {String} username Name of device
     *
     *
     * @apiSuccessExample Success
     * HTTP/1.1 200 OK
     *{
     *  "body": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly8xOTIuMTY4LjEwLjMwL01hcHBpbmdMb2NhdGUvYXBpL2F1dGgvbG9naW4iLCJpYXQiOjE1MzEwOTk2MjQsImV4cCI6MTUzMTI3MjQyNCwibmJmIjoxNTMxMDk5NjI0LCJqdGkiOiJOblFPMUdjcjNhazg0cXR2In0.HGL06hrNqBMjRMILbPlkRLoTzj62FLi8QL5IPBC__GQ",
     *  "msg": "Login successfully",
     *  "code": "S200"
     *}
     *
     *  @apiErrorExample Error(422)
     * HTTP/1.1 422 Error
     *{
     *  "body": "",
     *  "msg": "invalid_email_or_password",
     *  "code": "S422"
     *}
     *
     * @apiErrorExample Error(500)
     * HTTP/1.1 500 Error
     * {
     *   "body": "",
     *   "msg": "failed_to_create_token",
     *   "code": "S500"
     * }
     * 
     */
}