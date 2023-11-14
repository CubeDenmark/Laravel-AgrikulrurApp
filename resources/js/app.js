import './bootstrap';
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


$(document).ready(function() {
    $('#sendmess').click(function() {
        var message = $('#input-message').val();
        
        //axios.get('/chat-message', {
        axios.post('/chat-message', {
            message: message,
        })
    })
})
    
    /*
    $(document).ready(function() {
        $('#sendmess').click(function(event) {
            event.preventDefault();
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
*/
/*const channel = Echo.join('pressence.chat.1');

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
})*/



















/* Example of listening for the 'NewMessageEvent' event
window.Echo.channel('chats').listen('.recieve.message', (data) => {
    // Handle the received data (message) here
    console.log('New message received:', data.message);
    
    // Update your UI with the new message (e.g., add it to a chat window)
    updateUIWithNewMessage(data.message);
});

function updateUIWithNewMessage(message) {
    // Update your chat window or message container
    const messageContainer = document.getElementById('message-container');
    const newMessageElement = document.createElement('div');
    newMessageElement.textContent = message;
    messageContainer.appendChild(newMessageElement);
}

//window.Echo.channel('chats').listen('.recieve.message', (data) => {
//    alert('Message receive: ', data.message);
//})
*/
