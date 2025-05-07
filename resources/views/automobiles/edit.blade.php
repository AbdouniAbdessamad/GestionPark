@extends('layouts.app')

@section('content')
<style>
    .button-container {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
    }
    
    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        color: white;
        cursor: pointer;
        transition: background-color 0.2s;
        text-decoration: none;
        font-size: 14px;
    }
    
    .btn-cancel {
        background-color: #6b7280;
    }
    
    .btn-cancel:hover {
        background-color: #4b5563;
    }
    
    .btn-submit {
        background-color: #22c55e;
    }
    
    .btn-submit:hover {
        background-color: #16a34a;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Modifier l'Automobile</h2>
                    <a href="{{ route('automobiles.index') }}" class="btn btn-cancel">
                        Retour à la liste
                    </a>
                </div>

                <form method="POST" action="{{ route('automobiles.update', $automobile) }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        
                    <div>
                        <label for="Etat" class="block text-sm font-medium text-gray-700">Etat</label>
                        <input type="text" name="Etat" id="Etat" value="{{ old('Etat', $automobile->Etat) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Etat') border-red-500 @enderror">
                    </div>

                    <div>   
                        <label for="Kilometrage" class="block text-sm font-medium text-gray-700">Kilometrage</label>
                        <input type="text" name="Kilometrage" id="Kilometrage" value="{{ old('Kilometrage', $automobile->Kilometrage) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Kilometrage') border-red-500 @enderror">
                    </div>

                    <div>
                        <label for="Vidange" class="block text-sm font-medium text-gray-700">Vidange</label>
                        <input type="text" name="Vidange" id="Vidange" value="{{ old('Vidange', $automobile->Vidange) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Vidange') border-red-500 @enderror">
                    </div>

                    <div>
                        <label for="Carburant" class="block text-sm font-medium text-gray-700">Carburant</label>
                        <input type="text" name="Carburant" id="Carburant" value="{{ old('Carburant', $automobile->Carburant) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('Carburant') border-red-500 @enderror">
                    </div>

                        <div>
                            <label for="matricule" class="block text-sm font-medium text-gray-700">Matricule</label>
                            <input   type="text" name="matricule" id="matricule" value="{{ old('matricule', $automobile->matricule) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm @error('matricule') border-red-500 @enderror">
                            @error('matricule')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="button-container">
                        <a href="{{ route('automobiles.index') }}" class="btn btn-cancel">
                            Annuler
                        </a>
                        <button type="submit" class="btn btn-submit">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 