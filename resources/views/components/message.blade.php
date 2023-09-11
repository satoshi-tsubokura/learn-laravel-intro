<style>
  .message {
    border: double 4px #ccc;
    margin: 10px;
    padding:10px;
    background-color: #fafafa;
  }

  .msg_title {
    margin: 10px 20px;
    color: #999999;
    font-size: 16pt;
    font-weight: bold;
  }

  .msg_content { 
    margin: 10px 20px;
    color: #aaa;
    font-size: 12pt;
  }

  .message.is-danger {
    border-color: red;
    background-color: #ffeeee;
  }

  .message.is-warn {
    border-color: #d8d800;
    background-color: #ffffdc;
  }

  .message.is-danger .msg_title {
    color: rgb(197, 0, 0);
  }
 
  .message.is-danger .msg_content {
    color: rgb(255, 107, 107);
  }

  .message.is-warn .msg_title {
    color: #ffff00;
  }

  .message.is-warn .msg_content {
    color: #d8d800;
  }
</style>
<div class="message is-{{$type}}">
  <p class="msg_title">{{$msg_title}}</p>
  <p class="msg_content">{{$msg_content}}</p>
</div>