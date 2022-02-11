@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('انتخاب استان') }}
                    <a href="{{route('departments.index')}}" class="btn btn-link">بازگشت</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('departments.update' , $department->id) }}">
                        @csrf
                        @method('PUT')
       
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('بخش') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' ,  $department->name) }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تغییر') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="mt-2 p-2 s">
                    <form method="POST" action="{{route('departments.destroy' , $department->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-left"> حذف {{$department->name}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection