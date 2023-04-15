<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->slug, 'property' => $property]) }}" title="{{ $property->title }}">
                {{ Str::limit($property->title, 16) }}
            </a>
        </h5>
        <p class="card-text">
            {{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})
        </p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($property->price, thousands_separator: " ") }} €
        </div>
    </div>
</div>
