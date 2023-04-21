<!DOCTYPE html>
<html>
<head>
  <title>Oclock</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
    <header>
      <a href="index.php" class="active">Timer</a>
      <a href="chrono.php">Chrono</a>
      <a href="horloge.php">Clock</a>
    </header>
    <meta charset="utf-8">
</head>
<body>
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">

<div class="table">
  <div class="cell">
    <h1 id="clock" class="clock"></h1>

    <select id="hours"></select>
    <select id="minutes"></select>
    <select id="seconds"></select>
    <select id="ampm">
      <option value="AM">AM</option>
      <option value="PM">PM</option>
    </select>

    <p>
      <button id="snooze" class="hide">Snooze</button>
      <button id="clear">Clear Alarm</button>
      <button id="startstop">Set Alarm</button>
    </p>
    <br>

    <p>
    <label for="message">Alarm Message :</label>
    <input type="text" id="message">
    <button id="snooze" class="hide">Snooze</button>
      <button id="startstop">Set Message</button>
  </p>
  <style>
    label {
    color: #fff;
}
</style>
<script>
// Sélectionnez l'élément bouton 'startstop' et ajoutez un événement clic
document.getElementById("startstop").addEventListener("click", function() {

  // Récupérez la valeur de l'entrée de texte 'message'
  var message = document.getElementById("message").value;

  // Définissez une fonction pour envoyer une alerte avec le message
  function showAlert() {
    alert(message);
  }

  // Définissez un délai de 5 secondes pour envoyer l'alerte
  setTimeout(showAlert, 5000);

  // Rendre le bouton 'snooze' visible
  document.getElementById("snooze").classList.remove("hide");

});

    // set our variables
var time, alarm, currentH, currentM,
    activeAlarm = false,
    sound = new Audio("https://freesound.org/data/previews/316/316847_4939433-lq.mp3");

/*
  audio sound source: https://freesound.org/people/SieuAmThanh/sounds/397787/
*/

// loop alarm
sound.loop = true;

// define a function to display the current time
function displayTime() {
  var now = new Date();
  time = now.toLocaleTimeString();
  clock.textContent = time;
  // time = "1:00:00 AM";
  // watch for alarm
  if (time === alarm) {
    sound.play();

    // show snooze button
    snooze.className = "";
  }
  setTimeout(displayTime, 1000);
}
displayTime();

// add option values relative towards time
function addMinSecVals(id) {
  var select = id;
  var min = 59;

  for (i = 0; i <= min; i++) {
    // defined as new Option(text, value)
    select.options[select.options.length] = new Option(i < 10 ? "0" + i : i, i < 10 ? "0" + i : i);
  }
}
function addHours(id) {
  var select = id;
  var hour = 12;

  for (i = 1; i <= hour; i++) {
    // defined as new Option(text, value)
    select.options[select.options.length] = new Option(i < 10 ? "0" + i : i, i);
  }
}
addMinSecVals(minutes);
addMinSecVals(seconds);
addHours(hours);

// set and clear alarm
startstop.onclick = function() {
  // set the alarm
  if (activeAlarm === false) {
    hours.disabled = true;
    minutes.disabled = true;
    seconds.disabled = true;
    ampm.disabled = true;

    alarm = hours.value + ":" + minutes.value + ":" + seconds.value + " " + ampm.value;
    this.textContent = "Clear Alarm";
    activeAlarm = true;
  } else {
    // clear the alarm
    hours.disabled = false;
    minutes.disabled = false;
    seconds.disabled = false;
    ampm.disabled = false;

    sound.pause();
    alarm = "00:00:00 AM";
    this.textContent = "Set Alarm";

    // hide snooze button
    snooze.className = "hide";
    activeAlarm = false;
  }
};

// snooze for 5 minutes
snooze.onclick = function() {
  if (activeAlarm === true) {
    // grab the current hour and minute
    currentH = time.substr(0, time.length - 9);
    currentM = time.substr(currentH.length + 1, time.length - 8);

    if (currentM >= "55") {
      minutes.value = "00";
      hours.value = parseInt(currentH) + 1;
    } else {
      if (parseInt(currentM) + 5 <= 9) {
        minutes.value = "0" + parseInt(currentM + 5);
      } else {
        minutes.value = parseInt(currentM) + 5;
      }
    }

    // hide snooze button
    snooze.className = "hide";

    // now reset alarm
    startstop.click();
    startstop.click();
  } else {
    return false;
  }
};

// Créer un objet Alarme
function Alarme(heure, texte) {
  this.heure = heure;
  this.texte = texte;
}

// Initialiser un tableau pour stocker les alarmes
var alarmes = [];

// Ajouter une nouvelle alarme au tableau
function ajouterAlarme() {
  var heure = document.getElementById("heure").value;
  var texte = document.getElementById("texte").value;
  var nouvelleAlarme = new Alarme(heure, texte);
  alarmes.push(nouvelleAlarme);
}

// Vérifier si une alarme doit être déclenchée
function verifierAlarmes() {
  var maintenant = new Date();
  alarmes.forEach(function(alarme) {
    var heureAlarme = new Date(alarme.heure);
    if (heureAlarme <= maintenant) {
      alert(alarme.texte);
    }
  });
}

// Exécuter la fonction vérifierAlarmes toutes les secondes
setInterval(verifierAlarmes, 1000);

  $(document).ready(function() {
    // Récupérer les éléments DOM des boutons
    var startstopBtn = $('#startstop');
    var clearBtn = $('#clear');

    // Ajouter un gestionnaire d'événements au bouton "Clear Alarm"
    clearBtn.click(function() {
      // Arrêter la sonnerie de l'alarme
      stopAlarm();
      // Désactiver les boutons "Snooze" et "Clear Alarm"
      $('#snooze, #clear').addClass('hide');
      // Réactiver le bouton "Set Alarm"
      startstopBtn.removeClass('hide');
    });

    // Fonction pour arrêter la sonnerie de l'alarme
    function stopAlarm() {
      // Code pour arrêter la sonnerie de l'alarme
      // ...
    }
  });
</script>


</script>
</body>
<br>
  <br>
<footer>
  Dylan Sauvat  &copy; | All Right Reserved
  <a href="https://github.com/dylan-sauvat"><span class="fa fa-github"></span></a>
</footer>
<br>
  <br>

</html>