<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'provider' => $this->provider,
            'external_id' => $this->external_id,
            'email' => $this->email,
            'amount_cents' => $this->amount_cents,
            'formatted_amount' => $this->formatted_amount,
            'currency' => $this->currency,
            'meta' => $this->meta,
            'license_id' => $this->license?->id,
            'license' => $this->whenLoaded('license', fn () => (new LicenseResource($this->license))->resolve()),
            'refund_id' => $this->refund_id,
            'refunded_at' => $this->refunded_at?->toIso8601String(),
            'is_refunded' => $this->isRefunded(),
            'can_be_refunded' => $this->canBeRefunded(),
            'is_within_refund_window' => $this->isWithinRefundWindow(),
            'deleted_at' => $this->deleted_at?->toIso8601String(),
            'created_at' => $this->created_at->toIso8601String(),
            'updated_at' => $this->updated_at->toIso8601String(),
        ];
    }
}
