<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "description",
        "surface",
        "rooms",
        "bedrooms",
        "floor",
        "price",
        "city",
        "address",
        "postal_code",
        "sold",
        "thumbnail"
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlugAttribute(): string
    {
        return Str::slug($this->attributes["title"]);
    }

    public function scopeFilter(Builder $query, array $filters): Builder
    {
        return $query
            ->when($filters["surface"] ?? null, function ($query, $surface) {
                $query->where("surface", ">=", $surface);
            })
            ->when($filters["rooms"] ?? null, function ($query, $rooms) {
                $query->where("rooms", ">=", $rooms);
            })
            ->when($filters["price"] ?? null, function ($query, $price) {
                $query->where("price", "<=", $price);
            })
            ->when($filters["title"] ?? null, function ($query, $title) {
                $query->where("title", "like", "%{$title}%");
            });
    }
}
