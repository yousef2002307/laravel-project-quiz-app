@include('includes/header2')
<div class="main">
    <h1 style="text-align: center">Admin Login</h1>
    @if (count($errors) > 0)
    @foreach ($errors->all() as $item)
    <p>{{$item}}</p>
    @endforeach
    
@endif
@if (session('adminwronginfo'))
<p>{{session('adminwronginfo')}}</p>
@endif
    <div class="adminlogin">
        <form action="{{route('check2')}}" method="POST">
            @csrf
            @method('POST')
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="adminUser" /></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="adminPass" /></td>
                </tr>
                <tr>
                    <td colspan="2">
                       
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="button_class"><input type="submit" name="login" value="Login"/></td>
                </tr>
            </table>
        </form>
    </div>
    
        <p style="text-align: center; font-size: 15px; padding-top: 30px;"><a style="text-decoration: darkgreen" href="{{route('dashboard')}}">Go to Homepage!</a></p>
    </div>

@include('includes/footer')