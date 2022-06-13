<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Détails de client')  }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($courses  as $course)
                        <div class="accordion-item">
                          <h2 class="accordion-header flex" id="flush-headingOne">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne{{ $course->id }}" aria-expanded="false" aria-controls="flush-collapseOne{{ $course->id }}">
                              Numero de course 00000{{ $course->stop->numero_de_stop}}
                              <strong class="marg-left badge bg-primary text-white rounded-xs text-xs">{{$course->created_at->diffForHumans()}}</strong>

                            </button>
                          </h2>
                          <div id="flush-collapseOne{{ $course->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne{{ $course->id }}" data-bs-parent="#accordionFlushExample">
                            <div class="row m-2">
                                <ul class="list-group col-6">
                                    <li aria-describedby="basic-addon1" class="list-group-item">Nom : {{ $course->client->username }}</li>
                                    <li class="list-group-item">Email : {{ $course->client->email }}</li>
                                    <li class="list-group-item">Telephone : {{ $course->client->telephone }}</li>
                                </ul>
                                <ul class="list-group col-6">
                                    @if (isset($course->ramassage->adresse))
                                    <li class="list-group-item">Adresse de Ramasage : {{ $course->ramassage->adresse }} </li>
                                    <li class="list-group-item">Ramasage Avant : {{ $course->ramassage_avant }} </li>

                                    @else

                                    <li class="list-group-item">Adresse de livraison : {{ $course->livraison->adresse }}</li>
                                    <li class="list-group-item">Livraison Avant : {{ $course->livraison_avant }}</li>
                                    @endif
                                    <li class="list-group-item"> Prix : {{ $course->prix }}</li>

                                </ul>
                            </div>

                          </div>
                        </div>

                        @endforeach
                    </div>
                   {{ $courses->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>



{{--                     <div class="list-group">
                        @foreach ($courses  as $course)
                        <a href="#" class="list-group-item list-group-item-action hover" aria-current="true">
                          <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-1">{{ $course->stop->user->name}}</h5>
                            <small> {{ $course->created_at->diffForHumans() }} </small>
                          </div>
                          <p class="mb-1">{{ $course->client->username }}</p>
                          <p class="mb-1">{{ $course->client->email }}</p>
                          <p class="mb-1">{{ $course->client->telephone }}</p>
                          @if(isset($course->ramassage->adresse))
                          <p class="mb-1">{{ $course->ramassage->adresse }}</p>
                          @else
                          <p class="mb-1">{{ $course->livraison->adresse }}</p>
                          @endif
                          <small>{{ $course->prix }}</small>
                        </a>
                        @endforeach

                      </div> --}}
