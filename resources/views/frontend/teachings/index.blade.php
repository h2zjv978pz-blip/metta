@extends('frontend.layouts.base')

@section('page-title', 'List of Teachings')

@section('main-content')
    <!-- BUDDHIST SITES Section -->
    <section id="teachings" class="pd-top pd-bottom">
        <div class="container">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}">
                <span>TEACHINGS</span>
                <h2>THE TEACHINGS OF LORD BUDDHA</h2>
            </div>

            <div class="row pd-top">
                @foreach($teachings as $teaching)
                    <div class="col-lg-4 mb-4">
                        <a href="{{ route('teachings.show', $teaching->id) }}" class="teach-blog">
                            <div class="teach-blog-box">
                                <div class="zoom"><img src="{{ $teaching->getFeatureImageUrl() }}"></div>
                                <div class="teach-blog-info">
                                    <div class="row">
                                        <div class="col-4 text-center">{{ $teaching->created_at->format('d M y') }}</div>
                                        <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>
                                        <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">{{ \App\Helpers\Utils::getReadingTime($teaching->prop('body')) }} mins</span></div>
                                    </div>
                                </div>
                                <div class="teach-blog-text">
                                    <h3 href="#" class="teach-blog-head">{{ $teaching->prop('title') }}</h3>
                                    <div class="teach-blog-sub-head">{{ $teaching->prop('author', 'Admin') }}</div>
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(\App\Helpers\Utils::getPlainText($teaching->prop('body')), 200) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

                {{--                <div class="col-lg-4 mb-4">--}}
                {{--                    <a href="{{ route('teachings.show', 1) }}" class="teach-blog">--}}
                {{--                        <div class="teach-blog-box">--}}
                {{--                            <div class="zoom"><img src="{{ asset('_common/img/teachings/teachings-01.jpg') }}"></div>--}}
                {{--                            <div class="teach-blog-info">--}}
                {{--                                <div class="row">--}}
                {{--                                    <div class="col-4 text-center">10-10-23</div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="teach-blog-text">--}}
                {{--                                <h3 href="#" class="teach-blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
                {{--                                <div class="teach-blog-sub-head">The Editors</div>--}}
                {{--                                <p>--}}
                {{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="col-lg-4 mb-4">--}}
                {{--                    <a href="{{ route('teachings.show', 1) }}" class="teach-blog">--}}
                {{--                        <div class="teach-blog-box">--}}
                {{--                            <div class="zoom"><img src="{{ asset('_common/img/teachings/teachings-03.jpg') }}"></div>--}}
                {{--                            <div class="teach-blog-info">--}}
                {{--                                <div class="row">--}}
                {{--                                    <div class="col-4 text-center">10-10-23</div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="teach-blog-text">--}}
                {{--                                <h3 href="#" class="teach-blog-head">Purification of Mind</h3>--}}
                {{--                                <div class="teach-blog-sub-head">Bhikkhu Bodhi</div>--}}
                {{--                                <p>--}}
                {{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="col-lg-4 mb-4">--}}
                {{--                    <a href="{{ route('teachings.show', 1) }}" class="teach-blog">--}}
                {{--                        <div class="teach-blog-box">--}}
                {{--                            <div class="zoom"><img src="{{ asset('_common/img/teachings/teachings-02.jpg') }}"></div>--}}
                {{--                            <div class="teach-blog-info">--}}
                {{--                                <div class="row">--}}
                {{--                                    <div class="col-4 text-center">10-10-23</div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="teach-blog-text">--}}
                {{--                                <h3 href="#" class="teach-blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
                {{--                                <div class="teach-blog-sub-head">The Editors</div>--}}
                {{--                                <p>--}}
                {{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="col-lg-4 mb-4">--}}
                {{--                    <a href="{{ route('teachings.show', 1) }}" class="teach-blog">--}}
                {{--                        <div class="teach-blog-box">--}}
                {{--                            <div class="zoom"><img src="{{ asset('_common/img/teachings/teachings-03.jpg') }}"></div>--}}
                {{--                            <div class="teach-blog-info">--}}
                {{--                                <div class="row">--}}
                {{--                                    <div class="col-4 text-center">10-10-23</div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="teach-blog-text">--}}
                {{--                                <h3 href="#" class="teach-blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
                {{--                                <div class="teach-blog-sub-head">The Editors</div>--}}
                {{--                                <p>--}}
                {{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="col-lg-4 mb-4">--}}
                {{--                    <a href="{{ route('teachings.show', 1) }}" class="teach-blog">--}}
                {{--                        <div class="teach-blog-box">--}}
                {{--                            <div class="zoom"><img src="{{ asset('_common/img/teachings/teachings-02.jpg') }}"></div>--}}
                {{--                            <div class="teach-blog-info">--}}
                {{--                                <div class="row">--}}
                {{--                                    <div class="col-4 text-center">10-10-23</div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="teach-blog-text">--}}
                {{--                                <h3 href="#" class="teach-blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
                {{--                                <div class="teach-blog-sub-head">The Editors</div>--}}
                {{--                                <p>--}}
                {{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
                {{--                <div class="col-lg-4 mb-4">--}}
                {{--                    <a href="{{ route('teachings.show', 1) }}" class="teach-blog">--}}
                {{--                        <div class="teach-blog-box">--}}
                {{--                            <div class="zoom"><img src="{{ asset('_common/img/teachings/teachings-01.jpg') }}"></div>--}}
                {{--                            <div class="teach-blog-info">--}}
                {{--                                <div class="row">--}}
                {{--                                    <div class="col-4 text-center">10-10-23</div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-file-lines"></i></div>--}}
                {{--                                    <div class="col-4 text-center"><i class="fa-regular fa-clock"></i><span class="min">5</span>mins</div>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                            <div class="teach-blog-text">--}}
                {{--                                <h3 href="#" class="teach-blog-head">Samatha Meditation and ‘Mindfulness’</h3>--}}
                {{--                                <div class="teach-blog-sub-head">The Editors</div>--}}
                {{--                                <p>--}}
                {{--                                    The word ‘mindfulness’ as an indication for a meditation system found its entry in the west when John Kabat-Zinn started his program of ‘Mindfulness-Based…--}}
                {{--                                </p>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </a>--}}
                {{--                </div>--}}
            </div>

            {{-- Quote Slide--}}
            <div id="carouselExampleDark" class="carousel carousel-dark slide quote-slide mt-5">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    @if(!empty($teachings_slides->count() > 0))
                        @foreach($teachings_slides as $teachings_slide)
                            <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="3000">
                                <img src="{{ asset('storage/img/' . $teachings_slide->prop('image')) }}" class="d-block w-100" alt="Slide Image">
                                <div class="carousel-caption">
                                    <q>{{ $teachings_slide->prop('caption') }}</q>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="carousel-item active" data-bs-interval="3000">
                            <img src="{{ asset('_common/img/buddhist_site/pexels-lu-zhao-16773960.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <q>The past is gone, the future is not yet here, and if we do not go back to ourselves in the present moment, we cannot be in touch with life.</q>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('_common/img/buddhist_site/pexels-pixabay-415708.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <q>The past is gone, the future is not yet here, and if we do not go back to ourselves in the present moment, we cannot be in touch with life.</q>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('_common/img/buddhist_site/pexels-sirinat-inopas-246935.jpg') }}" class="d-block w-100" alt="...">
                            <div class="carousel-caption">
                                <q>The past is gone, the future is not yet here, and if we do not go back to ourselves in the present moment, we cannot be in touch with life.</q>
                            </div>
                        </div>
                    @endif
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fa-solid fa-circle-chevron-left"></i></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"><i class="fa-solid fa-circle-chevron-right"></i></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            {{-- Quote Slide--}}


{{--            <div class="accordion accordion-flush" id="accordionFlushExample">--}}
{{--                <div class="accordion-item">--}}
{{--                    <h2 class="accordion-header" id="flush-headingOne">--}}
{{--                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">--}}
{{--                            The Four Noble Truths--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">--}}
{{--                        <div class="accordion-body">--}}
{{--                            <ol>--}}
{{--                                <li>The Noble Truth of Dukkha - stress, unsatisfactoriness, suffering;</li>--}}
{{--                                <li>The Noble Truth of the causal arising of Dukkha, which is grasping, clinging and wanting;</li>--}}
{{--                                <li>The Noble Truth of Nirvana, The ending of Dukkha. Awakening, Enlightenment. "Mind like fire unbound";</li>--}}
{{--                                <li>The Noble Truth of the Path leading to Nirvana or Awakening.</li>--}}
{{--                            </ol>--}}
{{--                            <p>--}}
{{--                                All Buddhist teachings flow from the Four Noble Truths. Particularly emphasised in the Theravada.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="accordion-item">--}}
{{--                    <h2 class="accordion-header" id="flush-headingTwo">--}}
{{--                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">--}}
{{--                            The Three Universal Truths--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">--}}
{{--                        <div class="accordion-body">--}}
{{--                            <ol>--}}
{{--                                <li>Change</li>--}}
{{--                                <li>Suffering</li>--}}
{{--                                <li>no 'I'</li>--}}
{{--                            </ol>--}}
{{--                            <p>--}}
{{--                                The first, Change, points out the basic fact that nothing in the world is fixed or permanent. We ourselves are not the same people, either physically, emotionally or mentally, that we were ten years - or even ten minutes ago! Living as we do, then, as shifting beings upon shifting sands, it is not possible for us to find lasting security.--}}

{{--                                As regards the second Sign, we have already seen how it was the experience of Suffering that sent the Buddha off on his great spiritual quest, though suffering is not a very good translation of the original word, dukkha. Dukkha implies the generally unsatisfactory and imperfect nature of life. However, it does not follow that Buddhists believe that life is all suffering. Buddhists do believe that there is happiness in life, but know that it does not last and that even in the most fortunate of lives there is suffering. Happiness is subject to the law of change and impermanence.--}}

{{--                                No-I, the third Sign, is a little more difficult.--}}
{{--                                Buddhists do not believe that there is anything everlasting or unchangeable in human beings, no soul or self in which a stable sense of 'I' might anchor itself. The whole idea of 'I' is in fact a basically false one that tries to set itself up in an unstable and temporary collection of elements. Take the traditional analogy of a cart. A cart may be broken down into its basic components -axle, wheels, shafts, sides, etc. Then the cart is no more; all we have is a pile of components. In the same way 'I' am made up of various elements or aggregates (khandhas): form (rupa-khandha), feeling-sensation (pleasant, unpleasant, neutral), (vedana-khandha), perception (sanna-khandha), volitional mental activities (sankhara-khandha), sense consciousness (vinnana-khandha).--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="accordion-item">--}}
{{--                    <h2 class="accordion-header" id="flush-headingThree">--}}
{{--                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">--}}
{{--                            The Noble Eightfold Path--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">--}}
{{--                        <div class="accordion-body">--}}
{{--                            <p>--}}
{{--                            <ol>--}}
{{--                                <li>Right View.</li>--}}
{{--                                <li>Right Thought.</li>--}}
{{--                                <li>Right Speech.</li>--}}
{{--                                <li>Right Action.</li>--}}
{{--                                <li>Right Livelihood.</li>--}}
{{--                                <li>Right Effort</li>--}}
{{--                                <li>Right Mindfulness.</li>--}}
{{--                                <li>Right Concentration.</li>--}}
{{--                            </ol>--}}
{{--                            The Wheel is the symbol of the Dharma and is shown with eight spokes which represent the Noble Eightfold Path. Right View is important at the start because if we cannot see the truth of the Four Noble Truths then we can't make any sort of beginning. Right Thought follows naturally from this. 'Right' here means in accordance with the facts: with the way things are - which may be different from how I would like them to be. Right Thought, Right Speech, Right Action and Right Livelihood involve moral restraint refraining from lying, stealing, committing violent acts, and earning one's living in a way harmful to others. Moral restraint not only helps bring about general social harmony but also helps us control and diminish the sense of 'I'. Like a greedy child, 'I' grows big and unruly the more we let it have its own way. Next, Right Effort is important because 'I' thrives on idleness and wrong effort; some of the greatest criminals are the most energetic people, so effort must be appropriate to the diminution of I, and in any case if we are not prepared to exert ourselves we cannot hope to achieve anything at all in either the spiritual sense nor in life. The last two steps of the Path, Right Mindfulness or awareness and Right Concentration or absorption, represent the first stage toward liberation from suffering. To be aware and at one with what we are doing is fundamental to proper living, this practice takes many forms but in the West the formal practice is called meditation. In the most basic form of Buddhist meditation, a person sits cross-legged on a cushion on the floor or upright in a chair. He/she quietly watches the rise and fall of the breath. If thoughts, emotions or impulses arise, he/she just observes them come up and go like clouds in a blue sky, without rejecting them on the one hand or being carried away into daydreaming or restlessness on the other. It should be learnt under the guidance of a teacher just as the Buddha too learnt meditation.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="accordion-item">--}}
{{--                    <h2 class="accordion-header" id="flush-headingFour">--}}
{{--                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">--}}
{{--                            The Three Universal Truths and Basic Teachings of Lord Buddha--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                    <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">--}}
{{--                        <div class="accordion-body">--}}
{{--                            <p>--}}
{{--                                The word Buddha means The Awakened One, coming from the Sanskrit root budh – 'to wake'. He is a man who has woken fully, as if from a deep sleep, to discover that suffering, like a dream, is over. The historical Buddha was however a man like any other, but an exceptional one; what he rediscovered was a way that anyone can walk, providing that they are so inclined.--}}

{{--                                The historical Buddha Gautama was not the first Buddha. There had been others who had walked the way before him. He was not a god, a prophet or any kind of supernatural being. He was, as we have seen, one who was born, lived and died a human being. A remarkable human being, who discovered a way of achieving true wisdom, compassion and freedom from suffering. He 'rediscovered an ancient way to an ancient city' that had been covered up and forgotten. Through his own efforts he was able to find the way out of suffering to liberation, and those that have followed him have kept that way open.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="accordion-item">--}}
{{--                    <h2 class="accordion-header" id="flush-headingFive">--}}
{{--                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">--}}
{{--                            The Five Percepts--}}
{{--                        </button>--}}
{{--                    </h2>--}}
{{--                    <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">--}}
{{--                        <div class="accordion-body">--}}
{{--                            <ol>--}}
{{--                                <li>Abstain from killing living beings;</li>--}}
{{--                                <li>Abstain from taking that which not given;</li>--}}
{{--                                <li>Abstain from sexual misconduct;</li>--}}
{{--                                <li>Abstain from false speech;</li>--}}
{{--                                <li>Abstain from distilled substances that confuse the mind. (Alcohol and Drugs)</li>--}}
{{--                            </ol>--}}
{{--                            <p>--}}
{{--                                The underlying principle is non-exploitation of yourself or others. The precepts are the foundation of all Buddhist training. With a developed ethical base, much of the emotional conflict and stress that we experience is resolved, allowing commitment and more conscious choice. Free choice and intention is important. It is "I undertake" not 'Thou Shalt". Choice, not command.--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </section>
    <!-- BUDDHIST SITES Section -->



@endsection
