<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
     <link rel="icon" type="image/png" href="/images/PGMS Logo.png">
</head>
<body>
    @extends('layout.app')

@section('content')

<!-- Banner -->
<section class="contact-banner text-center d-flex align-items-center justify-content-center">
  <h1 class="text-white fw-bold">Contact Us</h1>
</section>

<!-- Contact Info -->
<section class="contact-info py-5">
  <div class="container">
    <div class="row g-4 text-center">

    <!-- Address Card -->
    <div class="col-md-3 col-sm-6">
      <div class="contact-card text-center p-4">
        <h5 class="fw-bold text-white">Our Address</h5>
        <p class="text-white mb-0">Bangalore koramangala India</p>
      </div>
    </div>

    <!-- Phone Card -->
    <div class="col-md-3 col-sm-6">
      <div class="contact-card text-center p-4">
        <h5 class="fw-bold text-white">Call Us</h5>
        <p class="text-white mb-0">+91 7060471592</p>
      </div>
    </div>

       <!-- Email Card -->
    <div class="col-md-3 col-sm-6">
      <div class="contact-card text-center p-4">
        <h5 class="fw-bold text-white">Email Us</h5>
        <p class="text-white mb-0 text-break">indiapgms@gmail.com</p>
      </div>
    </div>

    <!-- WhatsApp Support Card -->
    <div class="col-md-3 col-sm-6">
      <div class="contact-card text-center p-4">
        <h5 class="fw-bold text-white">WhatsApp Support</h5>
        <p class="text-white">Chat with us instantly</p>
        <a href="https://wa.me/917060471592" target="_blank" class="btn whatsapp-btn">Start Chat </a>
      </div>
    </div>

    </div>
  </div>
</section>

@if(session('success'))
    <div style="color: green; font-weight:bold;">
        {{ session('success') }}
    </div>
@endif


<!-- Contact Form -->
<section class="contact-form py-5 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="card shadow p-4">
          <h3 class="mb-4 text-center">Send Us a Message</h3>
         <form action="{{ route('contact.send') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label fw-bold">Your Name</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Email Address</label>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Subject</label>
        <input type="text" name="subject" class="form-control" placeholder="Subject" required>
    </div>

    <div class="mb-3">
        <label class="form-label fw-bold">Message</label>
        <textarea name="message" class="form-control" rows="5" placeholder="Type your message" required></textarea>
    </div>

    <div class="d-grid">
        <button type="submit" class="btn contact-btn">Send Message</button>
    </div>
</form>

        </div>
      </div>
    </div>
  </div>
  <div class="alert alert-info text-center">
   <a href="{{ route('home') }}" class="text-success fw-bold">Continue shopping!</a>
            </div>
</section>

<!-- Style -->
<style>
.contact-banner {
  background: url('https://img.freepik.com/free-photo/contact-us-customer-support-hotline-people-connect-call-customer-support_36325-1640.jpg') center/cover no-repeat;
  height: 250px;
}
.contact-card {
  background-color: #009688; 
  border-radius: 12px;
  min-height: 200px;   /* Equal card height */
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  transition: transform 0.3s, box-shadow 0.3s;
}
.contact-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
}

/* WhatsApp button */
.whatsapp-btn {
  background-color: #25D366;
  color: #fff;
  font-weight: 600;
  border-radius: 25px;
  padding: 6px 18px;
  margin-top: 8px;
  transition: all 0.3s ease;
}
.whatsapp-btn:hover {
  background-color: #1ebe5b;
  color: #fff;
  transform: scale(1.05);
}

.contact-btn{
background-color: #25D366;
  color: #fff;
  font-weight: 600;
  border-radius: 25px;
  padding: 6px 18px;
  margin-top: 8px;
  transition: all 0.3s ease;
}
.contact-btn:hover {
  background-color: #1ebe5b;
  color: #fff;
  transform: scale(1.05);
}
</style>
@endsection
</body>
</html>