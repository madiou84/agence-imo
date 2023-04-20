<div class="card">
    <div>
        @if ($property->thumbnail)
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="true">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ $property->thumbnail }}" width="600" height="200" class="d-block w-100"
                            alt="{{ $property->thumbnail }}" />
                    </div>
                    <div class="carousel-item">
                        <img src="{{ $property->thumbnail }}" width="600" height="200" class="d-block w-100"
                            alt="{{ $property->thumbnail }}" />
                    </div>
                    <div class="carousel-item">
                        <img src="{{ $property->thumbnail }}" width="600" height="200" class="d-block w-100"
                            alt="{{ $property->thumbnail }}" />
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        @else
            <img width="600" height="200" class="card-img-top object-fit-cover" alt="https://placehold.co/600x400"
                src="https://placehold.co/600x400" />
        @endif
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
