@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ "GET URL RESPONSE "}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                <div class="row">
                    <form action="/submit" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="url">Url</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="URL" value="{{$url}}">
                                </div>
                                <div class="col">
                                    <button type="home" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">URL RESPONSE </label>
                            <textarea class="form-control @error('url_response') is-invalid @enderror" id="url_response" name="url_response" placeholder="URL RESPONSE">{{ $url_response }}</textarea>
                            <label for="description">URL INVERTED RESPONSE </label>
                            <textarea class="form-control @error('url_response_inverted') is-invalid @enderror" id="url_response_inverted" name="url_response_inverted" placeholder="URL RESPONSE INVERTED">{{ $url_response_inverted }}</textarea>
                        </div>
                        
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
