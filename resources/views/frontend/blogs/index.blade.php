@extends('frontend.layouts.base')

@section('page-title', \App\Helpers\Utils::lingual(['Research & Publications', 'গবেষণা ও প্রকাশনা']))
@section('meta-description', \App\Helpers\Utils::lingual(['Research, articles, and publications on Buddhism and meditation.', 'বৌদ্ধধর্ম ও ধ্যানের উপর গবেষণা, প্রবন্ধ এবং প্রকাশনা।']))

@section('main-content')
    <section>
        <div class="blog-breadcrumb-img sm" style="background-image: url('{{ asset('_common/img/blogs/blogs-breadcrumb02.jpg') }}')">
            <div class="blog-breadcrumb-text-wrap">
                <span>Explore</span>
                <h2>Buddhism & Meditation</h2>
            </div>
        </div>
        <div class="container pd-top pd-bottom">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ \App\Helpers\Utils::lingual(['Home', 'হোম']) }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ \App\Helpers\Utils::lingual(['Research & Publication', 'গবেষণা ও প্রকাশনা']) }}</li>
                </ol>
            </nav>
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}" alt="">
                <span>{{ \App\Helpers\Utils::lingual(['Research & Publication', 'গবেষণা ও প্রকাশনা']) }}</span>
                <h2>{{ \App\Helpers\Utils::lingual(['OUR RESEARCH & PUBLICATIONS', 'আমাদের গবেষণা ও প্রকাশনা']) }}</h2>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-xl-3 col-lg-4 mb-4">
                        <a href="{{ route('blogs.show', \Illuminate\Support\Str::slug($blog->props['title'] ?? '') ?: $blog->id) }}" class="blog">
                            <div class="blog-box">
                                <div class="zoom"><img src="{{ $blog->getFeatureImageUrl() }}" loading="lazy" alt="{{ $blog->prop('title') }}"></div>
                                <div class="blog-info">
                                    <div class="row">
                                        <div class="col-4 text-center">{{ $blog->created_at->format('d M y') }}</div>
                                        <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>
                                        <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">{{ \App\Helpers\Utils::getReadingTime($blog->prop('body')) }}</span> mins</div>
                                    </div>
                                </div>
                                <div class="blog-text">
                                    <h3 href="{{ route('blogs.show', \Illuminate\Support\Str::slug($blog->props['title'] ?? '') ?: $blog->id) }}" class="blog-head">{{ $blog->prop('title') }}</h3>
                                    <div class="blog-sub-head">{{ $blog->prop('author') }}</div>
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(\App\Helpers\Utils::getPlainText($blog->prop('body')), 200) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

{{--                <div class="col-xl-3 col-lg-4 mb-4">--}}
{{--                    <a href="{{ route('blogs.show') }}" class="blog">--}}
{{--                        <div class="blog-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/blogs/blog_11.jpg') }}"></div>--}}
{{--                            <div class="blog-info">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-4 text-center">10-10-23</div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <h3 href="{{ route('blogs.show') }}" class="blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
{{--                                <div class="blog-sub-head">The Editors</div>--}}
{{--                                <p>--}}
{{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 mb-4">--}}
{{--                    <a href="{{ route('blogs.show') }}" class="blog">--}}
{{--                        <div class="blog-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/blogs/blog_01.jpg') }}"></div>--}}
{{--                            <div class="blog-info">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-4 text-center">10-10-23</div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <h3 href="{{ route('blogs.show') }}" class="blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
{{--                                <div class="blog-sub-head">The Editors</div>--}}
{{--                                <p>--}}
{{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 mb-4">--}}
{{--                    <a href="{{ route('blogs.show') }}" class="blog">--}}
{{--                        <div class="blog-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/blogs/blog_02.jpg') }}"></div>--}}
{{--                            <div class="blog-info">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-4 text-center">10-10-23</div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <h3 href="{{ route('blogs.show') }}" class="blog-head">Purification of Mind</h3>--}}
{{--                                <div class="blog-sub-head">Bhikkhu Bodhi</div>--}}
{{--                                <p>--}}
{{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 mb-4">--}}
{{--                    <a href="{{ route('blogs.show') }}" class="blog">--}}
{{--                        <div class="blog-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/blogs/blog_03.jpg') }}"></div>--}}
{{--                            <div class="blog-info">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-4 text-center">10-10-23</div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <h3 href="{{ route('blogs.show') }}" class="blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
{{--                                <div class="blog-sub-head">The Editors</div>--}}
{{--                                <p>--}}
{{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 mb-4">--}}
{{--                    <a href="{{ route('blogs.show') }}" class="blog">--}}
{{--                        <div class="blog-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/blogs/blogs_12.jpg') }}"></div>--}}
{{--                            <div class="blog-info">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-4 text-center">10-10-23</div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <h3 href="{{ route('blogs.show') }}" class="blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
{{--                                <div class="blog-sub-head">The Editors</div>--}}
{{--                                <p>--}}
{{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 mb-4">--}}
{{--                    <a href="{{ route('blogs.show') }}" class="blog">--}}
{{--                        <div class="blog-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/blogs/blog_02.jpg') }}"></div>--}}
{{--                            <div class="blog-info">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-4 text-center">10-10-23</div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <h3 href="{{ route('blogs.show') }}" class="blog-head">Purification of Mind</h3>--}}
{{--                                <div class="blog-sub-head">Bhikkhu Bodhi</div>--}}
{{--                                <p>--}}
{{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 mb-4">--}}
{{--                    <a href="{{ route('blogs.show') }}" class="blog">--}}
{{--                        <div class="blog-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/blogs/blogs_13.jpg') }}"></div>--}}
{{--                            <div class="blog-info">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-4 text-center">10-10-23</div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <h3 href="{{ route('blogs.show') }}" class="blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
{{--                                <div class="blog-sub-head">The Editors</div>--}}
{{--                                <p>--}}
{{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <div class="col-xl-3 col-lg-4 mb-4">--}}
{{--                    <a href="{{ route('blogs.show') }}" class="blog">--}}
{{--                        <div class="blog-box">--}}
{{--                            <div class="zoom"><img src="{{ asset('_common/img/blogs/blog_11.jpg') }}"></div>--}}
{{--                            <div class="blog-info">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="col-4 text-center">10-10-23</div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
{{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="blog-text">--}}
{{--                                <h3 href="{{ route('blogs.show') }}" class="blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
{{--                                <div class="blog-sub-head">The Editors</div>--}}
{{--                                <p>--}}
{{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
{{--                                </p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}

            </div>
        </div>
    </section>
@endsection
