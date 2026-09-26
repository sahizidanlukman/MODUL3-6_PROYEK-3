<?php

namespace App\Services;

use App\Models\Activity;
use DomainException;

class ActivityService
{
    public function create(array $data): Activity
    {
        return Activity::create($data);
    }

    public function update(Activity $activity, array $data): Activity
    {
        // Periksa aturan transisi status (BR-03A)
        $this->ensureValidTransition($activity->status, $data['status']);

        $activity->update($data);

        return $activity;
    }

    private function ensureValidTransition(string $current, string $next): void
    {
        $allowedTransitions = [
            'Planned' => ['Planned', 'Ongoing'],
            'Ongoing' => ['Ongoing', 'Done'],
            'Done' => ['Done'],
        ];

        if (! isset($allowedTransitions[$current]) || ! in_array($next, $allowedTransitions[$current])) {
            throw new DomainException("Transisi status dari '{$current}' ke '{$next}' tidak diizinkan.");
        }
    }
}
