<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/js/app.js')
</head>
<body>
            <ul id="List-messages">
                
            </ul>
 
            <input id="input-message" type="text" placeholder="Message....">
            <button id="sendmess">Send</button>
            <br><br>
            <input id="input-id" type="nuber" placeholder="To User #id">

        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script type="module">
        const channel = Echo.join('pressence.chat.{{ Auth::user()["id"] }}');

            channel.here( (users) => {
                var userOnline = [users];

                console.log({users})
                console.log('subscribed!');
            })
            .joining((user) => {
                console.log({user}, ' joined')
            })
            .leaving((user) => {
                console.log({user}, ' Leaving')
            })


            .listen('.chat-message', (event) => {
                console.log(event);

                var message = event.message;
                var username = event.user['name'];
                var ListMessage = document.getElementById("List-messages");
                var Li = document.createElement('li');
                Li.textContent = username + ' : ' + message;

                ListMessage.append(Li);
            });
    </script>

    <!-- 
        <script>
        $(document).ready(function() {
        $('#sendmess').click(function() {
            var message = $('#input-message').val();
            if (message.trim() !== '') {
                // AJAX request to send the message to the server
                $.ajax({
                    method: 'GET',
                    url: '/chat-message', // Replace with your route
                    data: { message: message },
                    success: function(response) {
                        // Handle success if needed
                        console.log('Message sent successfully: ', response);
                    },
                    error: function(xhr, status, error) {
                        // Handle error if needed
                        console.log('Error sending message: ', error);
                    }
                });
            }
            });
        });
        </script>
        <script type="module">
            const channel = window.Echo.channel('public.chat.1');

            channel.subscribed( () => {
                console.log('subscribed!');
            }).listen('.chat-message', (event) => {
                console.log(event);
            })
        </script>

        -->

</body>
</html>