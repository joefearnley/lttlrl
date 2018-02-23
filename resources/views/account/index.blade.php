@extends('layouts.app')

@section('content')
<div class="container">
    <div class="columns">
    @include('account.nav')
    <div class="column is-9">
        <nav class="breadcrumb" aria-label="breadcrumbs">
            <h1>Account Overview</h1>
        </nav>
        <section class="hero is-primary welcome is-small">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title">Hello, {{ $user->name }}.</h1>
                    <h2 class="subtitle">I hope you are having a great day!</h2>
                </div>
            </div>
        </section>
        <section class="info-tiles stats">
            <div class="tile is-ancestor has-text-centered">
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">{{ $user->daysMakingUrlsLittle() }}</p>
                        <p class="subtitle">Days Making Urls Little</p>
                    </article>
                </div>
                <div class="tile is-parent">
                        <article class="tile is-child box">
                            <p class="title">{{ $user->urlsMade() }}</p>
                            <p class="subtitle">Urls Made Little</p>
                        </article>
                </div>
                <div class="tile is-parent">
                    <article class="tile is-child box">
                        <p class="title">{{ $user->urlsClickedOn() }}</p>
                        <p class="subtitle">Urls Clicked on</p>
                    </article>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@section('scripts')
<script src="/js/account/overview.js"></script>
@endsection
