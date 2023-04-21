<!DOCTYPE html>
<html>
  <head>
  <title>Oclock</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
  </head>
  <body>
  <header>
      <a href="index.php" class="active">Timer</a>
      <a href="chrono.php">Chrono</a>
      <a href="horloge.php">Clock</a>
    </header>
    <style>
    html, body {
  height: 100%;
}

/* background */
body {
  background: #333;
  text-align: center;
}

/* header */
h1 {
  font-family: 'Orbitron', sans-serif;
  font-size: 4em;
  color: #fff;
}

/* buttons */
button {
  cursor: pointer;
  margin: 0 5px;
  padding: 10px 30px;
  background: transparent;
  border: 1px solid #ccc;
  border-radius: 8px;
  outline: 0;
  color: #fff;
  transition: all ease 300ms;
}
button:hover {
  color: #333;
  background: #fff;
}

/* center content vertically and horizontally */
.table {
  display: table;
  width: 100%;
  height: 100%;
}
.cell {
  display: table-cell;
  vertical-align: middle;
  cursor: default;
}

/* variable misc classes */
.hide {
  display: none;
}

.timer-label {
    font-size: 24px;
    color : #fff;
    margin-bottom: 10px;
  }
  
  .timer-value {
    font-size: 48px;
    color : #fff;
    font-weight: bold;
    margin-bottom: 10px;
  }

  label {
    color: #fff;
  }
    </style>
    </header>
    <br>
    <br>
    <br>
    <br>
    <main>
      <div class="timer-container">
        <div class="timer-label">Time remaining :</div>
        <div class="timer-value">00:00:00</div>
        <div class="timer-controls">
          <button class="start-timer">Start</button>
          <button class="reset-timer">Reset</button>
          <button class="stop-timer">Stop</button>
        </div>
      </div>
      <div class="timer-input">
        <label for="timer-input">Add Time :</label>
        <input type="number" id="timer-input" placeholder="in seconds">
        <button id="add-time">Add</button>
      </div>
      

    <script src="js/script.js"></script>
  </body>
  <br>
  <br>
  <br>
  <br>
<footer>
  Dylan Sauvat  &copy; | All Right Reserved
  <a href="https://github.com/dylan-sauvat"><span class="fa fa-github"></span></a>
  </footer>
</html>

