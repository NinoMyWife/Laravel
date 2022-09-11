<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Frais Forfaitisés') }}
        </h2>
    </x-slot>
    <div class="block text-black-500 font-bold" style="margin-left: 2%; margin-top: 2%; margin-bottom: 2%; text-decoration: underline; font-size: 1.2em;">
      Veuillez saisir vos frais :
    </div>
    <form action="{{ route('listefrais.store') }}" method="post" class="w-full max-w-sm mt-5">
    @csrf
    @foreach ( $linesFeePackages as $linesFeePackage )
        
            <div class="md:flex md:items-center mb-6">
              <div class="md:w-1/3">
                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                    {{ $linesFeePackage->feePackage->label }} :
                </label>
              </div>
              <div class="md:w-2/3">
                <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="{{ $linesFeePackage->quantity }}" name="feePackage[{{ $linesFeePackage->feePackage->id }}]">
              </div>
            </div>

    @endforeach

    <div class="md:flex md:items-center">
        <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
          <button class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
            Envoyer
          </button>
        </div>
      </div>
    </form>
</x-app-layout>