<?php

declare(strict_types=1);

namespace App\Models;

use Filterable\Contracts\Filterable;
use Filterable\Traits\Filterable as HasFilters;
use Illuminate\Database\Eloquent\Attributes\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model implements Filterable
{
    use HasFactory;
    use HasFilters;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'question',
        'answer',
        'order',
        'is_active',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    /**
     * Scope to only active FAQs.
     */
    #[Scope]
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to order by display order.
     */
    #[Scope]
    public function scopeOrdered(Builder $query): Builder
    {
        return $query->orderBy('order');
    }

    /**
     * Get FAQs formatted for the frontend.
     *
     * @return array<int, array{question: string, answer: string}>
     */
    public static function getForFrontend(): array
    {
        return static::query()
            ->active()
            ->ordered()
            ->get(['question', 'answer'])
            ->map(fn (self $faq) => [
                'question' => $faq->question,
                'answer' => $faq->answer,
            ])
            ->toArray();
    }
}
