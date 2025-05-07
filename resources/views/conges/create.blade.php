@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Nouvelle Demande de Congé</h2>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('conges.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="date_debut" class="block text-sm font-medium text-gray-700">Date de début</label>
                        <input type="date" name="date_debut" id="date_debut" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                               value="{{ old('date_debut') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="Duree" class="block text-sm font-medium text-gray-700">Durée (en jours)</label>
                        <input type="number" name="Duree" id="Duree" min="1"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                               value="{{ old('Duree') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="type_conge" class="block text-sm font-medium text-gray-700">Type de congé</label>
                        <select name="type_conge" id="type_conge" 
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>
                            <option value="">Sélectionnez un type</option>
                            <option value="Annuel" {{ old('type_conge') == 'Annuel' ? 'selected' : '' }}>Congé annuel</option>
                            <option value="Maladie" {{ old('type_conge') == 'Maladie' ? 'selected' : '' }}>Congé maladie</option>
                            <option value="Maternité" {{ old('type_conge') == 'Maternité' ? 'selected' : '' }}>Congé maternité</option>
                            <option value="Paternité" {{ old('type_conge') == 'Paternité' ? 'selected' : '' }}>Congé paternité</option>
                            <option value="Exceptionnel" {{ old('type_conge') == 'Exceptionnel' ? 'selected' : '' }}>Congé exceptionnel</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('conges.index') }}" 
                           class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                            Annuler
                        </a>
                        <button style="margin-left: 10px;" class="btn btn-primary" type="submit" 
                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Soumettre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 