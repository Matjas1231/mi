@extends('layouts.layout')
@section('title')Szczegóły komputera @endsection

@section('page-heading')Szczegóły komputera {{ $computer->computer_name }} @endsection

@section('content')
    <div>
        <p>Marka: <b>{{ $computer->brand }}</b></p>
        <p>Model: <b>{{ $computer->model }}</b></p>
        <p>Typ: <b>{{ $computer->computerType->type ?? 'Brak' }}</b></p>
        <p>Procesor: <b>{{ $computer->processor }}</b></p>
        <p>Płyta główna: <b>{{ $computer->motherboard }}</b></p>
        <p>RAM: <b>{{ $computer->ram }}</b></p>
        <p>Opis: <b>{{ $computer->description }}</b></p>
        <p>Adres IP: <b>{{ $computer->ip_address }}</b></p>
        <p>Nazwa: <b>{{ $computer->computer_name }}</b></p>
        <p>Data zakupu: <b>{{ $computer->date_of_buy }}</b></p>
        <p>Pracownik:
            @if(!is_null($computer->worker_id))
                <b>{{ $computer->worker->name }} {{ $computer->worker->surname }}</b>
            @else
                <b>Brak pracownika</b>
            @endif
        </p>
        <a href="{{ route('computer.edit', ['computerId' => $computer->id]) }}" class="btn btn-primary">Edytuj</a>
    </div>

@endsection
