@extends('front.layout')
@section('contact')
<section id="contentSection">
    <div class="row">
      <div class="col-lg-12 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Contact Us</h2>
            <p>
            <span>We are Nepali "<b>Proud
to be Nepali</b>" and were be responsible to give infromation who want to
come "<b>EUROPE</b>", Fact about
the "<b>EUROPE</b>", Jobs, Education,
Visit, Work experience, Culture and Behavior.</span>

Now somany people are scamp by agency every day they show
advertise where shows income nearly 1.5 lacks or 2 lacks, salary will in euro
where never seen euro. that type of agency make us fool. So we need your
feedback and comments.

&nbsp;

&nbsp;

&nbsp;
            </p>
            <form action="{{ route('/send_contact') }}" method="post"class="contact_form">
            	@csrf
              <input name="name"class="form-control" type="text" placeholder="Name*" required>
              <input name="email"class="form-control" type="email" placeholder="Email*" required>
              <textarea name="message"class="contact form-control " cols="30" rows="10" placeholder="Message*" required></textarea>
              <input type="submit" value="Send Message">
            </form>
          </div>
        </div>
      </div>      
    </div>
  </section>
@endsection
