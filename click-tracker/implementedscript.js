<script>

    const requestUrl = 'http://click-tracker/api/position'; //Адрес сервера
    const statistics = [];

    function sendRequest(method, url, body) {
        return fetch(url, {
            method: method,
            body: JSON.stringify(body),
            keepalive: true,
            headers: {
                'Content-Type' : 'application/json'
            }
        }).then(response => {
            return response
            })
    }

    const e = document.body;
    document.onclick = function(e) {
        let x = e.pageX;
        let y = e.pageY;

        statistics.push({
                pos_x: x,
                pos_y: y,
        });
    }

    window.onunload = function() {
        sendRequest('POST', requestUrl, statistics)
            .then(data => console.log(data))
            .catch(err => console.log(err));
    }


</script>