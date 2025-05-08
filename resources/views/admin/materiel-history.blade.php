@extends('layouts.app')

@section('content')
<style>
    .status-cell {
        text-align: center;
        padding: 0.5rem;
        border-radius: 4px;
        color: white;
        font-weight: 500;
    }
    .status-en-attente {
        background-color: #f97316;
    }
    .status-valide {
        background-color: #22c55e;
    }
    .status-refuse {
        background-color: #ef4444;
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
                    <h2 class="text-2xl font-semibold text-gray-800">Historique des Demandes de Matériel</h2>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                        Retour
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif

                @if($demandesmateriel->isEmpty())
                    <div class="text-center py-4 text-gray-500">
                        Aucune demande de matériel trouvée.
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de demande</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Demandeur</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date de validation</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($demandesmateriel as $demande)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $demande->date_demande ? $demande->date_demande->format('d/m/Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $demande->createdBy ? $demande->createdBy->name : 'Utilisateur inconnu' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $demande->libelle }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $demande->quantite }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($demande->status === 'en attente')
                                                <span class="status-cell status-en-attente">En attente</span>
                                            @elseif($demande->status === 'validé')
                                                <span class="status-cell status-valide">Validé</span>
                                            @else
                                                <span class="status-cell status-refuse">Rejeté</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $demande->status === 'validé' ? $demande->updated_at->format('d/m/Y H:i') : '-' }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $demandesmateriel->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 