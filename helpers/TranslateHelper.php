<?php

namespace Helpers;

use Stichoza\GoogleTranslate\TranslateClient;

class TranslateHelper
{
    public function translate($select, $model)
    {
        try {
            $arrProxy = array();
            $proxy = env('PROXY');
            $countStop = 0;
            if ($proxy) {
                $arrProxy = explode(',', $proxy);
            } else {
                $countStop = 3;
            }
            $countProxy = 0;
            $tran = 0;
            $model = new $model;
            $tr = new TranslateClient();
            $tr->setSource('ja'); // Translate from Japanese
            $result = $model->getMore([$select, 'more' => 'true']);
            $language = array('vi', 'en', 'cn', 'es', 'fr');
            foreach ($result as $i => $rl) {
                if ($i == 100) break;
                $arr = array();
                foreach ($select as $sl) {
                    if ($sl == "id") continue;

                    foreach ($language as $lg) {
                        $tran++;
                        $tr->setTarget($lg);
                        if ($tran % 1000) {
                            while (true) {
                                if ($countStop == 3) return 1;
                                try {
                                    $arr[$sl . '_' . $lg] = $tr->setHttpOption(['proxy' => $arrProxy[$countProxy]])->translate($rl->$sl);
                                    break;
                                } catch (\Exception $e) {

                                    if ($countProxy == count($arrProxy) - 1) {
                                        $countProxy = 0;
                                        $countStop++;
                                    }
                                    $countProxy++;
                                    echo "\n chang proxy: " . $arrProxy[$countProxy];
                                }
                            }
                        } else {
                            if ($countProxy == count($arrProxy) - 1) {
                                $countProxy = 0;
                                $countStop++;
                            }
                            echo "\n >1000 field -> chang proxy: " . $arrProxy[$countProxy];
                            $countProxy++;
                        }
                    }
                }
                $model->update($rl->id, $arr);
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}