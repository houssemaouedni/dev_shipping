<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des client') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ol class="list-group list-group-numbered">

                        @foreach ($users as $user)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                          <div class="ms-2 me-auto">
                            <div class="fw-bold">{{ $user->name }}</div>
                          </div>
                          <x-nav-link :href="route('admin_client_show',['id' => $user->id])" class="btn text-white btn-sm bg-secondary rounded-xl"> view  <span class="badge badge-warning">{{ count($stops->where('user_id',(int)$user->id)->whereNotIn('numero_de_stop', [0])) }}</span></x-nav-link>
                        </li>

                        @endforeach
                    </ol>


                </div>
            </div>
        </div>
    </div>

</x-app-layout>
