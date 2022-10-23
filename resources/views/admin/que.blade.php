@include('includes/admin')


  <style>
      .adminpanel{
          border: 1px solid #dddddd;
          border-radius: 12px;
          color: #999999;
          margin: 18px auto 0;
          padding: 15px;
          width: 650px;
      }
  </style>

   

    <div class="main">
        <h1 style="text-align: center; font-size: 24px">Question List</h1>

      

        <div class="queslist">
            <table class="tblone">
                <tr>
                    <th width="10%">No</th>
                    <th width="75%">Questions</th>
                    <th width="15%">Action</th>
                </tr>

              @foreach ($que as $item)
                  
           

                        <tr>
                            <td>{{$item->quesNo}}</td>
                            <td>{{$item->ques}}</td>
                            <td>
                                <form action="{{route("deleteque",$item->id)}}" style="display:inline-block" method="post" onsubmit="return confirm('Are You Sure to Remove?')">
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