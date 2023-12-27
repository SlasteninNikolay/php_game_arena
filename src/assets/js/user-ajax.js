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
    if (event.data === '[DONE]') {
      source.close();
    } else {
      document.getElementById('arena').innerHTML += event.data + '<br>';
    }
  };
};

startButton.addEventListener('click', startGameRequest);
