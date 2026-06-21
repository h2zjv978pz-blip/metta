@extends('components.backend.layout')

@section('page-title', 'View Contact Message')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <tr>
                        <td>Date</td>
                        <td>{{ $contact_message->created_at->format('M d, Y h:i A') }}</td>
                    </tr>
                    <tr>
                        <td>Sender Name</td>
                        <td>{{ $contact_message->prop('name') }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $contact_message->prop('email') }}</td>
                    </tr>
                    <tr>
                        <td>Message</td>
                        <td>{{ $contact_message->prop('message') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
