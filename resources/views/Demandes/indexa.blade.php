@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Historique des demandes de véhicules</h2>
                <br>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matricule</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Distance</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($demandes as $demande)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $demande->date_demande->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $demande->matricule }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $demande->distance_total }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $demande->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a href="{{ route('demandes.show', $demande->id) }}" class="text-indigo-600 hover:text-indigo-900">Voir</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>  






@endsection
