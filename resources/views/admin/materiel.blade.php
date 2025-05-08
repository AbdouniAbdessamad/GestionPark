@extends('layouts.app')

@section('content')
<style>
    .status-en-attente {
        color: #fff;
        background-color: #f97316;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 500;
    }
    .status-valide {
        color: #fff;
        background-color: #22c55e;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 500;
    }
    .status-refuse {
        color: #fff;
        background-color: #ef4444;
        padding: 4px 8px;
        border-radius: 4px;
        font-weight: 500;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
    }

    .action-button {
        padding: 6px 12px;
        border-radius: 4px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .action-button:hover {
        transform: translateY(-1px);
    }

    .view-button {
        background-color: #4f46e5;
        color: white;
    }

    .view-button:hover {
        background-color: #4338ca;
    }

    .validate-button {
        background-color: #16a34a;
        color: white;
        border: none;
    }

    .validate-button:hover {
        background-color: #15803d;
    }

    .reject-button {
        background-color: #dc2626;
        color: white;
        border: none;
    }

    .reject-button:hover {
        background-color: #b91c1c;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Demandes de Matériel en Attente</h2>
                    <div class="flex space-x-4">
                        <a style="margin-right: 10px;" href="{{ route('admin.index') }}" class="btn btn-secondary">Retour</a>
                        <a href="{{ route('admin.allmateriel') }}" class="btn btn-secondary">Voir Toutes les Demandes</a>
                    </div>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantité</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Demandeur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($demandesmateriel as $demande)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $demande->date_demande->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $demande->libelle }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $demande->quantite }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-en-attente">{{ $demande->status }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$users->where('id', $demande->created_by)->first()->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="action-buttons">
                                        
                                            <form action="{{ route('admin.validatemateriel', $demande->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="action-button validate-button">Valider</button>
                                            </form>
                                            <form action="{{ route('admin.rejectmateriel', $demande->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="action-button reject-button">Rejeter</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $demandesmateriel->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 