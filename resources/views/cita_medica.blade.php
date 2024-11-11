<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamiento</title>
    <link rel="preload" href="{{ asset('img_public/logo.png') }}" as="image">
    <link rel="preload" href="{{ asset('recursos_sobre_nosotros/img-form.jpg') }}" as="image">
    <link rel="stylesheet" href="{{ asset('asset_css/cita_medica.css') }}">
    <script src="https://unpkg.com/imask"></script>
</head>

<body>

    @include('partials.navbar')

    @include('partials.messageErrors')
    @include('partials.messageGood')

    <main>
        <div class="container">
            <form method="POST" action="{{ route('register.citas') }}" class="form" enctype="multipart/form-data">
                @csrf

                <!-- Campo oculto para el ID del dueño -->
                <input type="hidden" name="user" value="{{ session('user') }}">

                <h2 class="title-1">Historia Clínica</h2>

                <div class="content-animal">
                    <h3>Datos del paciente</h3>
                    <input type="text" id="petName" name="petName" placeholder="Nombre de la mascota"
                        value="{{ old('petName') }}">

                    <select name="species" id="species">
                        <option value="">Selecciona una especie</option>
                        <option value="perro" {{ old('species') == 'perro' ? 'selected' : '' }}>Perro</option>
                        <option value="gato" {{ old('species') == 'gato' ? 'selected' : '' }}>Gato</option>
                    </select>

                    <select name="breed" id="breed">
                        <option value="">Selecciona una raza</option>
                        <optgroup label="Perros" class="dog-breeds">
                            <option value="labrador" {{ old('breed') == 'labrador' ? 'selected' : '' }}>Labrador
                            </option>
                            <option value="bulldog" {{ old('breed') == 'bulldog' ? 'selected' : '' }}>Bulldog</option>
                            <option value="poodle" {{ old('breed') == 'poodle' ? 'selected' : '' }}>Poodle</option>
                            <option value="beagle" {{ old('breed') == 'beagle' ? 'selected' : '' }}>Beagle</option>
                            <option value="golden_retriever"
                                {{ old('breed') == 'golden_retriever' ? 'selected' : '' }}>Golden Retriever</option>
                            <option value="chihuahua" {{ old('breed') == 'chihuahua' ? 'selected' : '' }}>Chihuahua
                            </option>
                            <option value="dachshund" {{ old('breed') == 'dachshund' ? 'selected' : '' }}>Dachshund
                            </option>
                            <option value="rottweiler" {{ old('breed') == 'rottweiler' ? 'selected' : '' }}>Rottweiler
                            </option>
                            <option value="shih_tzu" {{ old('breed') == 'shih_tzu' ? 'selected' : '' }}>Shih Tzu
                            </option>
                            <option value="yorkshire_terrier"
                                {{ old('breed') == 'yorkshire_terrier' ? 'selected' : '' }}>Yorkshire Terrier</option>
                            <option value="boxer" {{ old('breed') == 'boxer' ? 'selected' : '' }}>Boxer</option>
                            <option value="schnauzer" {{ old('breed') == 'schnauzer' ? 'selected' : '' }}>Schnauzer
                            </option>
                            <option value="german_shepherd" {{ old('breed') == 'german_shepherd' ? 'selected' : '' }}>
                                Pastor Alemán</option>
                            <option value="pitbull" {{ old('breed') == 'pitbull' ? 'selected' : '' }}>
                                Pitbull</option>
                            <option value="jack_russell" {{ old('breed') == 'jack_russell' ? 'selected' : '' }}>Jack
                                Russell Terrier</option>
                            <option value="french_bulldog" {{ old('breed') == 'french_bulldog' ? 'selected' : '' }}>
                                Bulldog Francés</option>
                            <option value="cocker_spaniel" {{ old('breed') == 'cocker_spaniel' ? 'selected' : '' }}>
                                Cocker Spaniel</option>
                            <option value="basset_hound" {{ old('breed') == 'basset_hound' ? 'selected' : '' }}>Basset
                                Hound</option>
                            <option value="pug" {{ old('breed') == 'pug' ? 'selected' : '' }}>Pug</option>
                            <option value="maltese" {{ old('breed') == 'maltese' ? 'selected' : '' }}>Maltés</option>
                            <option value="doberman" {{ old('breed') == 'doberman' ? 'selected' : '' }}>Doberman
                            </option>
                            <option value="otro" {{ old('breed') == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </optgroup>
                        <optgroup label="Gatos" class="cat-breeds">
                            <option value="angora" {{ old('breed') == 'angora' ? 'selected' : '' }}>Angora</option>
                            <option value="ragdoll" {{ old('breed') == 'ragdoll' ? 'selected' : '' }}>Ragdoll</option>
                            <option value="sphynx" {{ old('breed') == 'sphynx' ? 'selected' : '' }}>Sphynx</option>
                            <option value="british_shorthair"
                                {{ old('breed') == 'british_shorthair' ? 'selected' : '' }}>British Shorthair</option>
                            <option value="himalayo" {{ old('breed') == 'himalayo' ? 'selected' : '' }}>Himalayo
                            </option>
                            <option value="exotico" {{ old('breed') == 'exotico' ? 'selected' : '' }}>Exótico de Pelo
                                Corto</option>
                            <option value="siames" {{ old('breed') == 'siames' ? 'selected' : '' }}>Siamés</option>
                            <option value="maine_coon" {{ old('breed') == 'maine_coon' ? 'selected' : '' }}>Maine Coon
                            </option>
                            <option value="bombay" {{ old('breed') == 'bombay' ? 'selected' : '' }}>Bombay</option>
                            <option value="persa" {{ old('breed') == 'persa' ? 'selected' : '' }}>Persa</option>
                            <option value="american_shorthair"
                                {{ old('breed') == 'american_shorthair' ? 'selected' : '' }}>American Shorthair
                            </option>
                            <option value="birmano" {{ old('breed') == 'birmano' ? 'selected' : '' }}>Birmano</option>
                            <option value="abisinio" {{ old('breed') == 'abisinio' ? 'selected' : '' }}>Abisinio
                            </option>
                            <option value="scottish_fold" {{ old('breed') == 'scottish_fold' ? 'selected' : '' }}>
                                Scottish Fold</option>
                            <option value="snowshoe" {{ old('breed') == 'snowshoe' ? 'selected' : '' }}>Snowshoe
                            </option>
                            <option value="munchkin" {{ old('breed') == 'munchkin' ? 'selected' : '' }}>Munchkin
                            </option>
                            <option value="otro" {{ old('breed') == 'Otro' ? 'selected' : '' }}>Otro</option>
                        </optgroup>
                    </select>

                    <input type="number" min="0" max="300" step="1" id="weight" name="weight"
                        placeholder="Peso (libras)" value="{{ old('weight') }}">

                    <select name="color">
                        <optgroup label="Color" class="animal-colors">
                            <option value="blanco" {{ old('color') == 'blanco' ? 'selected' : '' }}>Blanco</option>
                            <option value="negro" {{ old('color') == 'negro' ? 'selected' : '' }}>Negro</option>
                            <option value="marron" {{ old('color') == 'marron' ? 'selected' : '' }}>Marrón</option>
                            <option value="gris" {{ old('color') == 'gris' ? 'selected' : '' }}>Gris</option>
                            <option value="naranja" {{ old('color') == 'naranja' ? 'selected' : '' }}>Naranja</option>
                            <option value="atigrado" {{ old('color') == 'atigrado' ? 'selected' : '' }}>Atigrado
                            </option>
                            <option value="bicolor" {{ old('color') == 'bicolor' ? 'selected' : '' }}>Bicolor</option>
                            <option value="tricolor" {{ old('color') == 'tricolor' ? 'selected' : '' }}>Tricolor
                            </option>
                            <option value="crema" {{ old('color') == 'crema' ? 'selected' : '' }}>Crema</option>
                            <option value="champagne" {{ old('color') == 'champagne' ? 'selected' : '' }}>Champagne
                            </option>
                            <option value="otro" {{ old('color') == 'otro' ? 'selected' : '' }}>otro</option>
                        </optgroup>
                    </select>

                    <input type="number" min="0" max="30" id="old" name="old"
                        placeholder="Edad" value="{{ old('old') }}">
                </div>

                <div class="content-textarea">
                    <div class="textarea-dato">
                        <label for="">Motivo de la consulta</label>
                        <textarea name="consultation" id="consultation" placeholder="Observaciones"></textarea>
                        <div class="content-consulta">
                            <input type="date" id="date" name="date" min="2024-11-1" max="2024-1-30"
                                value="{{ old('date') }}">
                            <select type="text" id="datetimepicker" name="datetimepicker"
                                value="{{ old('datetimepicker') }}">
                                <option value="08:00">08:00 am</option>
                                <option value="09:00">09:00 am</option>
                                <option value="10:00">10:00 am</option>
                                <option value="11:00">11:00 am</option>
                                <option value="12:00">12:00 pm</option>
                                <option value="13:00">01:00 pm</option>
                                <option value="14:00">02:00 pm</option>
                                <option value="15:00">03:00 pm</option>
                                <option value="16:00">04:00 pm</option>
                            </select>
                            <input type="file" id="image" name="image" accept="image/*">
                        </div>
                    </div>
                </div>

                <div class="content-btn">
                    <button class="btn-send" onclick="pageLoading('.container')">Enviar datos</button>
                </div>
            </form>
        </div>

        @include('partials.loading')

    </main>

    @include('partials.footer')

    <script src="{{ asset('asset_js/cita_medica.js') }}"></script>

</body>

</html>