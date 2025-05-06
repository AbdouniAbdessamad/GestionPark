@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 1rem;
        min-height: calc(100vh - 100px);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .form-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        padding: 2rem;
        width: 100%;
        max-width: 1000px;
    }
    .form-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }
    .form-title {
        font-size: 2rem;
        font-weight: bold;
        color: #1a202c;
    }
    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
        margin-bottom: 2rem;
    }
    .form-group {
        margin-bottom: 0.5rem;
    }
    .form-label {
        display: block;
        font-size: 1rem;
        font-weight: 500;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }
    .form-input {
        width: 100%;
        height: 2.5rem;
        padding: 0.5rem 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.2s;
    }
    .form-input:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }
    .form-input.error {
        border-color: #e53e3e;
    }
    .error-message {
        color: #e53e3e;
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
        padding-top: 1.5rem;
        border-top: 1px solid #e2e8f0;
    }
    .btn {
        display: inline-flex;
        align-items: center;
        height: 2.5rem;
        padding: 0 1.5rem;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        transition: background-color 0.2s;
        cursor: pointer;
        text-decoration: none;
    }
    .btn-secondary {
        background-color: #4a5568;
        color: white;
    }
    .btn-secondary:hover {
        background-color: #2d3748;
    }
    .btn-primary {
        background-color: #667eea;
        color: white;
    }
    .btn-primary:hover {
        background-color: #5a67d8;
    }
    @media (max-width: 640px) {
        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>

<div class="form-container">
    <div class="form-card">
        <div class="form-header">
            <h1 class="form-title">Ajouter une Automobile</h1>
            <a href="{{ route('automobiles.index') }}" class="btn btn-secondary">
                Retour à la liste
            </a>
        </div>

        <form method="POST" action="{{ route('automobiles.store') }}">
            @csrf

            <div class="form-grid">
                <div class="form-group">
                    <label for="NomConducteur" class="form-label">Nom du Conducteur</label>
                    <input type="text" name="NomConducteur" id="NomConducteur" value="{{ old('NomConducteur') }}" 
                        class="form-input @error('NomConducteur') error @enderror">
                    @error('NomConducteur')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="Marque" class="form-label">Marque</label>
                    <input type="text" name="Marque" id="Marque" value="{{ old('Marque') }}" 
                        class="form-input @error('Marque') error @enderror">
                    @error('Marque')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="modele" class="form-label">Modèle</label>
                    <input type="text" name="modele" id="modele" value="{{ old('modele') }}" 
                        class="form-input @error('modele') error @enderror">
                    @error('modele')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="matricule" class="form-label">Matricule</label>
                    <input type="text" name="matricule" id="matricule" value="{{ old('matricule') }}" 
                        class="form-input @error('matricule') error @enderror">
                    @error('matricule')
                        <p class="error-message">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('automobiles.index') }}" class="btn btn-secondary">
                    Annuler
                </a>
                <button type="submit" class="btn btn-primary">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 