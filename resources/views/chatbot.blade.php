<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot Laravel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        .chat-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 10px;
        }
        .user-message {
            background-color: #e5e5ea;
            text-align: right;
            align-self: flex-end;
        }
        .bot-message {
            background-color: #007bff;
            color: white;
            align-self: flex-start;
        }
        #chat {
            display: flex;
            flex-direction: column;
            height: 400px;
            overflow-y: auto;
        }
        .disabled {
            opacity: 0.5;
            pointer-events: none;
        }
        .chat-input {
            display: flex;
            margin-top: 10px;
        }
        .chat-input input {
            flex-grow: 1;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .chat-input button {
            border-top-left-radius: 0;
            border-bottom-left-radius: 0;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="chat-container">
            <h1 class="text-center mb-4">Laravel avec Bin Abdallah 😇</h1>
            <div id="chat" class="border rounded p-3 mb-3">
                <!-- Messages will appear here -->
            </div>
            <form id="chat-form" class="chat-input">
                <input type="text" id="question" name="question" class="form-control" placeholder="Posez votre question ici..." required>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatForm = document.getElementById('chat-form');
            const chatArea = document.getElementById('chat');
            const questionInput = document.getElementById('question');
            const submitButton = chatForm.querySelector('button');

            chatForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const question = questionInput.value.trim();
                if (question) {
                    appendMessage(question, 'user');
                    disableForm();
                    sendQuestion(question);
                    questionInput.value = '';
                }
            });

            function appendMessage(message, sender) {
                const messageDiv = document.createElement('div');
                messageDiv.className = `message ${sender === 'user' ? 'user-message' : 'bot-message'}`;
                messageDiv.innerHTML = message;
                chatArea.appendChild(messageDiv);
                chatArea.scrollTop = chatArea.scrollHeight; // Scroll to the bottom
            }

            function sendQuestion(question) {
                fetch('/chatbot', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({question: question})
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    appendMessage(data.answer, 'bot');
                    enableForm();
                })
                .catch(error => {
                    console.error('Error:', error);
                    appendMessage('Une erreur est survenue. Veuillez réessayer.', 'bot');
                    enableForm();
                });
            }

            function disableForm() {
                chatForm.classList.add('disabled');
                submitButton.disabled = true;
            }

            function enableForm() {
                chatForm.classList.remove('disabled');
                submitButton.disabled = false;
            }
        });
    </script>
</body>
</html>
