@include('includes/admin')
<div class="main">
    <h1 style="text-align: center; font-size: 24px">Manage User</h1>

    

      <div class="manageuser">
         <table class="tblone">
             <tr>
               <th>No</th>
               <th>Name</th>
              
               <th>Email</th>
               <th>Action</th>
             </tr>

          @foreach ($users as $item)
              
       
             <tr>
               <td>
                  {{$item->id}}
               </td>
               <td>
                {{$item->name}}
               </td>
             
               <td> {{$item->email}}</td>
               <td >

                  
                        
                         
                          <form action="{{route("deletemember",$item->id)}}" style="display:inline-block" method="post" onsubmit="return confirm('Are You Sure to Remove?')">
                            @csrf
                            @method('DELETE')
                            
                         
                   | <input type='submit' value="delete" style="color: red; text-decoration: none"  />
                 
                  </form>
                  </td>
             </tr>
             @endforeach
            

         </table>
     </div>
</div>

@include('includes/footer')