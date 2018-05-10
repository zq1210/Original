<?php

namespace wechat\controllers;

use Yii;
use wechat\components\BaseController;
use GuzzleHttp\Client;

class LoginController extends BaseController
{
    public function actionIndex()
    {
        // https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=SECRET&js_code=JSCODE&grant_type=authorization_code
        $js_code = Yii::$app->request->post('js_code');
        $js_code = 'xxxxxxx';
        $client = new Client();
		$res = $client->request('GET', 'https://api.weixin.qq.com/sns/jscode2session', [
            'query' => [
                'appid' => 'wx3321acae41983595',
                'secret' => 'xxxxxx',
                'js_code' => $js_code,
                'grant_type' => 'authorization_code'
            ],
        ]);
		$data = json_decode($res->getBody()->getContents());
        return ['data' => $data];
    }
}