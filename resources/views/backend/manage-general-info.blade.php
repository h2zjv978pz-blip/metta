@extends('components.backend.layout')

@section('page-title', 'General Info')

@section('main-content')
    @include('backend.partials.lsf-toggle')

    <div class="card" id="achievement-counters">
        <div class="card-header">
            <div class="card-title">Contact Details</div>
        </div>
        <div class="card-body">
            <form action="{{ route('backend.tasks', ['task' => 'save-contact-info']) }}" method="POST">
                @csrf

                @foreach(['phoneNumber' => 'Phone Number (1)', 'phoneNumber2' => 'Phone Number (2)', 'email' => 'Email'] as $key => $label)
                    @include('backend.partials.form.input', ['name' => "contact_info[{$key}]", 'label' => $label, 'useOld' => $data['contactInfo']?->prop($key)])
                @endforeach

                @include('backend.partials.form.textarea', ['name' => 'contact_info[address]', 'label' => 'Office Address', 'row' => 3, 'class' => 'lsf en', 'useOld' => $data['contactInfo']?->getJson('props', 'address')])
                @include('backend.partials.form.textarea', ['name' => 'contact_info[address_bn]', 'label' => 'অফিসের ঠিকানা', 'row' => 3, 'class' => 'lsf bn', 'useOld' => $data['contactInfo']?->getJson('props', 'address_bn')])

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

                @include('backend.partials.form.input', ['name' => 'donation_info[bankName]', 'label' => 'Bank Name', 'class' => 'lsf en', 'useOld' => $data['bankInfo']?->getJson('props', 'bankName')])
                @include('backend.partials.form.input', ['name' => 'donation_info[bankName_bn]', 'label' => 'ব্যাংকের নাম', 'class' => 'lsf bn', 'useOld' => $data['bankInfo']?->getJson('props', 'bankName_bn')])

                @include('backend.partials.form.input', ['name' => 'donation_info[bankAccountName]', 'label' => 'Account Name', 'class' => 'lsf en', 'useOld' => $data['bankInfo']?->getJson('props', 'bankAccountName')])
                @include('backend.partials.form.input', ['name' => 'donation_info[bankAccountName_bn]', 'label' => 'অ্যাকাউন্টের নাম', 'class' => 'lsf bn', 'useOld' => $data['bankInfo']?->getJson('props', 'bankAccountName_bn')])

                @include('backend.partials.form.input', ['name' => 'donation_info[bankAccountNo]', 'label' => 'Account No.', 'useOld' => $data['bankInfo']?->prop('bankAccountNo')])

                @include('backend.partials.form.input', ['name' => 'donation_info[bankBranch]', 'label' => 'Bank Branch Name', 'class' => 'lsf en', 'useOld' => $data['bankInfo']?->getJson('props', 'bankBranch')])
                @include('backend.partials.form.input', ['name' => 'donation_info[bankBranch_bn]', 'label' => 'ব্যাংক শাখার নাম', 'class' => 'lsf bn', 'useOld' => $data['bankInfo']?->getJson('props', 'bankBranch_bn')])

                @include('backend.partials.form.input', ['name' => 'donation_info[bankSwiftCode]', 'label' => 'SWIFT CODE', 'useOld' => $data['bankInfo']?->prop('bankSwiftCode')])

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
