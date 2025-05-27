<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class DeepseekService
{
    protected Client $client;

    protected string $key;

    public function __construct()
    {
        $this->key = config('services.deepseek.key');
        $this->client = new Client([
            'base_uri' => config('services.deepseek.base_uri'),
            'headers' => [
                'Authorization' => 'Bearer '.$this->key,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function evaluate(?string $description, ?string $question): array
    {
        $payload = [
            'model' => 'deepseek-reasoner',
            'messages' => [
                ['role' => 'system', 'content' => "Usa sólo esta descripción:\n".($description ?? '')],
                ['role' => 'user',   'content' => $question ?? ''],
            ],
            'stream' => false,
        ];

        Log::debug('Deepseek payload', $payload);

        $response = $this->client->post('/v1/chat/completions', [
            'json' => $payload,
        ]);

        $data = json_decode($response->getBody(), true);

        Log::debug('Deepseek response', $data);

        return $data;
    }
}
