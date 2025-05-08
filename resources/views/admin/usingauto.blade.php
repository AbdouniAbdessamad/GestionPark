@extends('layouts.app')

@section('content')
<style>
    .status-en-utilisation {
        color: #fff;
        background-color: #3b82f6;
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

    .return-button {
        background-color: #16a34a;
        color: white;
        border: none;
    }

    .return-button:hover {
        background-color: #15803d;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Véhicules en Utilisation</h2>
                    <div class="flex space-x-4">
                        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Retour</a>
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
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Matricule</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Etat</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kilometrage</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vidange</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Carburant</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($automobiles as $auto)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $auto->matricule }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $auto->Etat }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $auto->Kilometrage }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $auto->Vidange }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $auto->Carburant }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="status-en-utilisation">{{ $auto->Status }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="action-buttons">
                                            <form action="{{ route('admin.return-auto', $auto->id) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="action-button return-button">Rendu</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $automobiles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
