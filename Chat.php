<style>
/* Button used to open the chat form - fixed at the bottom of the page */
.openForm {
  position: fixed;
  bottom: 23px;
  right: 25px;
  width: 65x;
  color:#0078FF;
  border: 2px ;
  display:block;
  cursor:pointer;
}


.msg-texts{
  background-color: #f0f0f0;
   position:relative;
    border-radius: 25px;
    box-shadow: rgba(0, 0, 0, 0.12) 0px 1px 6px, rgba(0, 0, 0, 0.12) 0px 1px 4px;
    max-width: 300px;
    padding: 10px 10px;
    margin: 10px 10px;
    text-align: left;
    transition: all 0.5s;
    vertical-align: top;
    white-space: normal;
    z-index: 1;
}

.ai-image img{
  width:48px;
  height:48px;
}
.toggle {
  display:flex !important;
  flex-direction:column;
}
.message-container{
 background:white;
  width:100%;
  text-wrap:wrap;
  word-break:break-all;
  overflow-y:auto;
  height: 380px;
}
/* The popup chat - hidden by default */
.chat-popup {
  display: none;
  position: fixed;
  bottom: 80px;
  right: 15px;
  width:400px;
  height:400px;
  border: 3px solid #f1f1f1;
  z-index: 999;
  
  box-shadow: 0 -6px 99px -17px rgba(0, 0, 0, 0.68);
}




/* Add styles to the form container */
.form-container {
  height:3rem;
  background-color: white;
}



/* Full-width textarea */
.form-container textarea {
  border-top: 1px solid #e6eaee;

  width: 100%;
  border: none;
  background: white;
  resize: none;
  min-height: 20px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}



.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}


</style>

<div class="openForm" onclick="openForm()">
    <i class='far fa-comments px-1'  style='font-size:26px'> Chat</i>
</div>
<div class="chat-popup" id="myForm">
<div class="message-container">
<ul class="message">
<li class="msg-wrapper d-flex">
  <div class="ai-image">
  <img src="/E-Commerce/public/images/Home.png"/>
  </div>

  <p class="msg-texts">  
Hello, I’m Genie, your virtual assistant. I'm here to help with your general enquiries.</p>
</li>
</ul>
</div>
  <form class="form-container d-flex" >
    <textarea placeholder="Type message.." name="msg" id="myText" required></textarea>

    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane" aria-hidden="true"></i>
</button>
  </form>
</div>


<script>

document.querySelector(".form-container").addEventListener("submit",function(event){
  event.preventDefault();
  myFunction();
  scrollToBottom()
})

function myFunction() {
  var myText = document.getElementById("myText").value;
  var msgContainer = document.querySelector(".message")
  var msg = document.createElement("li")
  msg.classList.add("msg-texts")

 
  console.log(myText)
  if (myText.match(/hi.*/gi)) {

    msg.textContent = "Hello there. How can I help you?"
    msgContainer.appendChild(msg);
   
  }

  else if (myText.match(/software.*/gi)) {

    msg.textContent = "Please browse softwares on the home page"
    msgContainer.appendChild(msg);
   
  }
  else if (myText.match(/Wh.*/gi)) {

    msg.textContent = "Thats a good question. Did you try using the search function?"
    msgContainer.appendChild(msg);
		
   
  }
  else if (myText.match(/user.*/gi)) {

    msg.textContent ="Its in the user/admin page"
    msgContainer.appendChild(msg);

   
  }
  else if (myText.match(/community.*/gi)) {

    
    msg.textContent = "Check community page"
    msgContainer.appendChild(msg);
   
  }
  else{
    msg.textContent = "Sorry I didn't get your query. Please enter differnt keyword. "
    msgContainer.appendChild(msg);
  }

  }
  var toggle = true;


  function scrollToBottom(){
    var msgContainer = document.querySelector(".message")
    msgContainer.scrollTop = msgContainer.scrollHeight - msgContainer.clientHeight

  }
function openForm() {

    document.getElementById("myForm").classList.toggle("toggle")
 

  
}

</script>


