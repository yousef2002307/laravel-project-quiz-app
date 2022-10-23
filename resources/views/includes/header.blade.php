<!DOCTYPE html>
<html>

<head>

  <title>quiz app</title>
  <meta charset='UTF-8' />
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


  <link rel="stylesheet" href="{{asset('css/style.css')}}" type='text/css' />

</head>



<body>
    <div class="phpcoding">
        <section class="headeroption"></section>
            <section class="maincontent">
            <div class="menu">
                @if (!session('id'))
                    
              
            <ul>
                
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Register</a></li>
              
           
             
    
               
            </ul>
    
            
        @else
        <ul>
                
            <li><a href="{{route('profile')}}">profile</a></li>
            <li><a href="{{route('logout')}}">logout</a></li>
          
       
         

           
        </ul>

        
            @endif
              
                <span style="float: right; color: #888">
                    Welcome <strong>jo</strong>
                </span>
            
            </div>
