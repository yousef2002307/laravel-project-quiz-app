@include('includes/header')
<div class="main">
   
    @foreach ($ques as $item)
    <div class="test active">
        <h1>Question {{ $item->quesNo }} of 5</h1>
        <h4>
            Ques {{ $item->quesNo }}: {{$item->ques}} </h4>
            <form>
    @foreach ($ans as $item2)
    @if ($item->quesNo == $item2->quesNo)
      @if ($item2->rightAns == '0')
      <div class="form-group">
        <input  type="radio" /> {{ $item2->ans }}

        </div>
              
          @else
          <div class="form-group">
            <input  type="radio" /> <span style="color: blue"> {{ $item2->ans }} </span>
    
            </div>
                  
              
         
      @endif

      
    @endif
    @endforeach
</div>
    @endforeach
</form> 
      </div>
    

@include('includes/footer')