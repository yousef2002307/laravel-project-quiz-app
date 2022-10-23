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
        <h1 style="text-align: center; font-size: 24px">Add Question</h1>

      

        <div class="adminpanel">
            <form action="{{route('addque2')}}" method="post">
                @csrf
                <table>
                    <tr>
                        <td>Question No</td>
                        <td>:</td>
                        <td><input type="number" value="{{++$num}}" name="quesNo"/></td>
                    </tr>
                    <tr>
                        <td>Question</td>
                        <td>:</td>
                        <td><input type="text" name="ques" placeholder="Enter a Question" required=""/></td>
                    </tr>
                    <tr>
                        <td>Choice One</td>
                        <td>:</td>
                        <td><input type="text" name="ans1" placeholder="Enter Choice One..." required=""/></td>
                    </tr>
                    <tr>
                        <td>Choice Two</td>
                        <td>:</td>
                        <td><input type="text" name="ans2" placeholder="Enter Choice Two..." required=""/></td>
                    </tr>
                    <tr>
                        <td>Choice Three</td>
                        <td>:</td>
                        <td><input type="text" name="ans3" placeholder="Enter Choice Three..." required=""/></td>
                    </tr>
                    <tr>
                        <td>Choice Four</td>
                        <td>:</td>
                        <td><input type="text" name="ans4" placeholder="Enter Choice Four..." required=""/></td>
                    </tr>
                    <tr>
                        <td>Correct No</td>
                        <td>:</td>
                        <td><input type="number" name="rightAns" required=""/></td>
                    </tr>
                    <tr>
                        <td class="button_class" colspan="3" align="center">
                            <input style="color: green;" type="submit" value="Add a Question" required=""/>
                        </td>
                    </tr>

                </table>
            </form>
        </div>



    </div>


@include('includes/footer')