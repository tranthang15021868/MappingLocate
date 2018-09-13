<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Mail;

use App\Services\MailService;
use App\Services\UtilitiesService;

use JWTAuth;
use Helpers\Api;

class MailController extends Controller
{
    protected $user;

    protected $mailService;

    /**
     * MailController constructor.
     * @param MailService $mailService
     */
    public function __construct(MailService $mailService)
    {
        $this->user = JWTAuth::parseToken()->authenticate();
        $this->mailService = $mailService;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMailReport(Request $request, $id)
    {

        $deviceCode = $request->deviceCode;
        $mailRevice = $request->mailRevice;
        $content = $request->contents;
        $lat = $request->lat;
        $long = $request->long;

        $this->mailService->saveMailLog($deviceCode, $id, $mailRevice, $content, $lat, $long);
        $utilitiesService = new UtilitiesService();
        $utilities = $utilitiesService->find($id);
        $data = ['content' => $content, 'utilities' => $utilities, 'deviceCode' => $deviceCode];

        Mail::send('mail.mail_report', $data, function ($msg) {
            $msg->from('revivemap@gmail.com', 'Notification From MappingLocate');
            $msg->to('info.ominext.com')->subject('New Notification For Report Utility From User');
        });
        if (Mail::failures()) {
            return Api::r_response("", 'Server Error', 'E500');
        } else {
            return Api::r_response("", 'Send mail success', 'S200');
        }
    }
}
