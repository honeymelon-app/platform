<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArtifactResource;
use App\Http\Resources\ProductResource;
use App\Models\Artifact;
use App\Models\Faq;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $latestArtifact = Artifact::query()
            ->forDownload()
            ->forPlatform('darwin-aarch64')
            ->latest('created_at')
            ->first();

        $product = Product::query()
            ->where('is_active', true)
            ->first();

        return Inertia::render('Welcome', [
            'artifact' => $latestArtifact ? (new ArtifactResource($latestArtifact))->resolve() : null,
            'product' => $product ? (new ProductResource($product))->resolve() : null,
            'faqs' => Faq::getForFrontend(),
        ]);
    }
}
