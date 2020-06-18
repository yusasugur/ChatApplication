<?php

require "db.php" ;
try {
    $messages = $db->query("select * from messages")->fetchAll(PDO::FETCH_ASSOC);

    } catch (\Exception $e) {
      echo "select query error";

    }
    if ( $_SERVER["REQUEST_METHOD"] == "POST") {
      extract($_POST) ;

        $username = $userName ;

    }
    else {
      $username=0;
    }



 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <title>Chattign App</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<style media="screen">
nav{
  position: fixed;
  width: 100%;
}
.info{
 color: grey;
 text-align: center;
}
body{
 background-color: lightblue;
}
footer{
  background-color: grey;
  padding: 10px;
  position: fixed;
  bottom: 0;
  width: 100%;

}
#textarea1{
background-color: white;

}
table{
  height: 70%;
  overflow: auto;
  overflow-x: hidden;

}
</style>
<body>

    <?php if ($username === 0) : ?>
  <div id="modal" class="modal">
    <form action="main.php" method="post" >
    <div class="modal-content">
        <h5 class="center">New User</h5>

        <div class="input-field">
          <input id="userName" type="text" name="userName" >
          <label for="userName">Nickname</label>
        </div>

      </div>
      <div class="send-bm modal-footer">
        <button  class="btn waves-effect waves-light" type="submit" name="action">Add
         <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
  </div>
    <?php endif; ?>

<nav>
  <div class="nav-wrapper">
    <a href="?" class="brand-logo right">Refresh</a>
    <a href="#" data-target="sid" class="sidenav-trigger"><i class="material-icons">menu</i></a>
  </div>
  <ul class="sidenav" id="sid">
    <li class="info">
      <img src="logo.png" class="circle">
      <p class="info">Board v1.0</p>
    </li>
        <li class="divider" tabindex="-1"></li>
    <li><a href="#">Exit</a></li>
  </ul>
</nav>

<div class="">
  <section>
    <table class="striped" id="mytable">
            <tbody>
              <?php foreach ($messages as $key => $value): ?>

                 <td><?php echo $value["created"]; ?></td>
                 <td><?php echo $value["nick"]; ?></td>
                 <td><?php echo $value["content"]; ?></td>

               </tr>
             <?php endforeach; ?>
             </tbody>
    </table>
  </section>


  <footer>

    <div class="row">
      <form class="col s12">
        <div class="row">
          <div class="input-field col s9">
            <textarea id="textarea1" class="materialize-textarea"></textarea>
            <label for="textarea1"></label>
          </div>
          <div class="input-field col s3">
            <a id="send" class="waves-effect waves-light btn-large">send</a>
          </div>
        </div>
      </form>
    </div>

  </footer>
</div>



</body>

<script type="text/javascript">
 $(document).ready(function(){
   $('.sidenav').sidenav();
 });

 $(document).ready(function(){
   $('#modal').modal();
   $('#modal').modal('open');
});

$("#send").click(function(e){
        e.preventDefault();
        let text = $("#textarea1").val() ;
        var info = <?php echo json_encode($username, JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!

        var today = new Date();
        var dd = today.getDate();
        var mm = today.getMonth()+1;
        var yyyy = today.getFullYear();

        if(dd<10)
        {
        dd='0'+dd;
        }

        if(mm<10)
        {
          mm='0'+mm;
}
        today = yyyy+'-'+mm+'-'+dd;

        var d = new Date();
        var min;
        var sec;
        if (d.getMinutes()<10) {
          min="0"+d.getMinutes();
        }
        else {
          min=d.getMinutes();
        }
        if (d.getSeconds()<10) {
          sec="0"+d.getSeconds();

        }
        else {
          sec=d.getSeconds();

        }
        today+=" "+d.getHours()+":"+min+":"+d.getSeconds();

        $("textarea#textarea1").val("") ;
        $('#mytable').append('<tr><td>'+today+'</td><td>'+info+'</td><td>'+text+'</td></tr>');

        $.get("addMsg.php",
              { "user" : info, "msg" : text},
              function(data) {
             },
              "json"
        );


     });



</script>
