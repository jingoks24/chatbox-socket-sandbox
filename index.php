<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat Sandbox - Socket.IO</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
        * {
            margin: 0;
            padding: 0;
        }
        .chat-body {
            /* width: 800px; */
            height: 100vh; 
            /* margin: auto; */
            position: relative;
            /* transform: translateX(-50%,-50%); */
            /* margin-top: 50px; */
        }
        .chat-box {
            background-color: #6B7076;
            height: 100%;
        }
        .side-bar {
            background-color:#373B3E;
            color:white;
        }
        body {
            background-color: #E1F7E7;
            width: 100%;
            height: 100%;
        }

        #message {
            height: 78%;
            background-color: #F1F1F5;
            margin: 10px 1px 0 1px;
            border-radius: 5px;
        }
        #m {
            height: 100%;
        }
        form{
            height: 20%;
            padding: 16px;
        }
    </style>
    

</head>
<body>
    
    <div class="container-fluid">
        <div class="row chat-body">
            <div class="col-sm-4 col-md-3 col-lg-2 side-bar">
                left chorva
            </div>
            <div class="col-sm-8 col-md-9 col-lg-10 chat-box">
                <div class="row" id = "message">
                        <ul id = "messages" class=" p-4"></ul>
                </div>
                <form action="" class="row">
                    <input id="m" autocomplete="off" class="col-9"/>
                    <button class="col-3 btn"> Send </button>
                </form>
            </div>
        </div>
    </div>
    
    <script src="/socket.io/socket.io.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </script>

    <script>
        $(function(){
            let socket = io();
            $('form').submit(function(){
                socket.emit('chat message', $('#m').val());
                $('#m').val('');
                return false;
            });
            socket.on('chat message', function(msg){
                $('#messages').append($('<li>').text(msg));
            });
        });
    </script>
</body>
</html>