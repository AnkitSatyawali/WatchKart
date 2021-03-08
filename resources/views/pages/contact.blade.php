@extends('layouts.master')

@section('content')

<div class="contact_main">
    <h2>CONTACT US</h2>
    <p>Follow me on these medium to contact me</p>
    <div class="row about_row">
        <div class="col about_col">
            <a class="nolistyle" href="https://www.linkedin.com/in/ankit-satyawali-0b3295150/">
                <div class="contact_card">
                        <div class="contact_icon">
                            <img class="contact_img" src="/images/linkedin.svg">
                        </div>
                </div>
            </a>
        </div>
        <div class="col about_col">
            <a class="nolistyle" href="https://github.com/AnkitSatyawali">
                <div class="contact_card">
                    <div class="contact_icon">
                        <img class="contact_img" src='/images/github.svg'>
                    </div>
                </div>
            </a>
        </div>
        
    </div>
</div>

@endsection

