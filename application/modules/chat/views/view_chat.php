<?php
?>

<html>
<head>
<title>Chat Box</title>
<link rel="stylesheet" type="text/css" href="CSS/chat.css" />
<script src="http://code.jquery.com/jquery-1.9.0.js"></script>
<script>

    function submitChat(){
                    if(form1.uname.value == '' || form1.msg.value == ''){
                                    alert('ALL FIELDS ARE MANDATORY!!!');
                                    return;
                    }
                    
                    var xmlhttp = new XMLHttpRequest();
                    form1.uname.readOnly = true;
                    form1.uname.style.border = 'none';
                    $('#imageload').show();
                    var uname = form1.uname.value;
                    var msg = form1.msg.value;
                    var url= "chat/insert_chat";
                    var params="uname=uname&msg=msg";
                    
                    xmlhttp.open("POST", url, true);
                    
                    //Send the proper header information along with the request
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.setRequestHeader("Content-length", params.length);
                    xmlhttp.setRequestHeader("Connection", "close");
                    
                    xmlhttp.onreadystatechange = function(){
                        if(xmlhttp.readyState==4&&xmlhttp.status==200){
                            document.getElementById('chatlogs').innerHTML = xmlhttp.responseText;
                            $('#imageload').hide();
                        }
                    }

                    http.send(params);
                    //xmlhttp.send();
    }
	
    $(document).ready(function(e){
        $.ajaxSetup({cache:false});
        setInterval(function() {$('#chatlogs').load('chat/get_chatlogs');}, 2000);
    });

</script>

</head>
<body>
<form name="form1">
Enter Your Chatname: <input type="text" name="uname" style="width:200px;"/><br />
Your Message: <br />
<textarea name="msg" style="width:200px; height:70px"></textarea><br />
<a href="#" onclick="submitChat()" class="button">Send</a><br /><br />

<div id="imageload" style="display:none;">
<img src="1-0.gif" />
</div>

<div id="chatlogs">
LOADING CHATLOGS PLEASE WAIT... <img src="images/1-0.gif" />
</div>


</body>