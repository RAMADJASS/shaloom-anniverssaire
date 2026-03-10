<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Invitation – Anniversaire Shaloom</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

<!-- HERO -->
<section class="hero">

<h1 class="fade-up">SHA'S 20TH</h1>
<h1 class="fade-up">BIRTHDAYYYY</h1>
<p class="fade-up">
Une célébration d’exception, empreinte de tradition et d’élégance
</p>

<a href="{{ route('form') }}" class="btn btn-chic mt-4">
Confirmer ma participation
</a>

</section>


<!-- COUNTDOWN -->
<section class="section text-center">

<h2 class="section-title">
Le compte à rebours est lancé
</h2>

<div id="countdown" class="d-flex justify-content-center gap-4 fs-4"></div>

</section>


<!-- CAROUSEL -->
<section class="section">

<h2 class="section-title">
Une icône. Une célébration.
</h2>

<div class="container">

<div id="carouselShaloom" class="carousel slide" data-bs-ride="carousel">

<div class="carousel-inner rounded-4 overflow-hidden">

@for ($i = 1; $i <= 5; $i++)

<div class="carousel-item {{ $i == 1 ? 'active' : '' }}">

<img src="{{ asset('images/photo'.$i.'.jpeg') }}"
class="d-block w-100"
alt="Shaloom">

</div>

@endfor

</div>

</div>

</div>

</section>


<!-- MESSAGE -->
<section class="section">

<div class="container">

<div class="info-box">

<p class="fs-5">

Cette soirée marque bien plus qu’un anniversaire.  
C’est une rencontre, un symbole, un moment de partage  
où tradition, élégance et convivialité ne feront qu’un.

</p>

</div>

</div>

</section>


<!-- INFOS -->
<section class="section">

<h2 class="section-title">
Informations clés
</h2>

<div class="container">

<div class="row g-4">

<div class="col-md-3">

<div class="info-box">

<strong>Date</strong><br>
Vendredi 07 Août

</div>

</div>

<div class="col-md-3">

<div class="info-box">

<strong>Heure</strong><br>
20h précises

</div>

</div>

<div class="col-md-3">

<div class="info-box">

<strong>Dress code</strong><br>
Traditionnel chic

</div>

</div>

<div class="col-md-3">

<div class="info-box">

<strong>Esprit</strong><br>
Élégance & Respect

</div>

</div>

</div>

</div>

</section>


<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<!-- COUNTDOWN SCRIPT -->
<script>

const eventDate = new Date("August 7, 2026 20:00:00").getTime();

setInterval(() => {

const now = new Date().getTime();
const diff = eventDate - now;

const days = Math.floor(diff / (1000 * 60 * 60 * 24));
const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
const minutes = Math.floor((diff / (1000 * 60)) % 60);

document.getElementById("countdown").innerHTML = `
<div>${days} <small>jours</small></div>
<div>${hours} <small>heures</small></div>
<div>${minutes} <small>minutes</small></div>
`;

}, 1000);

</script>


<!-- AUDIO -->
<audio id="bg-music" loop>
<source src="{{ asset('audio/traditionnelle.mp3') }}" type="audio/mpeg">
</audio>


<button id="musicBtn" class="btn btn-chic position-fixed bottom-0 end-0 m-4">
🔊
</button>


<script>

const music = document.getElementById('bg-music');
const btn = document.getElementById('musicBtn');

let playing = localStorage.getItem('musicPlaying') === 'true';

if (playing) {
music.play().catch(()=>{});
btn.innerText='🔈';
}

btn.onclick = () => {

if(music.paused){

music.play();
localStorage.setItem('musicPlaying','true');
btn.innerText='🔈';

}else{

music.pause();
localStorage.setItem('musicPlaying','false');
btn.innerText='🔊';

}

};

document.addEventListener('click', function autoPlayOnce(){

if(music.paused){

music.play().then(()=>{

localStorage.setItem('musicPlaying','true');
btn.innerText='🔈';

});

}

document.removeEventListener('click', autoPlayOnce);

});

</script>


@include('components.footer')

</body>
</html>