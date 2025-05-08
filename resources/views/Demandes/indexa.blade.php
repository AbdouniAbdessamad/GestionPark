@extends('layouts.app')

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

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800">Historique des demandes de véhicules</h2>
                
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 relative" id="success-message">
                        {{ session('success') }}
                        <button type="button" class="dismiss-button" onclick="dismissMessage()">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                @endif

                <div class="flex justify-end mb-4">
                    <a class="btn btn-secondary" href="{{ route('demandes.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Retour
                    </a>
                </div>
                
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
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($demande->status === 'en attente')
                                        <span class="status-en-attente">{{ $demande->status }}</span>
                                    @elseif($demande->status === 'validé')
                                        <span class="status-valide">{{ $demande->status }}</span>
                                    @elseif($demande->status === 'refusé')
                                        <span class="status-refuse">{{ $demande->status }}</span>
                                    @else
                                        {{ $demande->status }}
                                    @endif
                                </td>
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

<script>
function dismissMessage() {
    document.getElementById('success-message').style.display = 'none';
}
</script>

@endsection
