@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold">Détails de la Demande d'Inventaire</h2>
                    <div>
                        <a href="{{ route('demande-inventaires.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Retour
                        </a>
                        @if($demandeInventaire->status === 'en attente')
                            <a href="{{ route('demande-inventaires.edit', $demandeInventaire) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Modifier
                            </a>
                        @endif
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg">
                    <div class="grid grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Informations de la demande</h3>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Date de demande</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $demandeInventaire->date_demande->format('d/m/Y') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Libellé</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $demandeInventaire->libelle }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Quantité</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $demandeInventaire->quantite }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Statut</dt>
                                    <dd class="mt-1">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($demandeInventaire->status === 'en attente') bg-yellow-100 text-yellow-800
                                            @elseif($demandeInventaire->status === 'approuvé') bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            {{ $demandeInventaire->status }}
                                        </span>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold mb-2">Informations supplémentaires</h3>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Créé le</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $demandeInventaire->created_at->format('d/m/Y H:i') }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Dernière modification</dt>
                                    <dd class="mt-1 text-sm text-gray-900">{{ $demandeInventaire->updated_at->format('d/m/Y H:i') }}</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 