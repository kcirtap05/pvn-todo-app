@extends('base')
@section('main')


<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Employee Information</h1>    
    <div>
        <a style="margin: 19px;" href="{{ route('todos.create')}}" class="btn btn-primary">New Employee</a>
    </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Employee Name</td>
          <td>Birthday</td>
          <td>Age</td>
          <td>Gender</td>
          <td>Civil Status</td>
          <td>Mobile Number</td>
          <td>Date Hired</td>
          <td>Permanent Address</td>
          <td>Resident Address</td>
          <td>TIN</td>
          <td>SSS</td>
          <td>Pagibig Number</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($todos as $todo)
        @php 
          $test_variable = '';
          $gender = $todo->gender;
          if ($gender == 1)
          {
            $gender = 'Male';
          }
          else if ($gender == '' || $gender == null)
          {
            $gender = '';
          }
          else
          {
            $gender = 'Female';
          }
        @endphp

        <tr>
            <td>{{$todo->id}}</td>
            <td>{{$todo->first_name}} {{$todo->middle_initial}} {{$todo->last_name}} </td>
            <td>{{$todo->birthday}}</td>
            <td>{{$todo->age}}</td>
            <td>{{$gender}}</td>
            <td>{{$todo->civil_status}}</td>
            <td>{{$todo->mobile_number}}</td>
            <td>{{$todo->date_hired}}</td>
            <td>{{$todo->permanent_address}}</td>
            <td>{{$todo->resident_address}}</td>
            <td>{{$todo->tin}}</td>
            <td>{{$todo->sss}}</td>
            <td>{{$todo->pagibig_number}}</td>
            <td>
                <a href="{{ route('todos.edit',$todo->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('todos.destroy', $todo->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection

<div class="col-sm-12">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>