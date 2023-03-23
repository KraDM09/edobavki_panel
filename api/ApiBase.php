<?php

namespace app\api;
use Firebase\JWT\JWT;
use GuzzleHttp\Client;
use Yii;

class ApiBase {
    public string $url;
    public int $timeout = 3;

    /**
     * @param string $url
     */
    public function __construct(string $url) {
        $this->url = $url;
    }

    function request(array $json, string $endpoint): array {
        $client = new Client();

        try {
            $res = $client->request('POST', "{$this->url}/{$endpoint}", [
                'headers' => [
                    'x-access-token' => JWT::encode([
                        'user_id' => Yii::$app->user->identity->id
                    ], $_ENV['API_SECRET'], 'HS256')
                ],
                'json' => $json,
                'timeout' => $this->timeout,
            ]);

            $response = json_decode($res->getBody(), true);
        } catch (\Exception $ex) {
            $response = [
                'code' => 500,
                'message' => $ex->getMessage()
            ];
        }

        return $response;
    }
}
