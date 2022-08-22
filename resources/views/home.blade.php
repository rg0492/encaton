@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                     @endif

                    <form method="POST" action="{{ route('short-url') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="url" class="col-md-4 col-form-label text-md-end">{{ __('Url') }}</label>

                            <div class="col-md-6">
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>

                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>Url</th>
                <th>Short Url</th>
                <th>No of Visit</th>
            </tr>
        </thead>
        @foreach ($short as $item)
            <tbody>
                <tr>
                    <td>{{$item->destination_url}}</td>
                    <td><a href="{{$item->default_short_url}}">Visit</a></td>
                    <td><a href="{{route('no-of-visit',['id'=>$item->id])}}">View</a></td>

                </tr>
            </tbody>   
        @endforeach
       {!! $short->links() !!}


    </table>
</div>
@endsection
