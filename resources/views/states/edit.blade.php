@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">{{ __('انتخاب کشور') }}
                    <a href="{{route('states.index')}}" class="btn btn-link">بازگشت</a>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('states.update' , $state->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="country_code" class="col-md-4 col-form-label text-md-end">{{ __(' کشور') }}</label>

                            <div class="col-md-6">
                                <select name="country_id" id="country_code" class="form-select">
                                    @foreach ($countries as $country)
                                        @if ( $country->id == $state->country->id )
                                           <option value="{{$country->id}}" selected >{{$country->name}}</option>
                                        @else
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('country_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('استان') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name' ,  $state->name) }}" required autocomplete="name" autofocus>

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
                    <form method="POST" action="{{route('states.destroy' , $state->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger float-left"> حذف {{$state->name}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection