@extends('layouts.app')

@section('content')
<style>
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

    .form-group {
        margin-bottom: 1rem;
    }

    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: #374151;
    }

    .form-input {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        font-size: 0.875rem;
    }

    .form-input:focus {
        outline: none;
        border-color: #22c55e;
        box-shadow: 0 0 0 2px rgba(34, 197, 94, 0.2);
    }

    .error-message {
        color: #dc2626;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }

    .button-container {
        display: flex;
        justify-content: flex-end;
        gap: 12px;
        margin-top: 1.5rem;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Ajouter un Fournisseur</h2>
                    <a href="{{ route('fournisseurs.index') }}" class="btn btn-cancel">
                        Retour à la liste
                    </a>
                </div>

                <form method="POST" action="{{ route('fournisseurs.store') }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                        <div class="form-group">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" name="nom" id="nom" value="{{ old('nom') }}" class="form-input @error('nom') border-red-500 @enderror" required>
                            @error('nom')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" name="adresse" id="adresse" value="{{ old('adresse') }}" class="form-input @error('adresse') border-red-500 @enderror" required>
                            @error('adresse')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" name="telephone" id="telephone" value="{{ old('telephone') }}" class="form-input @error('telephone') border-red-500 @enderror" required>
                            @error('telephone')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input @error('email') border-red-500 @enderror" required>
                            @error('email')
                                <p class="error-message">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="button-container">
                        <a href="{{ route('fournisseurs.index') }}" class="btn btn-cancel">
                            Annuler
                        </a>
                        <button type="submit" class="btn btn-submit">
                            Créer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 