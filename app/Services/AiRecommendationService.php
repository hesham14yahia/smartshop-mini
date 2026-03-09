<?php

namespace App\Services;

use App\Ai\Agents\ProductRecommendation;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Laravel\Ai\Enums\Lab;

class AiRecommendationService
{
    public function recommend(array $lastViewedIds, int $limit = 3)
    {
        $products = Product::whereIn('id', $lastViewedIds)->get();

        if ($products->isEmpty()) {
            return Product::inRandomOrder()->take($limit)->get();
        }

        $prompt = "Recommend {$limit} products similar to:\n";

        foreach ($products as $p) {
            $prompt .= "- {$p->name}: {$p->description}\n from this list:\n";

            $prompt .= implode("\n", array_map(fn($p) => "- {$p->name}: {$p->description}", $products->all()));

            }
            $prompt .= "return only product names \n";

        try {
            return Cache::remember(
                'ai_recommendations_' . md5($prompt),
                now()->addMinutes(2),
                function () use ($prompt, $limit) {

                    $response = (new ProductRecommendation)->prompt(
                        $prompt,
                        provider: Lab::Gemini,
                        timeout: 120,
                    );

                    $text = $response->text;

                    $names = collect(explode("\n", $text))
                        ->map(fn ($n) => trim($n))
                        ->filter();

                    return Product::whereIn('name', $names)
                        ->take($limit)
                        ->get();
                }
            );
        } catch (\Exception $e) {
            return Product::inRandomOrder()->take($limit)->get();
        }
    }
}
