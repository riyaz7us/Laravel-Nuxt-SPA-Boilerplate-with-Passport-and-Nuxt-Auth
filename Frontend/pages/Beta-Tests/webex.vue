<template>
<div>
    <form id="destination">
      <input
        id="invitee"
        name="invitee"
        placeholder="Person ID or Email Address or SIP URI or Room ID"
        type="text"
       />
        <input title="join" type="submit" value="join" />
    </form>

		      <form id="constraints">
        <fieldset>
          <legend>Constraints</legend>
          <input id="constraints-audio" title="audio" type="checkbox" checked>
          <label for="constraints-audio">Audio</label>
          <input id="constraints-video" title="video" type="checkbox" checked>
          <label for="constraints-video">Video</label>
        </fieldset>
      </form>

    <div style="display: flex">
      <video style="width:50%" id="self-view" muted autoplay></video>
      <div style="width:50%">
        <audio id="remote-view-audio" autoplay></audio>
        <video id="remote-view-video" autoplay></video>
      </div>
    </div>

    <button id="hangup" title="hangup" type="button">cancel/hangup</button>
		</div>

</template>
<script>
export default {

mounted(){

	const myAccessToken = 'ZDA3ODg0YTEtYWE0Yi00NjkzLTgyNDctZDE3ODY2MzRhYWVhMzNlZTUxZjktOTQy_P0A1_e0796e43-9341-40de-87ea-bfc92d9028a9';

if (myAccessToken === 'YOUR_ACCESS_TOKEN') {
  alert('Make sure to update your access token in the index.js file!');
  return;
}
const Webex = require('webex');

const webex = Webex.init({
  credentials: {
    access_token: myAccessToken
  }
});

webex.config.logger.level = 'debug';


webex.meetings.register()
  .catch((err) => {
    console.error(err);
    alert(err);
    throw err;
  });

function bindMeetingEvents(meeting) {
  meeting.on('error', (err) => {
    console.error(err);
  });

  // Handle media streams changes to ready state
  meeting.on('media:ready', (media) => {
    if (!media) {
      return;
    }
    if (media.type === 'local') {
      document.getElementById('self-view').srcObject = media.stream;
    }
    if (media.type === 'remoteVideo') {
      document.getElementById('remote-view-video').srcObject = media.stream;
    }
    if (media.type === 'remoteAudio') {
      document.getElementById('remote-view-audio').srcObject = media.stream;
    }
  });

  // Handle media streams stopping
  meeting.on('media:stopped', (media) => {
    // Remove media streams
    if (media.type === 'local') {
      document.getElementById('self-view').srcObject = null;
    }
    if (media.type === 'remoteVideo') {
      document.getElementById('remote-view-video').srcObject = null;
    }
    if (media.type === 'remoteAudio') {
      document.getElementById('remote-view-audio').srcObject = null;
    }
  });

  // Of course, we'd also like to be able to leave the meeting:
  document.getElementById('hangup').addEventListener('click', () => {
    meeting.leave();
  });
}

// Join the meeting and add media
function joinMeeting(meeting) {

  return meeting.join().then(() => {
    const mediaSettings = {
      receiveVideo: true,
      receiveAudio: true,
      receiveShare: false,
      sendVideo: true,
      sendAudio: true,
      sendShare: false
    };

    // Get our local media stream and add it to the meeting
    return meeting.getMediaStreams(mediaSettings).then((mediaStreams) => {
      const [localStream, localShare] = mediaStreams;

      meeting.addMedia({
        localShare,
        localStream,
        mediaSettings
      });
    });
  });
}

document.getElementById('destination').addEventListener('submit', (event) => {
  // again, we don't want to reload when we try to join
  event.preventDefault();

  const destination = document.getElementById('invitee').value;

  return webex.meetings.create(destination).then((meeting) => {
    // Call our helper function for binding events to meetings
    bindMeetingEvents(meeting);

    return joinMeeting(meeting);
  })
  .catch((error) => {
    // Report the error
    console.error(error);
  });
});
}


}
</script>

<style>

</style>