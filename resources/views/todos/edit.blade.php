@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update Employee Information</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        
       
        <!-- <img src="images/{{ Session::get('image') }}"> -->
        @php 
        $image =  $todo->image;
        @endphp
        <img src = "{{ asset('/images/'.$image) }}" />
        
        <form method="post" action="{{ route('todos.update', $todo->id) }}" enctype="multipart/form-data">
        <div class="row">
    
            <div class="col-md-6">
                 <label for="image">Upload a Photo:</label>
                <input type="file" name="image" class="form-control">
            </div>

            <!-- <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload</button>
            </div> -->

        </div>

           
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="default_text" class="form-control" name="first_name" value={{ $todo->first_name }} >
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="default_text" class="form-control" name="last_name" value={{ $todo->last_name }} >
            </div>

            <div class="form-group"> 
              <label for="middle_initial">Middle Initial:</label>
              <input type="text" class="form-control" name="middle_initial" value={{ $todo->middle_initial }} >
          </div>
          <div class="form-group"> 
              <label for="mobile_number">Mobile Number:</label>
              <input type="text" class="form-control" name="mobile_number" value={{ $todo->mobile_number }} >
          </div>
         
          <div class="form-group"> 
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" name="birthday" id="birthday"  onchange="return showcategory();"  value={{ $todo->birthday }} >
          </div>
          <div class="form-group"> 
            <label for="age">Age:</label>
            <input type="text" class="form-control" name="age" id="age" readonly value={{ $todo->age }}>
          </div>
          <div class="form-group"> 
              <!-- <label class="radio-inline"> -->
              <label for="gender">Gender:</label>
              <input type="radio" id="gender" name="gender" value="1">Male</label>

              <input type="radio" id="gender" name="gender" value="0">Female</label>
          </div>

          <div class="form-group">
                <label for="civil_status">Civil Status:</label>
                
                <select name="civil_status" class="form-control"style="width:250px">
                 <option {{old('civil_status',$todo->civil_status)=="Single"? 'selected':''}}  value="Single">Single</option>
                 <option {{old('civil_status',$todo->civil_status)=="Married"? 'selected':''}} value="Married">Married</option>
                 <option {{old('civil_status',$todo->civil_status)=="Divorce"? 'selected':''}} value="Divorce">Divorce</option>
                </select>
            </div>

            <div class="form-group"> 
                <label for="date_hired">Date Hired:</label>
                <input type="date" class="form-control" name="date_hired" id="date_hired"  onchange="return showcategory();"  value={{ $todo->date_hired }} >
            </div>

            <div class="form-group"> 
              <label for="permanent_address">Permanent Address:</label>
              <input type="text" class="form-control" name="permanent_address" value={{ $todo->permanent_address }} >
            </div>

            <div class="form-group"> 
              <label for="resident_address">Resident Address:</label>
              <input type="text" class="form-control" name="resident_address" value={{ $todo->resident_address }} >
            </div>
            
            <div class="form-group"> 
              <label for="tin">Tin:</label>
              <input type="text" class="form-control" name="tin" value={{ $todo->tin }} >
            </div>

            <div class="form-group"> 
              <label for="sss">SSS:</label>
              <input type="text" class="form-control" name="sss" value={{ $todo->sss }} >
            </div>

            <div class="form-group"> 
              <label for="pagibig_number">Pagibig Number:</label>
              <input type="text" class="form-control" name="pagibig_number" value={{ $todo->pagibig_number }} >
            </div>
           
            <button type="submit" class="btn btn-primary">Update</button>
            <button class="btn btn-danger"> <a href="/todos">back </a></button>
        </form>
    </div>
</div>
@endsection

<script  src="{{ asset('js/app.js') }}"></script>
<script>
  
  // src="{{ asset('assets/admin/js/jquery/jquery.min.js') }}">
  // $("#duplicate_address").is(':checked') {
  //   alert(1);
  // }
  $(document).ready(function(){
    
    $('#duplicate_address').on('change', function() {

    
      var permanent = $('#permanent_address').val();
      if($("#duplicate_address").is(':checked')) {
        $('#resident_address').val(permanent);
        $('#resident_address').val(permanent);
      }
      else
      {
        $('#resident_address').val('');
      }
      
    });
    
    $('#birthday').on('change', function() {
       
        var bday = $(this).val();
        var today = new Date();
        var olday = new Date(bday);
        // var age = dateDiff(olday, today);
        var ynew = today.getFullYear();
        var mnew = today.getMonth();
        var dnew = today.getDate();
        var yold = olday.getFullYear();
        var mold = olday.getMonth();
        var dold = olday.getDate();
        var age = ynew - yold;
        if (mold > mnew)
        {
          age--;
        }
        else
        {
          if(mold == mnew)
          {
              if (dold > dnew)
              {
                age--;
              }
          }
        }

        // alert(age);
        $('#age').val(age);
      
    });
   

});

</script>