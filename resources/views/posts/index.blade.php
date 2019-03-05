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
                    <div class="col-md-4">
                        <hr class="line-info">
                        <h1>Posts
                            <span class="text-info">+</span>
                        </h1>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        @if(count($posts))
                            @foreach($posts as $post)
                                <div class="blog-card">
                                    <div class="meta">
                                        <div class="photo" style="background-image: url(https://storage.googleapis.com/chydlx/codepen/blog-cards/image-1.jpg)"></div>
                                        <ul class="details">
                                            <!--<li class="author"><a href="#">John Doe</a></li>
                                            <li class="date">Aug. 24, 2015</li>
                                            <li class="tags">
                                                <ul>
                                                    <li><a href="#">Learn</a></li>
                                                    <li><a href="#">Code</a></li>
                                                    <li><a href="#">HTML</a></li>
                                                    <li><a href="#">CSS</a></li>
                                                </ul>
                                            </li>-->
                                        </ul>
                                    </div>
                                    <div class="description">
                                        <h1>{{$post->title}}</h1>
                                        <p>{{$post->description}}</p>
                                        <p class="read-more">
                                            <a href="{{route('post.show', $post->slug)}}">Read More</a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
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
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
