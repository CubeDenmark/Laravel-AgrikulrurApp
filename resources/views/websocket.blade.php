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

        
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- 
        <script>>
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