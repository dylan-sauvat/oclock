let intervalId;
let startTime;
let elapsedTime = 0;
let lapCount = 1;

const display = document.getElementById("display");
const startStop = document.getElementById("startStop");
const reset = document.getElementById("reset");
const lap = document.getElementById("lap");
const laps = document.getElementById("laps");

function updateTime() {
  const ms = elapsedTime % 1000;
  const s = Math.floor(elapsedTime / 1000) % 60;
  const m = Math.floor(elapsedTime / (1000 * 60)) % 60;
  const h = Math.floor(elapsedTime / (1000 * 60 * 60)) % 24;

  const msStr = ms.toString().padStart(3, "0");
  const sStr = s.toString().padStart(2, "0");
  const mStr = m.toString().padStart(2, "0");
  const hStr = h.toString().padStart(2, "0");

  display.textContent = `${hStr}:${mStr}:${sStr}.${msStr}`;
}

function startChronometer() {
  startTime = Date.now() - elapsedTime;
  intervalId = setInterval(() => {
    elapsedTime = Date.now() - startTime;
    updateTime();
  }, 10);
  startStop.textContent = "Stop";
}

function stopChronometer() {
  clearInterval(intervalId);
  startStop.textContent = "Start";
}

function resetChronometer() {
  clearInterval(intervalId);
  elapsedTime = 0;
  lapCount = 1;
  updateTime();
  laps.innerHTML = "";
}

function lapChronometer() {
  const lapTime = elapsedTime;
  const lapItem = document.createElement("li");
  lapItem.textContent = `Lap ${lapCount}: ${display.textContent}`;
  lapCount++;
  laps.appendChild(lapItem);
}

startStop.addEventListener("click", () => {
  if (intervalId) {
    stopChronometer();
  } else {
    startTime = Date.now() - elapsedTime; // update startTime with current time
    intervalId = setInterval(() => {
      elapsedTime = Date.now() - startTime;
      updateTime();
    }, 10);
    startStop.textContent = "Stop";
  }
});

reset.addEventListener("click", () => {
  resetChronometer();
});

lap.addEventListener("click", () => {
  lapChronometer();
});




