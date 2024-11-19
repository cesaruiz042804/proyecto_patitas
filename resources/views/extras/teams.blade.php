<<<<<<< HEAD
=======


>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
<link rel="stylesheet" href="{{ asset('asset_css/extras/teams.css') }}">

<section class="team">
    <h2 class="section-heading">Equipo de colaboración</h2>
<<<<<<< HEAD

    @php
        $people = [
            [
                'name' => 'César',
                'image' => asset('recursos_sobre_nosotros/img_cesar.webp'),
            ],
            [
                'name' => 'Emanuel',
                'image' => asset('recursos_sobre_nosotros/img_emanuel.jpg'),
            ],
            [
                'name' => 'Arath',
                'image' => asset('recursos_sobre_nosotros/img_arath.jpg'),
            ],
            [
                'name' => 'Jean',
                'image' => asset('recursos_sobre_nosotros/img_jean.jpg'),
            ],
            [
                'name' => 'René',
                'image' => asset('recursos_sobre_nosotros/img_rene.jpg'),
            ],
            [
                'name' => 'Anyel',
                'image' => asset('recursos_sobre_nosotros/img_anyel.jpg'),
            ],
        ];
    @endphp

    <div class="container-fotos">
        @foreach ($people as $person)
            <div class="profile">
                <img src="{{ $person['image'] }}" alt="Foto de {{ $person['name'] }}" class="person-image">
                <p class="person-name">{{ $person['name'] }}</p>
            </div>
        @endforeach

    </div>
</section>














<!--

<div class="profile">
            <img src="{{ asset('recursos_sobre_nosotros/img_cesar.webp') }}" alt="" /><span
                class="name">César</span>
        </div>
        <div class="profile">
            <img src="{{ asset('recursos_sobre_nosotros/img_emanuel.jpg') }}" alt="" /><span
                class="name">Emanuel</span>
        </div>

        <div class="profile">
            <img src="{{ asset('recursos_sobre_nosotros/img_arath.jpg') }}" alt="" /><span
                class="name">Arath</span>
        </div>
        <div class="profile">
            <img src="{{ asset('recursos_sobre_nosotros/img_jean.jpg') }}" alt="" /><span
                class="name">Jean</span>
        </div>
        <div class="profile">
            <img src="{{ asset('recursos_sobre_nosotros/img_rene.jpg') }}" alt="" /><span
                class="name">René</span>
        </div>
        <div class="profile">
            <img src="{{ asset('recursos_sobre_nosotros/img_anyel.jpg') }}" alt="" /><span
                class="name">Anyel</span>
        </div>

-->
=======
    <div class="container-fotos">
        <div class="profile">
            <img src="{{  asset('recursos_sobre_nosotros/img_cesar.webp') }}"
                alt="" /><span class="name">César</span>
        </div>
        <div class="profile">
            <img src="{{  asset('recursos_sobre_nosotros/img_emanuel.jpg') }}"
                alt="" /><span class="name">Emanuel</span>
        </div>

        <div class="profile">
            <img src="{{  asset('recursos_sobre_nosotros/img_arath.jpg') }}"
                alt="" /><span class="name">Arath</span>
        </div>
        <div class="profile">
            <img src="{{  asset('recursos_sobre_nosotros/img_jean.jpg') }}"
                alt="" /><span class="name">Jean</span>
        </div>
        <div class="profile">
            <img src="{{  asset('recursos_sobre_nosotros/img_rene.jpg') }}"
                alt="" /><span class="name">René</span>
        </div>
        <div class="profile">
            <img src="{{  asset('recursos_sobre_nosotros/img_anyel.jpg') }}"
                alt="" /><span class="name">Anyel</span>
        </div>
    </div>
</section>
>>>>>>> 3ecf386a971d995b5edfb425f5d926b8e8574bf6
