<?php

namespace App\Http\Controllers\Chat;

use Illuminate\Http\Request;
use OpenAI\Client;

class ChatbotController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = \OpenAI::client(config('openai.api_key'));
    }

    public function chat(Request $request)
    {
        $response = $this->client->completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $request->input('message'),
            'max_tokens' => 150
        ]);

        return response()->json(['response' => $response['choices'][0]['text']]);
    }
}
