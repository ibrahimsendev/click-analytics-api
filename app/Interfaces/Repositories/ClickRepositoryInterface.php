<?php

namespace App\Interfaces\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface ClickRepositoryInterface
{
    public function store(array $data): void;

    public function getClicksByUrl(string $url): Collection;

    public function getClickCount(string $url): int;
}
