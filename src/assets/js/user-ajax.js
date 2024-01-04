'use strict';

const startButton = document.getElementById('startGame');

function sendAjaxRequest(action, data = {}, ajaxUrl = 'index.php') {
  return $.ajax({
    type: 'POST',
    url: ajaxUrl + '?action=' + action,
    data: data,
    dataType: 'json',
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response.success) {
        console.log(response.message);
      } else {
        console.error(response.error);
      }
    },
  });
}

const startGameRequest = () => {
  var source = new EventSource('index.php?action=start');

  source.onmessage = function (event) {
    const data = JSON.parse(event.data);
    if (data.action === 'win' || data.action === 'draw') {
      source.close();
      animate('die', false);
    } else {
      document.getElementById('arena').innerHTML += data.action + '<br>';
    }
  };
};
let animationInterval;
const animate = (action, infinite = true) => {
  action = action.toUpperCase();
  const imagesPath = 'src/assets/images/knight/';
  const images = [
    imagesPath + `Knight_01__${action}_000.png`,
    imagesPath + `Knight_01__${action}_001.png`,
    imagesPath + `Knight_01__${action}_002.png`,
    imagesPath + `Knight_01__${action}_003.png`,
    imagesPath + `Knight_01__${action}_004.png`,
    imagesPath + `Knight_01__${action}_005.png`,
    imagesPath + `Knight_01__${action}_006.png`,
    imagesPath + `Knight_01__${action}_007.png`,
    imagesPath + `Knight_01__${action}_008.png`,
    imagesPath + `Knight_01__${action}_009.png`,
  ];
  let index = 0;

  clearInterval(animationInterval);

  animationInterval = setInterval(function () {
    const imgElement = document.getElementById('player-one');
    imgElement.src = images[index];
    if (infinite) {
      index = (index + 1) % images.length;
    } else {
      index = (index + 1) % images.length;
      if (index === 0) {
        clearInterval(animationInterval);
      }
    }
  }, 150);
};

animate('idle');

startButton.addEventListener('click', startGameRequest);
