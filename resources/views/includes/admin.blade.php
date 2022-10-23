
<!doctype html>
<html>
<head>
	<title>quiz app</title>
  <meta charset='UTF-8' />
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


  <link rel="stylesheet" href="{{asset('css/admin.css')}}" type='text/css' />
	
</head>
<body>
<div class="phpcoding">
	<section class="headeroption"></section>

    

		<section class="maincontent">
		<div class="menu">
		<ul>
			<li><a href="{{route('admin1')}}">Home</a></li>
			<li><a href="{{route('manageusers')}}">Manage User</a></li>
			<li><a href="{{route('addque')}}">Add Question</a></li>
			<li><a href="{{route('quelist')}}">Question List</a></li>
           
			<li><a href="{{route('adminlogout')}}">Logout</a></li>
		</ul>
	 </div>
	