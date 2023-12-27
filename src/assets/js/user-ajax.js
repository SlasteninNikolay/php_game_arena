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
  sendAjaxRequest('start');
};

startButton.addEventListener('click', startGameRequest);
