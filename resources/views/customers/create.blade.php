@extends('layout')
@section('content')
    <h1>Add new customer</h1>
    <form method="POST" action="/customers">
        @csrf
        <div class="row">
            <div class="form-group">
                    <label for="name">Name</label>
            <input type="text" name="name" value=" {{old('name')}} " class="form-control" id="name" placeholder="Name">
                    @if($errors->any())
                    <p>
                        {{$errors->first('name')}}
                    </p>
                    @endif
            </div>
            <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" value=" {{old('email')}} " class="form-control" id="email" placeholder="Email">
                    @if($errors->any())
                    <p>
                        {{$errors->first('email')}}
                    </p>
                    @endif
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="active" id="status" class="form-control">
                    <option disabled value="">Select status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </div>
            <div class="form-group">
                    <label for="company_id">Company</label>
                    <select name="company_id" id="company_id" class="form-control">
                        @foreach ($companies as $company)
                    <option value="{{ $company->id }}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <br/>
@endsection