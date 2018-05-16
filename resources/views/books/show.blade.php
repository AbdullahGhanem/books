@extends('layouts.app')

@section('content')
	<div class="row">
		<div class="col-md-9">
			<div class="panel">
	            <div class="panel-body">
	                <div class="content-group-lg">
	                    <div class="content-group text-center">
	                        <a href="#" class="display-inline-block">
	                            <img src="{{ $book['medium'] ??  $book['thumbnail'] }}" class="img-responsive" alt="">
	                        </a>
	                    </div>

	                    <h3 class="text-semibold mb-5">
	                        <a href="#" class="text-default">{{ $book['title'] }}</a>
	                    </h3>

	                    <ul class="list-inline list-inline-separate text-muted content-group">
	                        <li>By <a href="#" class="text-muted">{{ $book['authors'][0] }}</a></li>
	                        <li>published at : {{ $book['published_at'] }}</li>
	                        <li><a href="#" class="text-muted">12 comments</a></li>
	                        <li>
								<bookmark book_id="{{ $book['id'] }}" 
									is_liked="{{ in_array($book['id'], auth()->user()->my_books) }}">		
								</bookmark>
	                        </li>
	                    </ul>

	                    <div class="content-group">
	                        <p>{{ $book['description'] }}</p>
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
		<div class="col-md-3">
			<div class="panel">
	            <div class="panel-body">
					<div class="sidebar-category">
						<div class="category-title">
							<span>Categories</span>
							<ul class="icons-list">
								<li><a href="#" data-action="collapse"></a></li>
							</ul>
						</div>

						<div class="category-content no-padding-bottom">
							<ul class="list-inline list-inline-condensed no-margin-bottom">
								@foreach($book['categories'] as $category)
									<li>
										<a href="#">
											<span class="label border-left-success label-striped content-group"> {{ $category }}
											</span>
										</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
