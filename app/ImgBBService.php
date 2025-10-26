<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ImgBBService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('IMGbb_API_KEY'); // Get free API key from https://api.imgbb.com/
    }

    /**
     * Upload image to ImgBB
     */
    public function uploadImage($imageFile)
    {
        try {
            $response = $this->client->post('https://api.imgbb.com/1/upload', [
                'multipart' => [
                    [
                        'name' => 'key',
                        'contents' => $this->apiKey
                    ],
                    [
                        'name' => 'image',
                        'contents' => fopen($imageFile->getRealPath(), 'r'),
                        'filename' => $imageFile->getClientOriginalName()
                    ]
                ]
            ]);

            $data = json_decode($response->getBody(), true);

            if ($data['success']) {
                return [
                    'success' => true,
                    'url' => $data['data']['url'],
                    'delete_url' => $data['data']['delete_url'] ?? null,
                    'thumb_url' => $data['data']['thumb']['url'] ?? $data['data']['url']
                ];
            }

            return ['success' => false, 'error' => 'Upload failed'];

        } catch (\Exception $e) {
            Log::error('ImgBB Upload Error: ' . $e->getMessage());
            return ['success' => false, 'error' => $e->getMessage()];
        }
    }
}
