//Server
let app = require('express')();

//Service
let http = require('http').Server(app);

//Machine 
let io = require('socket.io')(http);


//Route
app.get('/', function(req, res){
    res.sendFile(__dirname + '/index.html');
});

//Machine instructions
io.on('connection', function(socket){
    console.log('///////////////////////a user connected: ',io);
    //socket event handler
    socket.on('disconnect', function(){
        console.log('user disconnected');
    });

    socket.on('chat message', function(msg){
        io.emit('chat message', msg);
      });
});

//port
http.listen(3000, function(){
    console.log('listening on *:3000');
});