@extends('main')

@section('title', '| Contact')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Contact Me</h1>
            <hr>
            <form>
                <div class="form-group">
                    <label name="email">Email</label>
                    <input id="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label name="email">Subject</label>
                    <input id="subject" name="subject" class="form-control">
                </div>

                <div class="form-group">
                    <label name="email">Message</label>
                    <textarea id="message" name="message" class="form-control"></textarea>
                </div>

                <input type="submit" value="Send Message" class="btn btn-submit">
            </form>
        </div>
    </div>
</div>

@endsection