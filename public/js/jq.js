$(document).ready(function(){
    
$('.x3').click(function (e) { 
    alert("mansjsbs shsjs");
    
});

////////////////stop default on main
$(".main li a.start").click(function (e) { 
    e.preventDefault();
    $(this).parents(".main").html(`
   
    <h1>Welcome to Online Exam</h1>
    <div style="text-align: center" class="starttest">
        <h2>Test Your Knowledge!</h2>
        <p>This is multiple choice quiz to test your knowledge.</p>
        <ul>
            <li><strong>Number of Questions: </strong>5 </li>
            <li><strong>Question Type: </strong>Multiple Choice</li>
        </ul>
        <br/>
        <br/>

        <button class='start2' style="color: green; border-color: green; border-radius: 13px" >Start Test Now!</button>
    </div>

    `);
});
/////////////////////////////////////////////////////////////////////


    });
    