<?php

namespace App\Services;

use App\Interfaces\Repositories\ClickRepositoryInterface;
use App\Interfaces\Services\ClickServiceInterface;
use Illuminate\Database\Eloquent\Collection;

class ClickService implements ClickServiceInterface
{
    public function __construct(private ClickRepositoryInterface $clickRepository) {}

    public function trackClick(array $data): void
    {
        $this->clickRepository->store($data);
    }

    public function listClicks(string $url): Collection
    {
        return $this->clickRepository->getClicksByUrl($url);
    }

    public function countClicks(string $url): int
    {
        return $this->clickRepository->getClickCount($url);
    }
}
