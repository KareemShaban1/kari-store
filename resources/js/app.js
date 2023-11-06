import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


// listing in private channel
var channel = Echo.private(`App.Model.Admin.${userID}`);

// listing on notification event
channel.notification(function(data) {
  console.log(data);
  alert(data.body);
  // alert(JSON.stringify(data));
});