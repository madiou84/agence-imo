<div class="card">
    <div>
        <img
            width="600"
            height="200"
            class="card-img-top object-fit-cover"
            alt="{{ $property->title }}"
            src="{{ $property->thumbnail ?? "https://placehold.co/600x400" }}"
        />
    </div>
    <div class="card-body">
        <h5 class="card-title">
            <a href="{{ route('property.show', ['slug' => $property->slug, 'property' => $property]) }}"
                title="{{ $property->title }}">
                {{ Str::limit($property->title, 22) }}
            </a>
        </h5>
        <p class="card-text">
            {{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})
        </p>
        <div class="text-primary fw-bold" style="font-size: 1.4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} €
        </div>
    </div>
</div>
