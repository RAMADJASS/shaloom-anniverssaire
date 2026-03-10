<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Confirmation – Anniversaire Shaloom</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<style>
body {
    background: linear-gradient(rgba(43,27,18,0.95), rgba(43,27,18,0.95)),
                url('/images/pattern.jpg') center/cover no-repeat;
}

.card-chic {
    background: rgba(255,255,255,0.05);
    border-radius: 25px;
    padding: 50px 30px;
    max-width: 720px;
    margin: auto;
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>

<body>

<div class="container-fluid">

<form method="POST" action="{{ route('form.store') }}">
@csrf

<!-- STEP 1 -->
<div class="step active">
<div class="card-chic text-center">

<h2 class="section-title">
On compte sur toi pour la soirée de l'année ? 🥳
</h2>

<button type="button" class="btn btn-chic m-2"
onclick="nextStep('participation','absolument')">
ABSOLUMENT
</button>

<button type="button" class="btn btn-outline-light m-2"
onclick="stopJourney()">
Malheureusement, non.
</button>

</div>
</div>

<!-- STEP 2 -->
<div class="step">
<div class="card-chic text-center">

<h2 class="section-title">
Bloque ton calendrier :<br>
Vendredi 07 Août à 20h pile.<br>
T’es op’ ? 🤭
</h2>

<button type="button" class="btn btn-chic m-2"
onclick="nextStep('disponible','oui')">
Compte sur moi ! 🫱🏾‍🫲🏽
</button>

<button type="button" class="btn btn-outline-light m-2"
onclick="stopJourney()">
Je ne suis pas disponible cette date 😔
</button>

</div>
</div>

<!-- STEP 3 -->
<div class="step">
<div class="card-chic text-center">

<h2 class="section-title">
Pour que la fête soit mémorable,<br>
un gele (tabla) doré/or obligatoire est à vendre.<br>
On valide ?
</h2>

<button type="button" class="btn btn-chic m-2"
onclick="nextStep('gele','oui')">
Sans problème 💴
</button>

<button type="button" class="btn btn-outline-light m-2"
onclick="stopJourney()">
Ça sera sans moi 🤡
</button>

</div>
</div>

<!-- STEP 4 DRESS CODE -->
<div class="step">
<div class="card-chic text-center">

<h2 class="section-title mb-4">
On fait les choses bien 👌🏾<br>
Le thème de la soirée c’est traditionnel chic ! Tu t'engages à respecter le Dress Code et à arriver à l'heure ?
</h2>

<div class="row g-3 mb-4">

<div class="col-6 col-md-3">
<img src="/images/dresscode1.jpeg" class="img-fluid rounded-4 shadow">
</div>

<div class="col-6 col-md-3">
<img src="/images/dresscode2.jpeg" class="img-fluid rounded-4 shadow">
</div>

<div class="col-6 col-md-3">
<img src="/images/dresscode3.jpeg" class="img-fluid rounded-4 shadow">
</div>

<div class="col-6 col-md-3">
<img src="/images/dresscode4.jpeg" class="img-fluid rounded-4 shadow">
</div>

</div>

<p class="text-muted mb-4">
Inspiration du style attendu ✨  
Tenue traditionnelle chic • Élégance • Harmonie
</p>

<button type="button" class="btn btn-chic m-2"
onclick="nextStep('respect','oui')">
Compte sur moi pour mettre le paquet 🫵🏾
</button>

<button type="button" class="btn btn-outline-light m-2"
onclick="stopJourney()">
Je ne pourrai pas m’y conformer 🤡
</button>

</div>
</div>

<!-- STEP 5 -->
<div class="step">
<div class="card-chic">

<h2 class="section-title text-center">
Dernière étape ✨
</h2>

<input type="text" name="prenom"
class="form-control mb-3"
placeholder="Ton prénom"
required>

<input type="text" name="nom"
class="form-control mb-4"
placeholder="Ton nom"
required>

<button type="submit" class="btn btn-chic w-100">
Valider ma participation
</button>

</div>
</div>

<!-- STEP STOP -->
<div class="step">
<div class="card-chic text-center">

<h2 class="section-title">Merci pour ta franchise 🙏</h2>

<p class="fs-5">
Cette célébration est organisée selon des critères bien précis.
</p>

<p class="text-muted mt-3">
Au plaisir de te retrouver une prochaine fois ✨
</p>

</div>
</div>

<!-- HIDDEN INPUTS -->
<input type="hidden" name="participation">
<input type="hidden" name="disponible">
<input type="hidden" name="gele">
<input type="hidden" name="respect">

</form>

</div>

<script>

let currentStep = 0;
const steps = document.querySelectorAll('.step');

function nextStep(field,value){
document.querySelector(`input[name="${field}"]`).value = value;
goNext();
}

function stopJourney(){
steps[currentStep].classList.remove('active');
currentStep = steps.length - 1;
steps[currentStep].classList.add('active');
window.scrollTo({top:0,behavior:'smooth'});
}

function goNext(){
steps[currentStep].classList.remove('active');
currentStep++;
steps[currentStep].classList.add('active');
window.scrollTo({top:0,behavior:'smooth'});
}

</script>


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

if(playing){
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

document.addEventListener('click',function autoPlayOnce(){
if(music.paused){
music.play().then(()=>{
localStorage.setItem('musicPlaying','true');
btn.innerText='🔈';
});
}
document.removeEventListener('click',autoPlayOnce);
});

</script>

@include('components.footer')

</body>
</html>