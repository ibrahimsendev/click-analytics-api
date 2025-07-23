<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClickRequest;
use App\Http\Resources\ClickResource;
use App\Services\ClickService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ClickController extends Controller
{
    public function __construct(private ClickService $clickService) {}

    public function store(ClickRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['ip_address'] = $request->ip();
        $data['user_agent'] = $request->userAgent();

        $this->clickService->trackClick($data);

        return response()->json(['message' => 'Click tracked successfully'], 201);
    }

    public function index(string $encodedUrl): AnonymousResourceCollection
    {
        $url = $this->decodeUrl($encodedUrl);
        $clicks = $this->clickService->listClicks($url);
        return ClickResource::collection($clicks);
    }

    public function count(string $encodedUrl): JsonResponse
    {
        $url = $this->decodeUrl($encodedUrl);
        $count = $this->clickService->countClicks($url);
        return response()->json(['url' => $url, 'click_count' => $count]);
    }

    private function decodeUrl(string $encodedUrl): string
    {
        $decoded = base64_decode($encodedUrl, true);

        if ($decoded === false) {
            abort(400, 'Invalid URL encoding.');
        }

        return $decoded;
    }
}
