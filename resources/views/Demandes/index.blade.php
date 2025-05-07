@extends('layouts.app')

@section('content')
<style>

    .btn {
        display: inline-flex;
        align-items: center;
        height: 2.1rem;
        padding: 0 1.5rem;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        transition: background-color 0.2s;
        cursor: pointer;
        text-decoration: none;
    }
.btn-primary {
        background-color: #667eea;
        color: white;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
                <div style="margin-top: 150px; display: flex; justify-content: center; align-items: center; gap: 10px;">
                    <a style="margin-right: 10px;" href="{{ route('demandes.create') }}" class="btn btn-primary">Demande de Véhicule</a>
                    <a style="margin-left: 10px;" href="{{ route('demande-inventaires.create') }}" class="btn btn-primary">Demande d'un matériel ou d'un article</a>
                    <a style="margin-left: 10px;" href="{{ route('conges.create') }}" class="btn btn-primary">Demande de Congé</a>
                </div>
                <div style="margin-top: 100px; display: flex; justify-content: center; align-items: center; gap: 10px;">
                <a style="margin-left: 10px;" href="{{ route('conges.index') }}" class="btn btn-secondary">Historique des congés</a>
                <a style="margin-left: 10px;" href="{{ route('demandes.indexa') }}" class="btn btn-secondary">Historique des demandes de véhicules</a>
                <a style="margin-left: 10px;" href="{{ route('demande-inventaires.index') }}" class="btn btn-secondary">Historique des demandes d'un matériel</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection 