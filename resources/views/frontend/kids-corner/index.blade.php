@extends('frontend.layouts.base')

@section('page-title', 'Kids Corner')

@section('main-content')
    <section class="pd-top pd-bottom">
        <div class="container">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}">
                <span>KIDS</span>
                <h2>KIDS CORNER</h2>
            </div>


            <div class="row">
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('teachings.show', 1) }}" class="kids-blog">
                        <div class="kids-blog-box">
                            <div class="zoom"><img src="{{ asset('_common/img/kids/kids-img-04.jpg') }}"></div>
                            <div class="kids-blog-info">
                                <div class="row">
                                    <div class="col-4 text-center">10-10-23</div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>
                                </div>
                            </div>
                            <div class="kids-blog-text">
                                <h3 href="#" class="kids-blog-head">Samatha Meditation and ‘Mindfulness’</h3>
                                <div class="kids-blog-sub-head">The Editors</div>
                                <p>
                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('teachings.show', 1) }}" class="kids-blog">
                        <div class="kids-blog-box">
                            <div class="zoom"><img src="{{ asset('_common/img/kids/kids-img-02.jpg') }}"></div>
                            <div class="kids-blog-info">
                                <div class="row">
                                    <div class="col-4 text-center">10-10-23</div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>
                                </div>
                            </div>
                            <div class="kids-blog-text">
                                <h3 href="#" class="kids-blog-head">Purification of Mind</h3>
                                <div class="kids-blog-sub-head">Bhikkhu Bodhi</div>
                                <p>
                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('teachings.show', 1) }}" class="kids-blog">
                        <div class="kids-blog-box">
                            <div class="zoom"><img src="{{ asset('_common/img/kids/kids-img-03.jpg') }}"></div>
                            <div class="kids-blog-info">
                                <div class="row">
                                    <div class="col-4 text-center">10-10-23</div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>
                                </div>
                            </div>
                            <div class="kids-blog-text">
                                <h3 href="#" class="kids-blog-head">Samatha Meditation and ‘Mindfulness’</h3>
                                <div class="kids-blog-sub-head">The Editors</div>
                                <p>
                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('teachings.show', 1) }}" class="kids-blog">
                        <div class="kids-blog-box">
                            <div class="zoom"><img src="{{ asset('_common/img/kids/kids-img-01.jpg') }}"></div>
                            <div class="kids-blog-info">
                                <div class="row">
                                    <div class="col-4 text-center">10-10-23</div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>
                                </div>
                            </div>
                            <div class="kids-blog-text">
                                <h3 href="#" class="kids-blog-head">Samatha Meditation and ‘Mindfulness’</h3>
                                <div class="kids-blog-sub-head">The Editors</div>
                                <p>
                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('teachings.show', 1) }}" class="kids-blog">
                        <div class="kids-blog-box">
                            <div class="zoom"><img src="{{ asset('_common/img/kids/kids-img-04.jpg') }}"></div>
                            <div class="kids-blog-info">
                                <div class="row">
                                    <div class="col-4 text-center">10-10-23</div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>
                                </div>
                            </div>
                            <div class="kids-blog-text">
                                <h3 href="#" class="kids-blog-head">Samatha Meditation and ‘Mindfulness’</h3>
                                <div class="kids-blog-sub-head">The Editors</div>
                                <p>
                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 mb-4">
                    <a href="{{ route('teachings.show', 1) }}" class="kids-blog">
                        <div class="kids-blog-box">
                            <div class="zoom"><img src="{{ asset('_common/img/kids/kids-img-05.jpg') }}"></div>
                            <div class="kids-blog-info">
                                <div class="row">
                                    <div class="col-4 text-center">10-10-23</div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>
                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>
                                </div>
                            </div>
                            <div class="kids-blog-text">
                                <h3 href="#" class="kids-blog-head">Samatha Meditation and ‘Mindfulness’</h3>
                                <div class="kids-blog-sub-head">The Editors</div>
                                <p>
                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>




{{--            <div class="row">--}}
{{--                <div class="col-lg-4 mb-4">--}}
{{--                    <div class="kids-wrap">--}}
{{--                        <a href="" data-bs-toggle="modal" data-bs-target="#VideoModal01">--}}
{{--                            <div class="kids-img-box">--}}
{{--                                <div class="play-btn"><i class="fa-solid fa-play"></i></div>--}}
{{--                                <div class=""><img src="{{ asset('_common/img/kids/kids-01.jpg') }}"></div>--}}
{{--                            </div>--}}
{{--                            <div class="kids-title">Places of Worship Buddhist Temples KS2 PowerPoint</div>--}}
{{--                        </a>--}}
{{--                        <div class="rating">--}}
{{--                            <input type="radio" id="star1" name="rating" value="1" />--}}
{{--                            <label for="star1">--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                            </label>--}}

{{--                            <input type="radio" id="star2" name="rating" value="2" />--}}
{{--                            <label for="star2">--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                            </label>--}}

{{--                            <input type="radio" id="star3" name="rating" value="3" />--}}
{{--                            <label for="star3">--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                            </label>--}}

{{--                            <input type="radio" id="star4" name="rating" value="4" />--}}
{{--                            <label for="star4">--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                            </label>--}}

{{--                            <input type="radio" id="star5" name="rating" value="5" />--}}
{{--                            <label for="star5">--}}
{{--                                <i class="fa-solid fa-star"></i>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>

    <!-- Modal -->
{{--    <div class="video-modal modal fade" id="VideoModal01" tabindex="-1" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-dialog-centered modal-xl">--}}
{{--            <div class="modal-content">--}}
{{--                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>--}}
{{--                <div class="modal-body">--}}
{{--                    <div class="video">--}}
{{--                        <video controls="" width="100%" height="100%">--}}
{{--                            <source src="{{ asset('_common/img/kids/pexels-honye-sanges-6380886 (720p).mp4') }}" type="video/mp4">--}}
{{--                            <source src="movie.ogg" type="video/ogg">--}}
{{--                            Your browser does not support the video tag.--}}
{{--                        </video>--}}
{{--                        <h5 class="pt-3">The Buddhist View of Suffering Lesson Pack</h5>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
