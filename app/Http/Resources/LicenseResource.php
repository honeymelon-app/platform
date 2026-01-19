<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Enums\LicenseStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LicenseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'order_id' => $this->order_id,
            'key' => $this->key_plain,
            'key_hash' => $this->key,
            'status' => $this->status->value,
            'max_major_version' => $this->max_major_version ?? 1,
            'can_access_prereleases' => $this->can_access_prereleases,
            'meta' => $this->meta,
            'issued_at' => $this->meta['issued_at'] ?? null,
            'activated_at' => $this->activated_at?->toIso8601String(),
            'activation_count' => $this->activation_count ?? 0,
            'device_id' => $this->device_id,
            'is_activated' => $this->isActivated(),
            'can_be_revoked' => $this->status === LicenseStatus::ACTIVE,
            'deleted_at' => $this->deleted_at?->toIso8601String(),
            'created_at' => $this->created_at?->toIso8601String(),
            'updated_at' => $this->updated_at?->toIso8601String(),
        ];
    }
}
