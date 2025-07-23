<?php

namespace App\Interfaces\Services;

use Illuminate\Database\Eloquent\Collection;

interface ClickServiceInterface
{
    public function trackClick(array $data): void;

    public function listClicks(string $url): Collection;

    public function countClicks(string $url): int;
}
