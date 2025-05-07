@extends('layouts.app')
<style>
    .btn {
        padding: 8px 16px;
        border: none;
        border-radius: 4px;
        color: white;
        cursor: pointer;    
    }
    .btn-submit {
        background-color: #22c55e;
    }
    
    .btn-submit:hover {
        background-color: #16a34a;
    }

    .btn-secondary {
        background-color: #6b7280;
    }
    
    .btn-secondary:hover {
        background-color: #4b5563;
    }

    .form-input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        margin-bottom: 1rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        margin-bottom: 0.5rem;
        color: #374151;
    }

    .error-message {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>
@section('content')

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-800">Demande de Véhicule</h1>
            <BR></BR>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('demandes.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="date_demande" class="form-label">Date de Demande</label>
                    <input type="date" name="date_demande" id="date_demande" 
                           class="form-input @error('date_demande') border-red-500 @enderror" 
                           value="{{ old('date_demande') }}" required>
                    @error('date_demande')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="distance_total" class="form-label">Distance (km)</label>
                    <input type="number" step="0.01" name="distance_total" id="distance_total" 
                           class="form-input @error('distance_total') border-red-500 @enderror" 
                           value="{{ old('distance_total') }}" required>
                    @error('distance_total')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="matricule" class="form-label">Matricule du Véhicule</label>
                    <select name="matricule" id="matricule" 
                            class="form-input @error('matricule') border-red-500 @enderror" required>
                        <option value="">Sélectionnez un véhicule</option>
                        @foreach($automobiles as $automobile)
                            <option value="{{ $automobile->matricule }}" 
                                    {{ old('matricule') == $automobile->matricule ? 'selected' : '' }}>
                                {{ $automobile->matricule }} 
                            </option>
                        @endforeach
                    </select>
                    @error('matricule')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <input type="hidden" name="status" value="en attente">

                <div class="flex justify-end space-x-4 mt-6">
                    <a href="{{ route('demandes.index') }}" class="btn btn-secondary">Retour</a>
                    <button type="submit" class="btn btn-submit">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection