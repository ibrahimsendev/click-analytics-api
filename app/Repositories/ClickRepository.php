<?php

namespace App\Repositories;

use App\Models\Click;
use App\Interfaces\Repositories\ClickRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ClickRepository implements ClickRepositoryInterface
{
    public function store(array $data): void
    {
        Click::create($data);
    }

    public function getClicksByUrl(string $url): Collection
    {
        return Click::where('url', $url)->latest()->get();
    }

    public function getClickCount(string $url): int
    {
        return Click::where('url', $url)->count();
    }
}
