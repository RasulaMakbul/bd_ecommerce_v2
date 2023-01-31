@extends('layouts.user')
@section('title','Welcome')

@section('content')


@include('layouts.inc.frontend.slider')

<div class="d-flex justify-content-center m-5">
    <h2 class="align-center">{{__('Most Wanted Products')}}</h2>
</div>
<div class="d-flex justify-content-center m-5">
    @include('layouts.inc.frontend.productSlider')
</div>


<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>
<h2>Working</h2>


@endsection