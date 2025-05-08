<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tableau de Bord') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Section -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center space-x-4">
                        <div class="text-2xl">
                            👋
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Bonjour, {{ Auth::user()->name }}</h3>
                            <p class="text-gray-600">Bienvenue sur votre tableau de bord</p>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->role === 'admin')
                <!-- Admin Dashboard Content -->
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <!-- Available Vehicles -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 text-green-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-700">Véhicules Disponibles</h4>
                                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Automobile::where('Status', 'disponible')->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicles in Use -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-700">En Utilisation</h4>
                                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Automobile::where('Status', 'en_utilisation')->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicles Needing Maintenance -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-red-100 text-red-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-700">En Panne</h4>
                                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Automobile::where('Status', 'en_panne')->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicles Needing Oil Change -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-700">Nécessite Vidange</h4>
                                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Automobile::where('Status', 'Vidange')->count() }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">Demandes en Attente</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <!-- Pending Vehicle Requests -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <div class="p-2 rounded-full bg-blue-100 text-blue-600 mr-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0"></path>
                                        </svg>
                                    </div>
                                    <h4 class="font-medium text-gray-900">Demandes de Véhicules</h4>
                                </div>
                                @php
                                    $pendingVehicles = \App\Models\Demande::where('status', 'en attente')->latest()->take(3)->get();
                                @endphp
                                @if($pendingVehicles->isEmpty())
                                    <p class="text-sm text-gray-500">Aucune demande en attente</p>
                                @else
                                    <div class="space-y-2">
                                        @foreach($pendingVehicles as $demande)
                                            <div class="flex justify-between items-center text-sm">
                                                <span class="text-gray-600">{{ $demande->user ? $demande->user->name : 'Utilisateur inconnu' }}</span>
                                                <span class="text-gray-900">{{ $demande->matricule }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <a href="{{ route('admin.auto') }}" class="mt-3 text-sm text-blue-600 hover:text-blue-800 block">Voir toutes les demandes →</a>
                            </div>

                            <!-- Pending Material Requests -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <div class="p-2 rounded-full bg-green-100 text-green-600 mr-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                    </div>
                                    <h4 class="font-medium text-gray-900">Demandes de Matériel</h4>
                                </div>
                                @php
                                    $pendingMaterials = \App\Models\DemandeInventaire::where('status', 'en attente')->latest()->take(3)->get();
                                @endphp
                                @if($pendingMaterials->isEmpty())
                                    <p class="text-sm text-gray-500">Aucune demande en attente</p>
                                @else
                                    <div class="space-y-2">
                                        @foreach($pendingMaterials as $demande)
                                            <div class="flex justify-between items-center text-sm">
                                                <span class="text-gray-600">{{ $demande->createdBy ? $demande->createdBy->name : 'Utilisateur inconnu' }}</span>
                                                <span class="text-gray-900">{{ $demande->libelle }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <a href="{{ route('admin.materiel') }}" class="mt-3 text-sm text-green-600 hover:text-green-800 block">Voir toutes les demandes →</a>
                            </div>

                            <!-- Pending Leave Requests -->
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="flex items-center mb-3">
                                    <div class="p-2 rounded-full bg-purple-100 text-purple-600 mr-3">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <h4 class="font-medium text-gray-900">Demandes de Congés</h4>
                                </div>
                                @php
                                    $pendingLeaves = \App\Models\Conge::where('status', 'en attente')->latest()->take(3)->get();
                                    $user = \App\Models\User::all();
                                @endphp
                                @if($pendingLeaves->isEmpty())
                                    <p class="text-sm text-gray-500">Aucune demande en attente</p>
                                @else
                                    <div class="space-y-2">
                                        @foreach($pendingLeaves as $conge)
                                            <div class="flex justify-between items-center text-sm">
                                                <span class="text-gray-600">{{ $user->where('id', $conge->created_by)->first() ? $user->where('id', $conge->created_by)->first()->name : 'Utilisateur inconnu' }}</span>
                                                <span class="text-gray-900">{{ $conge->date_debut ? $conge->date_debut->format('d/m') : '-' }} </span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <a href="{{ route('admin.conge') }}" class="mt-3 text-sm text-purple-600 hover:text-purple-800 block">Voir toutes les demandes →</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- User Dashboard Content -->
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <!-- Pending Requests -->
                    <div style="margin-top: 10px;"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-700">Demandes en Attente</h4>
                                    <p class="text-2xl font-bold text-gray-900">
                                        {{ \App\Models\Demande::where('created_by', Auth::id())->where('status', 'en attente')->count() + 
                                           \App\Models\DemandeInventaire::where('created_by', Auth::id())->where('status', 'en attente')->count() + 
                                           \App\Models\Conge::where('created_by', Auth::id())->where('status', 'en attente')->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Accepted Requests -->
                    <div style="margin-top: 10px;"  class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-green-100 text-green-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-700">Demandes Acceptées</h4>
                                    <p class="text-2xl font-bold text-gray-900">
                                        {{ \App\Models\Demande::where('created_by', Auth::id())->where('status', 'accepté')->count() + 
                                           \App\Models\DemandeInventaire::where('created_by', Auth::id())->where('status', 'accepté')->count() + 
                                           \App\Models\Conge::where('created_by', Auth::id())->where('status', 'accepté')->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rejected Requests -->
                    <div style="margin-top: 10px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="p-3 rounded-full bg-red-100 text-red-600">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-semibold text-gray-700">Demandes Refusées</h4>
                                    <p class="text-2xl font-bold text-gray-900">
                                        {{ \App\Models\Demande::where('created_by', Auth::id())->where('status', 'refusé')->count() + 
                                           \App\Models\DemandeInventaire::where('created_by', Auth::id())->where('status', 'refusé')->count() + 
                                           \App\Models\Conge::where('created_by', Auth::id())->where('status', 'refusé')->count() }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Requests -->
                
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
