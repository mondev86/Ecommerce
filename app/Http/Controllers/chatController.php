<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Http;

class ChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate(['message' => 'required|string|max:500']);

        // Contexto de tu BD real
        $products = Product::with(['vendor', 'category'])
            ->whereHas('productStatus', fn($q) => $q->where('name', 'active'))
            ->take(20)
            ->get()
            ->map(fn($p) => [
                'name'     => $p->name,
                'price'    => '$' . number_format($p->price, 2),
                'category' => $p->category?->name ?? 'General',
                'vendor'   => $p->vendor?->name ?? 'NexShop',
                'stock'    => $p->quantity > 0 ? 'In stock' : 'Out of stock',
                'description' => str($p->description)->limit(80),
            ]);

            $productList = $products->toJson();

$context = "You are NexBot, the friendly AI assistant for NexShop marketplace. " .
    "CRITICAL: detect the language of the user's message and respond ONLY in that exact language. " .
    "Be concise. When listing products, show MAX 3 results using this format: " .
    "Product Name - price - Category - Vendor - Stock status. " .
    "Separate each product with a line break. Never write long paragraphs. " .
    "Current products available: " . $productList;
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . config('services.groq.key'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model'    => 'llama-3.3-70b-versatile',
            'messages' => [
                ['role' => 'system', 'content' => $context],
                ['role' => 'user',   'content' => $request->message],
            ],
            'max_tokens'  => 300,
            'temperature' => 0.7,
        ]);

        if ($response->failed()) {
            return response()->json(['reply' => 'Sorry, I am unavailable right now.'], 500);
        }

        $reply = $response->json('choices.0.message.content') ?? 'No response.';

        return response()->json(['reply' => $reply]);

            
    }

    
}