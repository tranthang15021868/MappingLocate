<?php

namespace App\Services;

use App\Models\MailLog;

class MailService extends BaseService
{
    /**
     * EloquentRepository constructor.
     */
    protected $utilitiesService;

    public function __construct(UtilitiesService $utilitiesService)
    {
        parent::__construct();

        $this->utilitiesService = $utilitiesService;
    }

    /**
     * Get Model
     * @return string
     */
    public function getModel()
    {
        return MailLog::class;
    }

    public function count()
    {
        return $this->_model->count();
    }

    /**
     * Save Mail Log
     * @param $deviceCode
     * @param $utilitiesID
     * @param $mailRecive
     * @param $content
     * @param $lat
     * @param $long
     */
    public function saveMailLog($deviceCode, $utilitiesID, $mailRecive, $content, $lat, $long)
    {
        $user = new UsersService();
        $userID = $user->findCondition('device_code', '=', $deviceCode);

        $this->create(['user_id' => $userID->id, 'utilities_id' => $utilitiesID, 'mail_revice' => $mailRecive, 'content' => $content, 'lat' => $lat, 'long' => $long]);
    }
}