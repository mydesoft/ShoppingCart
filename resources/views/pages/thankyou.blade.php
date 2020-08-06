@extends('layouts.master')
@section('title', 'Thank-You')
@section('content')
		
		<br>
		<div class="container text-center">
			@include('includes.message')
		</div>
		<div class="section container">

			<h3>Thank You for <br> Your Order!</h3> <h6>A confirmation email was sent</h6>
			

			<div class="button">
				<a href="{{route('landing-page')}}" class="btn btn-info btn-lg">Home</a>
			</div>

		</div><!-- End Section -->


	@endsection