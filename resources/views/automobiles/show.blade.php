@extends('layouts.app')

@section('content')
<style>
    .button-container {
        display: flex;
        gap: 1rem;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        padding: 0.625rem 1.25rem;
        font-size: 0.875rem;
        font-weight: 500;
        color: white;
        border-radius: 0.5rem;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }

    .btn:hover {
        transform: scale(1.05);
    }

    .btn:focus {
        outline: none;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.3);
    }

    .btn-edit {
        background: linear-gradient(to right, #eab308, #ca8a04);
    }

    .btn-edit:hover {
        background: linear-gradient(to right, #ca8a04, #a16207);
    }

    .btn-back {
        background: linear-gradient(to right, #3b82f6, #2563eb);
    }

    .btn-back:hover {
        background: linear-gradient(to right, #2563eb, #1d4ed8);
    }

    .btn-icon {
        width: 1rem;
        height: 1rem;
        margin-right: 0.5rem;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Détails de l'Automobile</h2>
                    <div class="button-container">
                        <a href="{{ route('automobiles.edit', $automobile) }}" class="btn btn-edit">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Modifier
                        </a>
                        <a href="{{ route('automobiles.index') }}" class="btn btn-back">
                            <svg class="btn-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Retour à la liste
                        </a>
                    </div>
                </div>

                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Informations de l'automobile</h3>
                    </div>
                    <div class="border-t border-gray-200">
                        <div>
                            
                            <div style="margin-top: 10px;" class="bg-gray-50 px-4 py-5 flex items-center mb-2">
                                <div style="margin-right: 10px;font-weight: bold;" class="text-sm font-medium text-gray-500 w-1/3">ID</div>
                                <div class="text-sm text-gray-900 ml-8">{{ $automobile->id }}</div>
                            </div>
                            <div style="margin-top: 10px;" class="bg-white px-4 py-5 flex items-center mb-2">
                                <div style="margin-right: 10px;font-weight: bold;" class="text-sm font-medium text-gray-500 w-1/3">Etat</div>
                                <div class="text-sm text-gray-900 ml-8">{{ $automobile->Etat }}</div>
                            </div>
                            <div style="margin-top: 10px;" class="bg-gray-50 px-4 py-5 flex items-center mb-2">
                                <div style="margin-right: 10px;font-weight: bold;" class="text-sm font-medium text-gray-500 w-1/3">Kilometrage</div>
                                <div class="text-sm text-gray-900 ml-8">{{ $automobile->Kilometrage }}</div>
                            </div>
                            <div style="margin-top: 10px;" class="bg-white px-4 py-5 flex items-center mb-2">
                                <div style="margin-right: 10px;font-weight: bold;" class="text-sm font-medium text-gray-500 w-1/3">Vidange</div>
                                <div class="text-sm text-gray-900 ml-8">{{ $automobile->Vidange}}</div>
                            </div>
                            <div style="margin-top: 10px;" class="bg-gray-50 px-4 py-5 flex items-center">
                                <div style="margin-right: 10px;font-weight: bold;" class="text-sm font-medium text-gray-500 w-1/3">Matricule</div>
                                <div class="text-sm text-gray-900 ml-8">{{ $automobile->matricule }}</div>
                            </div>
                            <div style="margin-top: 10px;" class="bg-white px-4 py-5 flex items-center mb-2">
                                <div style="margin-right: 10px;font-weight: bold;" class="text-sm font-medium text-gray-500 w-1/3">Carburant</div>
                                <div class="text-sm text-gray-900 ml-8">{{ $automobile->Carburant}}</div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 