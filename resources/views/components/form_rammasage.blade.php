
<form id="form" class="d-none" enctype="multipart/form-data" action="{{ route('courses') }}" method="POST">
    @csrf
    <div class="row duplicate-row">

        <div class="col-6">
            <x-label for="USERNAME" :value="__('Nom')" />
            <x-input id="username" class="block m-1 p-2 w-full"
                            type="text"
                            name="username[0][username]"
                            required autocomplete="" />
        </div>
        <div class="col-6">
            <x-label for="telephone" :value="__('N° Téléphone')" />
            <x-input id="telephone" class="block m-1 p-2 w-full"
                            type="text"
                            name="telephone[0][telephone]"
                            required autocomplete="" />
        </div>

    </div>
    <div class="row">
        <div class="col-6">
            <x-label for="email" :value="__('Adresse mail')" />
            <x-input id="email" class="block m-1 p-2 w-full"
                            type="email"
                            name="email[0][email]"
                            required autocomplete="" />
        </div>
        <div class="col-6">
            <x-label for="orderid" :value="__('N° de commande')" />
            <x-input id="orderid" class="block mt-1 p-2 w-full"
                            type="text"
                            name="orderid[0][orderid]"
                            required autocomplete="" />
        </div>
    </div>

    <div class="mt-1">
        <x-label for="adresse_rammasage" :value="__('Adresse de rammasage')" />
        <x-input id="adresse_rammasage" class="controls block mt-1 p-2 w-full"
                        type="text"
                        name="adresse_rammasage[0][adresse_rammasage]"
                         />
    </div>
    <div class="mt-1">
        <x-label for="rammasage_avant" :value="__('Rammasage avant')" />
        <x-input id="ramassage_avant" class="block mt-1 p-2 w-full"
                        type="datetime-local"
                        name="ramassage_avant[0][ramassage_avant]"
                        required autocomplete="" />
    </div>
    <div class="mt-1">
        <x-label for="description" :value="__('Description')" />
        <x-input id="description" class="block mt-1 p-2 w-full"
                        type="text"
                        name="description[0][description]"
                        required autocomplete="" />
    </div>
    <div class="mt-1">
        <x-label for="thumbnail" :value="__('Image de produit')" />
        <x-input id="thumbnail" class="block m-1 p-2 w-full "
                        type="file" name="thumbnail[0][thumbnail]" />
    </div>
    <input type="hidden" name="adresse_livraison[0][adresse_livraison]" value="">
    <input type="hidden" name="livraison_avant[0][livraison_avant]" value="">
    <div id="inputs">

    </div>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-2">
        <button class="btn btn-primary btn-sm" type="submit">Enregistrer</button>
      </div>
</form>


