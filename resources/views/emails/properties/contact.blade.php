<x-mail::message>
# Nouvelle demamde de contact

Une nouvelle demande de contact à été fait pour le bien <a href="{{ route("property.show", ["slug" => $property->slug, "property" => $property]) }}">{{ $property->title }}</a>

- Prénom: {{ $data["firstname"] }}
- Nom: {{ $data["lastname"] }}
- Téléphone: {{ $data["phone"] }}
- Email: {{ $data["email"] }}

***Message :**<br>
{{ $data["message"] }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
