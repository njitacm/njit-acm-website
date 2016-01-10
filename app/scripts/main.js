/*!
 *
 *  Web Starter Kit
 *  Copyright 2015 Google Inc. All rights reserved.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *    https://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License
 *
 */
(function() {
  'use strict';

  // Check to make sure service workers are supported in the current browser,
  // and that the current page is accessed from a secure origin. Using a
  // service worker from an insecure origin will trigger JS console errors. See
  // http://www.chromium.org/Home/chromium-security/prefer-secure-origins-for-powerful-new-features
  if ('serviceWorker' in navigator &&
      (window.location.protocol === 'https:' ||
       window.location.hostname === 'localhost' ||
       window.location.hostname.indexOf('127.') === 0)) {
    navigator.serviceWorker.register('/service-worker.js', {
      scope: './'
    }).then(function(registration) {
      // Check to see if there's an updated version of service-worker.js with
      // new files to cache:
      // https://slightlyoff.github.io/ServiceWorker/spec/service_worker/index.html#service-worker-registration-update-method
      if (typeof registration.update === 'function') {
        registration.update();
      }

      // updatefound is fired if service-worker.js changes.
      registration.onupdatefound = function() {
        // updatefound is also fired the very first time the SW is installed,
        // and there's no need to prompt for a reload at that point.
        // So check here to see if the page is already controlled,
        // i.e. whether there's an existing service worker.
        if (navigator.serviceWorker.controller) {
          // The updatefound event implies that registration.installing is set:
          // https://slightlyoff.github.io/ServiceWorker/spec/service_worker/index.html#service-worker-container-updatefound-event
          var installingWorker = registration.installing;

          installingWorker.onstatechange = function() {
            switch (installingWorker.state) {
              case 'installed':
                // At this point, the old content will have been purged and the
                // fresh content will have been added to the cache.
                // It's the perfect time to display a "New content is
                // available; please refresh." message in the page's interface.
                break;

              case 'redundant':
                throw new Error('The installing ' +
                                'service worker became redundant.');
            }
          };
        }
      };
    }).catch(function(e) {
      console.error('Error during service worker registration:', e);
    });
  }

  // Your custom JavaScript goes here

  $(document).ready(function() {

    $('#calendar').fullCalendar({
  		googleCalendarApiKey: 'AIzaSyDMz_FvSnQ4_Lg-tamBTc_IPwIyyeKP5vE',
      eventSources: [{
          googleCalendarId: '9niid0lakg17i3rblct46bcafo@group.calendar.google.com',
        },{
          googleCalendarId: 'njitacm@gmail.com',
          className : 'red-color'
        },{
          googleCalendarId: 'cg9i3g9ierto8cdoqk8ve0pgms@group.calendar.google.com',
          className : 'purple-color'
        },{
          googleCalendarId: 'red91jue5povm3qv0losa5u8vg@group.calendar.google.com',
        },{
          googleCalendarId: 'hjpuc0eb814l7soblb58g3q66k@group.calendar.google.com'
      }],
  		defaultView : 'agendaWeek',
  		minTime : '08:00:00',
  		maxTime : '22:00:00',
  		height : 700,
  		allDaySlot : false,
  		hiddenDays : [0,6]
  	});
  });

  $('#calendar-tab').click(function(){
  	 $('#calendar').fullCalendar('render');
  });

  var clickedStream = false;

  $('#stream-tab').click(function(){
    if(!clickedStream)
    {
      var stream = $('#streamDiv');
      stream.html('<iframe src="http://player.twitch.tv/?channel=sigmelee" frameborder="0" scrolling="no" height="378" width="620"></iframe><a href="http://www.twitch.tv/sigmelee?tt_medium=live_embed&tt_content=text_link" style="padding:2px 0px 4px; display:block; font-weight:normal; font-size:10px;text-decoration:underline;">Watch live video from sigmelee on www.twitch.tv</a><iframe src="http://www.twitch.tv/sigmelee/chat?popout=" frameborder="0" scrolling="no" height="378" width="620"></iframe>');
      clickedStream = true;
    }
  });

})();
