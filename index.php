<!DOCTYPE html>
<html lang="en">
   <head>
      <title>PHP Assignment</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

      <script type="text/javascript">
        function timeout(){
          var minute = Math.floor(timeLeft/60);
          var second = timeLeft%60;
          var mint = checktime(minute);
          var sec = checktime(second);
          if(timeLeft < 0){
            clearTimeout(tm);
            alert("Time is over refresh the page to fill the form");
            location.reload();
          }
          else{
            document.getElementById("time").innerHTML=mint+":"+sec;
          }
          timeLeft--;
          var tm = setTimeout(function(){timeout()},1000);
        }
        function checktime(msg){
          if(msg<10){
            msg="0"+msg;
          }
          return msg;
        }
      </script>

   </head>
   <body onload = "timeout()">
      <div class="container" >
         <div class="row" style="border: 1px solid black;margin:10px;padding:10px;">
            <div class="col-sm-12">
               <h4 style="background-color:red;padding:5px">
                 Captcha Form
                 <script>
                   var timeLeft=3*60;
                 </script>
                 <div id = "time" style = "float:right">
                   
                 </div>
                </h4>
                <h5 style="background-color:skyblue;padding:5px">Fill this form within 3 minutes otherwise page will get reloaded.</h5>
               
               <form method = "post" id="frmCaptcha">
                  <div class="form-group">
                     <label>Name:</label>
                     <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                  </div>
                  <div class="form-group">
                     <label>Email:</label>
                     <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                  </div>
                  <div class="form-group">
                     <label>Date of Birth:</label>
                     <input type="text" class="form-control" id="dob" placeholder="dd-mm-yyyy" name="dob">
                  </div>
                  <div class="form-group">
                     <label>About Yourself:</label>
                     <textarea class="form-control" id="about" placeholder="About" name="about"></textarea>
                  </div>
				  
				          <div class="form-group">
                    <div class="row">
                      <div class="col-lg-10">
                        <label>Captcha:</label>
                        <input type="text" class="form-control" id="captcha" placeholder="Enter captcha" name="captcha">
                      </div>
                      <div class="col-lg-2" style="margin-top:25px;">
                        <img src="captcha.php"/>
                      </div>
                    </div>	
                  </div>
                  <button type="button" style="background-color:green;color:white;" class="btn btn-default" onclick="submit_data()">Submit</button>
               </form>
            </div>
         </div>
      </div>
	  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	  <script>
	  function submit_data(){
      jQuery.ajax({
        url:'insert.php',
        type:'post',
        data:jQuery('#frmCaptcha').serialize(),
        success:function(data){
          alert(data);
        }
      });
	  }
	  </script>
   </body>
</html>