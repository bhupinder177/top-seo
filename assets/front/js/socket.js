var socket = io('http://localhost:5000');
var senderId = $(".sessionId").val();
 // console.log(senderId);
 // console.log('sessionId');

function socketjoinchat(id)
{
  var senderId = $(".sessionId").val();
  socket.emit('join-chat', { senderId: senderId,receiverId : id });
}



socket.on('messages', function(msg)
{
  console.log(msg);

});
