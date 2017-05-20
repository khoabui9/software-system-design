@extends('layouts.app')
@section('content')
<div class="row">
<div class="col-sm-12 pic-head2">
    </div>
    </div>
    <div class="col-md-6 col-md-offset-3">
    <h2>Get help with JustCollab</h2>
    <hr>
    <strong><p>Need help?</p></strong>
    <p>you've come to the right place! send a message using the form below!</p>
    <hr>
    <div class="well well-sm">
    
      <form id="contact-form" class="form-horizontal" action="/echo/json/" method="post">
      <fieldset>
        <legend class="text-center">Contact us</legend>
        <div id="success-container" class="text-center" style="display:none;">
          <p class="lead text-success"><span class="glyphicon glyphicon-ok"></span></p>
          <p class="lead">Your message has been sent successfully!</p>
        </div>

        <div id="form-container">

          <!-- Name input-->
          <div class="form-group">
            <label class="col-md-3 control-label" for="name">Name</label>
            <div class="col-md-9">
              <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
            </div>
          </div>

          <!-- Email input-->
          <div class="form-group">
            <label class="col-md-3 control-label" for="email">Your E-mail</label>
            <div class="col-md-9">
              <input id="email" name="email" type="text" placeholder="Your email" class="form-control">
            </div>
          </div>

          <!-- Message body -->
          <div class="form-group">
            <label class="col-md-3 control-label" for="message">Your message</label>
            <div class="col-md-9">
              <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
            </div>
          </div>

          <!-- Form actions -->
          <div class="form-group">
            <div class="col-md-12 text-right" id="spin-area">
              <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
          </div>
        </div>
      </fieldset>
      </form>
    </div>
     <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; JustCollab 2017</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </footer>
  </div>
@stop