@if (isset($course->ramassage->id))
<form  enctype="multipart/form-data" action="{{ route('course_update',['id' => $course->id, 'client_id' => $course->client->id, 'ramassage_id' => $course->ramassage->id]) }}" method="POST">
    @else
    <form  enctype="multipart/form-data" action="{{ route('course_updates',['id' => $course->id, 'client_id' => $course->client->id, 'livraison_id' => $course->livraison->id]) }}" method="POST">
@endif
    @csrf
    <div class="row duplicate-row">

        <div class="col-6">
            <x-label for="USERNAME" :value="__('Nom')" />
            <x-input id="username" class="block m-1 p-2 w-full"
                            type="text"
                            name="username"
                            value="{{ $course->client->username }}"
                            required autocomplete="" />
        </div>
        <div class="col-6">
            <x-label for="telephone" :value="__('N° Téléphone')" />
            <x-input id="telephone" class="block m-1 p-2 w-full"
                            type="text"
                            name="telephone"
                            value="{{ $course->client->telephone }}"
                            required autocomplete="" />
        </div>

    </div>
    <div class="row">
        <div class="col-6">
            <x-label for="email" :value="__('Adresse mail')" />
            <x-input id="email" class="block m-1 p-2 w-full"
                            type="email"
                            name="email"
                            value="{{ $course->client->email }}"
                            required autocomplete="" />
        </div>
        <div class="col-6">
            <x-label for="orderid" :value="__('N° de commande')" />
            <x-input id="orderid" class="block mt-1 p-2 w-full"
                            type="text"
                            name="orderid"
                            {{-- value="{{ $course->orderid }}" --}}
                            required autocomplete="" />
        </div>
    </div>
    @if(isset($course->ramassage->adresse))
    <div class="mt-1">
        <x-label for="adresse_rammasage" :value="__('Adresse de rammasage')" />
        <x-input id="adresse_rammasage" class="controls block mt-1 p-2 w-full"
                        type="text"
                        name="adresse_rammasage"
                        value="{{ $course->ramassage->adresse }}"
                         />
    </div>
    <div class="mt-1">
        <x-label for="rammasage_avant" :value="__('Rammasage avant')" />
        <x-input id="ramassage_avant" class="block mt-1 p-2 w-full"
                        type="datetime-local"
                        name="ramassage_avant"
                        value="{{ $course->ramassage_avant }}"
                        required autocomplete="" />
    @else
    <div class="mt-1">
        <x-label for="adresse_livraison" :value="__('Adresse de Livraison')" />
        <x-input id="adresse_livraison" class="controls block mt-1 p-2 w-full"
                        type="text"
                        name="adresse_livraison"
                        value="{{ $course->livraison->adresse }}"
                         />
    </div>
    <div class="mt-1">
        <x-label for="livraison_avant" :value="__('Livraison avant')" />
        <x-input id="livraison_avant" class="block mt-1 p-2 w-full"
                        type="datetime-local"
                        name="livraison_avant"
                        value="{{ $course->livraison_avant }}"
                        required autocomplete="" />
    @endif
    </div>
    <div class="mt-1">
        <x-label for="description" :value="__('Description')" />
        <x-input id="description" class="block mt-1 p-2 w-full"
                        type="text"
                        name="description"
                        value="{{ $course->description }}"
                        required autocomplete="" />
    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
        <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
      </div>
</form>
