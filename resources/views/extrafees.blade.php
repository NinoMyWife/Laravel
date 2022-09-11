<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Frais Hors-Forfait') }}
        </h2>
    </x-slot>

    @if ($errors->all())
    <div class="bg-red-100 border-red-500 text-red-900 border-t-4 rounded-b px-4 py-3 shadow-md">
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </div>
    @endif
    <div class="block text-black-500 font-bold" style="margin-left: 2%; margin-top: 2%; text-decoration: underline; font-size: 1.2em;">
    Veuillez saisir vos frais hors forfait :
    </div>
    <form action="{{ route('fraishorsforfait.store') }}" method="post" class="w-full max-w-sm mt-5" enctype="multipart/form-data">
    @csrf
        <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                  Titre :
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" name="label">
            </div>
          </div>

          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                  Montant :
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" name="amount">
            </div>
          </div>

          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                  Date :
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="date" name="date">
            </div>
          </div>

          <div class="md:flex md:items-center mb-6">
            <div class="md:w-1/3">
              <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                  Joindre un fichier :
              </label>
            </div>
            <div class="md:w-2/3">
              <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="file" name="path">
            </div>
          </div>

        <div class="md:flex md:items-center">
            <div class="md:w-1/3"></div>
            <div class="md:w-2/3">
              <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                Envoyer
              </button>
            </div>
          </div>
        </form>
    
   

            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Titre
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Montant
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Justificatif
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>


          <div class="block text-black-500 font-bold" style="margin-left: 2%; margin-top: 2%; margin-bottom: 2%; text-decoration: underline; font-size: 1.2em;">
            Séletionnnez le mois afin de pouvoir regarder l'historique :
          </div>
          <div style="margin-left: 3%;">
          <form>
              <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="mb-3 xl:w-96">
                  <select name="selectedmonth" class="form-select appearance-none
                    block
                    w-full
                    px-3
                    py-1.5
                    text-base
                    font-normal
                    text-gray-700
                    bg-white bg-clip-padding bg-no-repeat
                    border border-solid border-gray-300
                    rounded
                    transition
                    ease-in-out
                    m-0
                    focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example">
                      <option selected>Choisissez le mois</option>
                      @foreach($month as $m)
                      <option value="{{ Carbon\Carbon::parse($m->month_fees)->format('m') }}">{{ $m->month_fees }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            <div class="md:w-2/3">
              <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">Choisir</button>
            </div>
            </form>
              @foreach ( $linesfeeoutpackages as $linesfeeoutpackage )
                  <tbody>
                      <tr class="bg-white border-b 0">
                          <th scope="row" class="px-6 py-4 font-medium text-gray-900  whitespace-nowrap">
                              {{ $linesfeeoutpackage->label }}
                          </th>
                          <td class="px-6 py-4">
                              {{ $linesfeeoutpackage->amount }} €
                          </td>
                          <td class="px-6 py-4">
                              {{ $linesfeeoutpackage->date->format('d/m/Y') }}
                          </td>
                          <td class="px-6 py-4">
                              <a href="{{ route('fraishorsforfait.download', $linesfeeoutpackage) }}"><x-button> Télécharger </x-button></a>
                          </td>
                          <td class="px-6 py-4 text-right">
                              <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"></a>
                          </td>
                      </tr>
                  </tbody>
                  @endforeach
                </table>
            </div>
            </div>
    
</x-app-layout>