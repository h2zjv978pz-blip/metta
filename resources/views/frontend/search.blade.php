@extends('frontend.layouts.base')

@section('page-title', 'Search Results')

@section('styles')
    <style>
        /* grid stays as you have it */

        /* card */
        .result-card{
            border:1px solid #eaeef3; border-radius:14px; background:#fff; height:100%;
            transition:box-shadow .15s ease, transform .15s ease;
            margin: 1rem auto;
        }
        .result-card a{display:flex; flex-direction:column; height:100%; padding:1rem; color:inherit; text-decoration:none}
        @media (hover:hover){ .result-card:hover{box-shadow:0 6px 18px rgba(2,8,23,.08); transform:translateY(-2px)} }

        /* title row */
        .title-row{display:flex; align-items:baseline; gap:.6rem; margin-bottom:.25rem}
        .title-row .name{
            flex:1; min-width:0; margin:0;
            font-size:1.06rem; line-height:1.35; color:#0f172a;
            overflow:hidden; text-overflow:ellipsis;
        }
        .title-row .entity{
            white-space:nowrap; font-size:.72rem; font-weight:600; letter-spacing:.02em; color:#64748b;
            opacity:.85;
        }

        /* body + footer */
        .excerpt{margin:0; color:#475569; display:-webkit-box; -webkit-line-clamp:4; -webkit-box-orient:vertical; overflow:hidden}
        .result-meta{margin-top:auto; padding-top:.6rem; font-size:.88rem; color:#64748b}
    </style>
@endsection

@section('main-content')
    <section id="breadcrumb">
        <div class="breadcrumb-img" style="background-image: url('{{ asset('_common/img/v-thumb-05.jpg') }}')">
            <div class="breadcrumb-text-wrap">
                <span>Search</span>
                <h2>Search Results</h2>
            </div>
        </div>
    </section>

    {{-- Results --}}
    <section class="pd-top pd-bottom">
        <div class="container">
            @if($results->isEmpty())
                <div class="empty">
                    <h3>No results found</h3>
                    <p>Try different keywords.</p>
                </div>
            @else
                <div class="result-grid" role="list">
                    @foreach($results as $result)
                        <article class="result-card">
                            <a href="{{ $result['url'] ?? '#' }}">
                                <div class="title-row">
                                    <h3 class="name">{{ $result['name'] ?? 'Untitled' }}</h3>
                                    <span class="entity">{{ Str::title($result['entity'] ?? 'Other') }}</span>
                                </div>

                                <p class="excerpt">{{ strip_tags($result['short_desc'] ?? '') }}</p>

                                <div class="result-meta"><span class="cta">View →</span></div>
                            </a>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
@endsection
