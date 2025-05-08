@extends('layouts.app')

@section('content')
<style>
    .history-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        margin-bottom: 1.5rem;
        overflow: hidden;
    }

    .history-header {
        background: #f8fafc;
        padding: 1rem;
        border-bottom: 1px solid #e2e8f0;
    }

    .history-content {
        padding: 1rem;
    }

    .history-table {
        width: 100%;
        border-collapse: collapse;
    }

    .history-table th {
        background: #f1f5f9;
        padding: 0.75rem;
        text-align: left;
        font-weight: 600;
        color: #475569;
        border-bottom: 2px solid #e2e8f0;
    }

    .history-table td {
        padding: 0.75rem;
        border-bottom: 1px solid #e2e8f0;
        color: #334155;
    }

    .history-table tr:last-child td {
        border-bottom: none;
    }

    .status-badge {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .status-validated {
        background-color: #dcfce7;
        color: #166534;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s;
    }

    .btn-secondary {
        background-color: #64748b;
        color: white;
    }

    .btn-secondary:hover {
        background-color: #475569;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Historique des Véhicules Utilisés</h2>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Retour</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @foreach($automobiles as $auto)
                    <div class="history-card">
                        <div class="history-header">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-800">
                                    Véhicule: {{ $auto->matricule }}
                                </h3>
                                <span class="text-sm text-gray-600">
                                    Kilométrage actuel: {{ $auto->Kilometrage }} km
                                </span>
                            </div>
                        </div>
                        <div class="history-content">
                            <table class="history-table">
                                <thead>
                                    <tr>
                                        <th>Date de Demande</th>
                                        <th>Distance Parcourue</th>
                                        <th>Demandé par</th>
                                        <th>Statut</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($auto->demandes as $demande)
                                        <tr>
                                            <td>{{ $demande->date_demande->format('d/m/Y') }}</td>
                                            <td>{{ $demande->distance_total }} km</td>
                                            <td>{{ $demande->user->name }}</td>
                                            <td>
                                                <span class="status-badge status-validated">
                                                    {{ $demande->status }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $automobiles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 