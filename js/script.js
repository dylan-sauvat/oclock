const timerValue = document.querySelector('.timer-value');
const startTimerBtn = document.querySelector('.start-timer');
const stopTimerBtn = document.querySelector('.stop-timer');
const addTimeBtn = document.querySelector('#add-time');
const timerInput = document.querySelector('#timer-input');
const resetTimerBtn = document.querySelector('.reset-timer');

let timeLeft = 0;
let timerId = null;

function updateTimer() {
  const hours = Math.floor(timeLeft / 3600);
  const minutes = Math.floor((timeLeft % 3600) / 60);
  const seconds = Math.floor(timeLeft % 60);
  timerValue.textContent = `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
}

function startTimer() {
  if (timerId) {
    return;
  }
  timerId = setInterval(() => {
    if (timeLeft > 0) {
      timeLeft--;
      updateTimer();
    } else {
      clearInterval(timerId);
      timerId = null;
      alert('Le temps est écoulé !');
    }
  }, 1000);
}

function stopTimer() {
  clearInterval(timerId);
  timerId = null;
}

function addTime() {
  const inputTime = parseInt(timerInput.value);
  if (!isNaN(inputTime)) {
    timeLeft += inputTime;
    updateTimer();
  }
  timerInput.value = '';
}

function resetTimer() {
  timeLeft = 0;
  updateTimer();
  clearInterval(timerId);
  timerId = null;
  }

startTimerBtn.addEventListener('click', startTimer);
stopTimerBtn.addEventListener('click', stopTimer);
addTimeBtn.addEventListener('click', addTime);
resetTimerBtn.addEventListener('click', resetTimer);
