@include('includes/header')




  <div class="main">
    <h1>Online Exam System - Your Profile </h1>
 
   
    

      @if (session("updmsg"))
        <p class="updated">  {{session('updmsg')}} </p>
      @endif


    <div class="profile">
        <form action="{{route("update",session("id"))}}" method="post">
            @csrf
            @method("PUT")
            
            <table class="tbl">
               
                <tr>
                    <td>Username</td>
                    <td><input required name="username" type="text" value="{{session('name')}}" ></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input required name="email" type="text" value="{{session('email')}}" ></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input name="password" type="password" value="" ></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="button_class"><input type="submit" value="Update">
                    </td>
                </tr>
            </table>

           

        </form>
</div>
</div>
@include('includes/footer')