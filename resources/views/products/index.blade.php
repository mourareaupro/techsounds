@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-12">

                @if (session()->has('success_message'))
                    <div class="alert alert-success">
                        {{ session()->get('success_message') }}
                    </div>
                @endif

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                    <div class="row">
                        <div class="col">
                        </div>
                        <div class="col-md-6 d-none d-md-block">
                            <h3 class="text-center">This section is coming soon, you can keep you update</h3>
                            <form action="{{ route('newsletter.store') }}" method="POST">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control form-control-newsletter" placeholder="me@mail.com" aria-label="Recipient's username" aria-describedby="button-addon2" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-info" type="submit" id="button-addon2"><i class="fa fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col">
                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
