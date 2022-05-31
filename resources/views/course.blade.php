<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create une Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="row">
                        <div class="col-6" id="form_rammasage">
                            <x-form_rammasage />
                                <div class="row">
                                    <button id="btnRammasage" class="btn-sm btn btn-success m-1">Ajouter une point de rammasage</button>
                                    <button id="btnLivraison" class="btn-sm btn btn-success m-1">ajouter une point de livraison</button>
                                </div>
                        </div>
                        <div class="col-6">
                            <div class="">map</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

