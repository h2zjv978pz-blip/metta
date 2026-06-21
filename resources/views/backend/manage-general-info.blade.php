@extends('components.backend.layout')

@section('page-title', 'General Info')

@section('main-content')
    <div class="card" id="achievement-counters">
        <div class="card-header">
            <div class="card-title">Contact Details</div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'save-contact-info']) }}" method="POST">
                @csrf

                @foreach(['phoneNumber' => 'Phone Number (1)', 'phoneNumber2' => 'Phone Number (2)', 'email' => 'Email', 'address' => 'Office Address'] as $key => $label)
                    @include('backend.partials.form.' . (str_contains($key, 'Address') ? 'textarea' : 'input'), ['name' => "contact_info[{$key}]", 'label' => $label, 'row' => 3, 'useOld' => $data['contactInfo']?->prop($key)])
                @endforeach

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>

    <div class="card" id="achievement-counters">
        <div class="card-header">
            <div class="card-title">Social Links</div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'save-social-links']) }}" method="POST">
                @csrf

                @foreach(['sLinkFacebook' => 'Facebook Link', 'sLinkTwitter' => 'Twitter Link', 'sLinkInstagram' => 'Instagram Link', 'sLinkLinkedIn' => 'LinkedIn Link', 'sLinkWhatsapp' => 'Whatsapp Number'] as $key => $label)
                    @include('backend.partials.form.input', ['name' => "social_links[{$key}]", 'label' => $label, 'row' => 3, 'useOld' => $data['socialLinks']?->prop($key)])
                @endforeach

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>

    <div class="card" id="achievement-counters">
        <div class="card-header">
            <div class="card-title">Donation Info</div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'save-bank-info']) }}" method="POST">
                @csrf

                @foreach(['bankName' => 'Bank Name', 'bankAccountName' => 'Account Name', 'bankAccountNo' => 'Account No.', 'bankBranch' => 'Bank Branch Name', 'bankSwiftCode' => 'SWIFT CODE',] as $key => $label)
                    @include('backend.partials.form.input', ['name' => "donation_info[{$key}]", 'label' => $label, 'row' => 3, 'useOld' => $data['bankInfo']?->prop($key)])
                @endforeach

                @include('backend.partials.form.button', ['label' => 'Submit'])
            </form>
        </div>
    </div>

{{--    <div class="card" id="achievement-counters">--}}
{{--        <div class="card-header">--}}
{{--            <div class="card-title">Company Description</div>--}}
{{--        </div>--}}
{{--        <div class="card-body">--}}
{{--            <form action="#" method="POST">--}}
{{--                @csrf--}}

{{--                @foreach(['aboutUs' => 'About Company', 'vision' => 'Company Vision'] as $key => $label)--}}
{{--                    @include('backend.partials.form.textarea', ['name' => "companyDescription[{$key}]", 'label' => $label, 'row' => 6, 'useOld' => ''])--}}
{{--                @endforeach--}}

{{--                @include('backend.partials.form.button', ['label' => 'Submit'])--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
