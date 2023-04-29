
'use strict';

const express = require('express');
const path = require('path');
const Pusher = require('pusher');
const { createServer } = require('http');

const WebSocket = require('ws');

const app = express();
app.use(express.static(path.join(__dirname, '/public')));

const server = createServer(app);

const pusher = new Pusher({
  appId: "7808949f-788d-4920-aa36-a0fe0e2add61",
  key: "eb305f9b-e78d-48c9-a0dd-f422e2339ae4",
  secret: "CXZ6fpziGWZW9kEhodZ0Xzr9mB962UVO",
  useTLS: true, // optional, defaults to false
  host: "soketi-37ecf4ab-bace-49ad-af1a-7376ae6190a6.info2272.workers.dev", // optional, defaults to api.pusherapp.com
  port: 443, // optional, defaults to 80 for non-TLS connections and 443 for TLS connections
})

// const wss = new WebSocket.Server({ server });

// wss.on('connection', function (ws) {
  
//   console.log('started client interval');

//   ws.on('close', function () {
//     console.log('stopping client interval');
//     clearInterval(id);
//   });
// });

server.listen(8080, function () {
  console.log('Listening on http://0.0.0.0:8080');
  const id = setInterval(function () {
    var d = new Date();
    var time = d.getTime();
    pusher.trigger('time', 'App\\Events\\SetTime', {time: time});
  }, 500);
});