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
    
    .btn-back {
        background-color: #6b7280;
    }
    
    .btn-back:hover {
        background-color: #4b5563;
    }

    .btn-edit {
        background-color: #3b82f6;
    }
    
    .btn-edit:hover {
        background-color: #2563eb;
    }

    .detail-container {
        background-color: white;
        border-radius: 0.5rem;
        padding: 1.5rem;
        margin-top: 1rem;
    }

    .detail-row {
        display: flex;
        padding: 1rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .detail-row:last-child {
        border-bottom: none;
    }

    .detail-label {
        width: 200px;
        font-weight: 500;
        color: #374151;
    }

    .detail-value {
        flex: 1;
        color: #6b7280;
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
                    <h2 class="text-2xl font-semibold text-gray-800">Détails de l'Inventaire</h2>
                    <a href="{{ route('inventaires.index') }}" class="btn btn-back">
                        Retour à la liste
                    </a>
                </div>

                <div class="detail-container">
                    <div class="detail-row">
                        <div class="detail-label">Libellé</div>
                        <div class="detail-value">{{ $inventaire->libelle }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Quantité</div>
                        <div class="detail-value">{{ $inventaire->quantite }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Fournisseur</div>
                        <div class="detail-value">{{ $inventaire->fournisseur->nom }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Date de création</div>
                        <div class="detail-value">{{ $inventaire->created_at->format('d/m/Y H:i') }}</div>
                    </div>

                    <div class="detail-row">
                        <div class="detail-label">Dernière modification</div>
                        <div class="detail-value">{{ $inventaire->updated_at->format('d/m/Y H:i') }}</div>
                    </div>
                </div>

                <div class="button-container">
                    <a href="{{ route('inventaires.edit', $inventaire) }}" class="btn btn-edit">
                        Modifier
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 