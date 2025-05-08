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
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Toutes les Demandes de Véhicules</h2>
                    <a href="{{ route('admin.index') }}" class="btn btn-secondary">Retour aux Demandes en Attente</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matricule</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Distance</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Demandeur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($demandesvoiture as $demande)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $demande->date_demande->format('d/m/Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $demande->matricule }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $demande->distance_total }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$users->where('id', $demande->created_by)->first()->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($demande->status === 'en attente')
                                            <span class="status-en-attente">{{ $demande->status }}</span>
                                        @elseif($demande->status === 'validé')
                                            <span class="status-valide">{{ $demande->status }}</span>
                                        @else
                                            <span class="status-refuse">{{ $demande->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 