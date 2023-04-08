
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Server stats</title>
    <style>
      table, td {
        border: 1px solid #333;
      }

      thead {
        background-color: #333;
        color: #fff;
      }
    </style>
  </head>
  <body>
    <h1 id="rss"></h1>
    <script>
      (function() {
        const rss = document.getElementById('rss');

        // will not use tls if the connection is not made over https
        const protocol = window.location.protocol.includes('https') ? 'wss': 'ws'
        const ws = new WebSocket(`wss://time.flimdeal.nl`);


        var countDownDate = new Date("2023-03-21 23:25:00").getTime();

        ws.onmessage = function(event) {
          var now = event.data;

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations fo r days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          rss.textContent = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";;
          
        };
      })();
    </script>
  </body>
</html>