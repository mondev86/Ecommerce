<?php

use Illuminate\Support\Facades\Http;

it('can chat with the bot and get a response', function () {
    // If you want to actually test the Groq API, we don't mock it.
    // However, if you want to prevent hitting the real API in normal tests, you would use Http::fake() here.
    
    $response = $this->postJson('/api/chat', [
        'message' => 'hola, que productos tienes?'
    ]);

    $response->assertStatus(200)
             ->assertJsonStructure(['reply']);
    
    // Print the reply to the console so we can see the bot's response during the test
    echo "\nBot Reply: " . $response->json('reply') . "\n";
});
