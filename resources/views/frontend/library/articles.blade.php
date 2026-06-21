@extends('frontend.layouts.base')

@section('page-title', 'Articles')

@section('main-content')
    <section  class="pd-top">
        <div class="container d-flex align-items-center flex-column justify-content-center">
            <div class="title">
                <img src="{{ asset('_common/img/title-icon.png') }}">
                <span>BOOKS</span>
                <h2>ARTICLES COLLECTION</h2>
            </div>
        </div>
    </section>
    <section class="container pd-bottom">
        <div class="row">
            <div class="col-lg-8 m-auto article-wrap">
                <span><i class="fa-solid fa-pen-to-square"></i>Ajahn Amaro</span>
                <h4>Do What the Teacher Is Asking</h4>
                <p>
                    At the end of the Buddha’s life, when he was at Kusinara and he was about to realize Parinibbāna, at that time many Devata and Brahma gods gathered together.
                </p>
                <p>
                    The sal trees in the forest came out into bloom; they flowered even though it was not the season for their blossoming. The heavenly musicians, the gandhabbas were playing their divine music, filling the air with sublime sounds. Celestial flowers, the mandarava blossoms, rained down from the sky.
                </p>
                <p>
                    Venerable Ananda said, “It is amazing; it is incredible. The celestial musicians, the gandabbhas are playing their music. The Devas and the Brahmas have gathered together. Manadarava flowers are raining down from the sky. The sal trees have burst into bloom. Never before has the Buddha been so honoured, so revered, so respected. Never before have there been such gestures of reverence and veneration shown to the Tathagata. This is unique. This is incredible.”
                </p>
                <p>
                    The Buddha replied, “Yes indeed, Ananda. Never before has the Tathagata been so honoured, so venerated as in this way. But if one really wants to venerate, honour and express respect for the Tathagata, then what one will do is to practise the Dhamma. One will follow the Dhamma way. That’s how one most fully and completely expresses one’s respect, honour and reverence for the Tathagata.”
                </p>
                <p>
                    So, on occasions like we have today at Wat Pah Nanachat, where there are many offerings of flowers and much reverence, I often think of this teaching, this exchange of words between Venerable Ananda and the Lord Buddha.
                </p>
                <p>
                    Because we are inspired, we wish to express our devotion, our gratitude and our positive feelings: so we bow, we pay our respects, we offer flowers, we say words that convey that devotion. But that’s a loka-dhamma, a worldly dhamma, a worldly expression of devotion.
                </p>
                <p>
                    It is more difficult but more useful to express our devotion through the actual practice of Dhamma through following the Dhamma way. As the Buddha pointed out to Venerable Ananda, how we express our reverence, how we express our gratitude most completely is to actually follow the teacher’s instructions.
                </p>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
                <h4 class="op-header">Other Articles</h4>
                <div class="op">
                    <div class="op-img">
                        <a href=""><img src="{{ asset('_common/img/articles/v-thumb-03.jpg') }}"></a>
                    </div>
                    <div class="op-text">
                        <a href="">
                            <h6>Ajahn Pasanno</h6>
                            <a href="">Compassion Demands Response</a>
                            <p><span>Posted on: <span>3 May 2024</span></span></p>
                        </a>
                    </div>
                </div>
                <div class="op">
                    <div class="op-img">
                        <a href=""><img src="{{ asset('_common/img/articles/welcome-title-wrap.jpg') }}"></a>
                    </div>
                    <div class="op-text">
                        <a href="">
                            <h6>Ajahn Sundara</h6>
                            <a href="">Past, Present, and Future</a>
                            <p><span>Posted on: <span>3 May 2024</span></span></p>
                        </a>
                    </div>
                </div>
                <div class="op">
                    <div class="op-img">
                        <a href=""><img src="{{ asset('_common/img/articles/pexels-rdne-stock-project-8711124.jpg') }}"></a>
                    </div>
                    <div class="op-text">
                        <a href="">
                            <h6>Ajahn Sundara</h6>
                            <a href="">Past, Present, and Future</a>
                            <p><span>Posted on: <span>3 May 2024</span></span></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
