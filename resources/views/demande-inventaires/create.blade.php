@extends('layouts.app')
<style>
    .btn-submit {
        background-color: #22c55e;
    }
    .btn-submit:hover {
        background-color: #16a34a;
    }
    
</style>
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Nouvelle Demande d'Inventaire</h2>
                <br>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('demande-inventaires.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="date_demande" class="block text-gray-700 text-sm font-bold mb-2">Date de demande</label>
                        <input type="date" name="date_demande" id="date_demande" value="{{ old('date_demande', date('Y-m-d')) }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>

                    <div class="mb-4">
                        <label for="libelle" class="block text-gray-700 text-sm font-bold mb-2">Libellé</label>
                        <select name="libelle" id="libelle" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <option value="">Sélectionnez un article</option>
                            @foreach($inventaires as $inventaire)
                                <option value="{{ $inventaire->libelle }}">{{ $inventaire->libelle }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="quantite" class="block text-gray-700 text-sm font-bold mb-2">Quantité</label>
                        <input type="number" name="quantite" id="quantite" value="{{ old('quantite') }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            min="1">
                    </div>

                    <div style="display: flex; justify-content: right; align-items: center; gap: 10px;">
                    <a class="btn btn-secondary" href="{{ route('demande-inventaires.index') }}" class="text-gray-600 hover:text-gray-800">
                            Annuler
                        </a>
                        <button class="btn btn-submit" type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Créer la demande
                        </button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 