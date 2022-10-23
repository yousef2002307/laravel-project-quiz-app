<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

   <script src="{{asset('js/jq.js')}}"></script>
   <script>
      $(function () {
        let bool = false;
    let correctAnswers = 0;
    let id = '-1';
    let count =0;
          $("body").on("click",".start2",function(){
      $('.main').load("{{url('/ajax')}}");
      });

     
    /* clicking on next */
$("body").on("click",".active .next20",function(){
   
   count++;
  
   $(this).parents(".test").next(".test").addClass("active");
   $(this).parents(".test").removeClass("active");
   if(bool && id == '1'){
       correctAnswers++;
       bool = false;
       id = '-1';
   }
   if(count == 5){
       $(".main").html(`
       <h1>You are done!</h1>
       <div style="text-align: center" class="starttest">
           <br/>
           <p>Congratulation! You have just completed the test.</p>
           <strong style="color: #444444">Final Score: ${correctAnswers}
          
           </strong>
       
           <br/>
           <br/>
           <br/>
           <a style="border-color: green;" href="{{url('/rightAns')}}">View Right Answer</a>
           <a style="border-color: green;" href="{{url('/dashboard')}}">Start Test Again.!</a>
       </div>
       `);
           }
   console.log(correctAnswers,count);

});
////////////////////////////////////////////////////
$("body").on('click',".test form input[type='radio']",function(){
bool = true;
id =$(this).data('id');

});
      });
              </script>
</body>

</html>