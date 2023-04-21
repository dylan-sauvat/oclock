const alarmTimeInput = document.getElementById('alarm-time');
const alarmMessageInput = document.getElementById('alarm-message');
const addAlarmButton = document.getElementById('add-alarm');
const alarmList = document.getElementById('alarm-list');

const alarms = [];

// Ajouter une alarme
addAlarmButton.addEventListener('click', () => {
  const alarmTime = alarmTimeInput.value;
  const alarmMessage = alarmMessageInput.value;

  if (alarmTime && alarmMessage) {
    alarms.push({
      time: alarmTime,
      message: alarmMessage
    });

    const alarmItem = document.createElement('li');
    const alarmTimeObj = new Date();
    const alarmTimeParts = alarmTime.split(':');
    alarmTimeObj.setHours(alarmTimeParts[0]);
    alarmTimeObj.setMinutes(alarmTimeParts[1]);
    alarmTimeObj.setSeconds(0);

    if (alarmTimeObj < new Date()) {
      alarmItem.classList.add('past');
    } else {
      alarmItem.classList.add('future');
    }

    const alarmTimeDiff = alarmTimeObj - new Date();
    const alarmTimeDiffMinutes = Math.floor(alarmTimeDiff / 60000);
    const alarmTimeDiffSeconds = Math.floor((alarmTimeDiff % 60000) / 1000);
    const alarmTimeDiffText = `dans ${alarmTimeDiffMinutes}m ${alarmTimeDiffSeconds}s`;

    alarmItem.textContent = `${alarmTime} - ${alarmMessage} (${alarmTimeDiffText})`;
    alarmList.appendChild(alarmItem);

    // Vérifier l'heure toutes les secondes pour déclencher l'alarme
    setInterval(() => {
      alarms.forEach((alarm, index) => {
        const alarmTimeObj = new Date();
        const alarmTimeParts = alarm.time.split(':');
        alarmTimeObj.setHours(alarmTimeParts[0]);
        alarmTimeObj.setMinutes(alarmTimeParts[1]);
        alarmTimeObj.setSeconds(0);

        if (alarmTimeObj <= new Date()) {
          alert(alarm.message);
          alarms.splice(index, 1);
          alarmList.removeChild(alarmItem);
        } else {
          const alarmItem = alarmList.children[index];
          alarmItem.classList.remove('past');
          alarmItem.classList.add('future');
          const alarmTimeDiff = alarmTimeObj - new Date();
          const alarmTimeDiffMinutes = Math.floor(alarmTimeDiff / 60000);
          const alarmTimeDiffSeconds = Math.floor((alarmTimeDiff % 60000) / 1000);
          const alarmTimeDiffText = `dans ${alarmTimeDiffMinutes}m ${alarmTimeDiffSeconds}s`;
          alarmItem.textContent = `${alarm.time} - ${alarm.message} (${alarmTimeDiffText})`;
        }
      });
    }, 1000);
  }
});
