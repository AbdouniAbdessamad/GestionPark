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

    .admin-links {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 2rem;
    }

    .admin-link {
        padding: 12px 24px;
        border: none;
        border-radius: 6px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        color: white;
        font-size: 14px;
    }

    .admin-link:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .admin-link:active {
        transform: translateY(0);
    }

    .link-vehicles {
        background-color: #2563eb;
    }

    .link-vehicles:hover {
        background-color: #1d4ed8;
    }

    .link-materials {
        background-color: #16a34a;
    }

    .link-materials:hover {
        background-color: #15803d;
    }

    .link-leave {
        background-color: #7c3aed;
    }

    .link-leave:hover {
        background-color: #6d28d9;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Tableau de Bord Administrateur</h2>
                </div>

                <div class="admin-links">
                    <a href="{{ route('admin.auto') }}" class="admin-link link-vehicles">
                        Demandes de véhicules
                    </a>
                    <a href="{{ route('admin.usingauto') }}" class="admin-link link-vehicles">
                        Véhicules en utilisation
                    </a>
                    <a href="{{ route('admin.auto-history') }}" class="admin-link link-vehicles">
                        Historique des véhicules
                    </a>
                    <a href="{{ route('admin.materiel') }}" class="admin-link link-materials">
                        Demandes de matériel
                    </a>
                    <a href="{{ route('admin.materiel.history') }}" class="admin-link link-materials">
                        Historique des demandes de matériel
                    </a>
                    <a href="{{ route('admin.conge') }}" class="admin-link link-leave">
                        Demandes de congé
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection 