@extends('components.backend.layout')

@section('page-title', 'Contact Messages')

@section('main-content')
    <div class="card" id="clients">
        <div class="card-header">
            <div class="card-title">Message Inbox</div>
        </div>
        <div class="card-body">
            <div class="table-responsive mb-3">
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Sender Name</th>
                        <th>Sender Email</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contact_messages as $contact_message)
                        <tr>
                            <td>{{ $contact_message->created_at->format('M d, Y') }}</td>
                            <td>{{ $contact_message->prop('name') }}</td>
                            <td>{{ $contact_message->prop('email') }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($contact_message->prop('message'), 100) }}</td>
                            <td>
                                <a href="{{ route('backend.contact-messages.show', $contact_message->id) }}" class="btn btn-sm btn-outline-primary"><i class="fa fa-eye"></i> Show</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {!! $contact_messages->appends($_GET)->links() !!}
        </div>
    </div>
@endsection
