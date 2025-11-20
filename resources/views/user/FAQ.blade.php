<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help & FAQ</title>
    <link rel="icon" type="image/png" href="/images/PGMS Logo.png">

</head>
<body>
@extends('layout.app')

@section('content')

    <div class="container my-5">
  <!-- Page Title -->
  <div class="text-center mb-5">
    <h1 class="fw-bold" style="color:#009688;">Help & FAQ</h1>
    <p class="text-muted">Find answers to the most common questions about PGMS (Pushpendra Global Mart Solutions)</p>
  </div>

  <div class="row">
    <!-- FAQ Section -->
    <div class="col-lg-8">
      <h4 class="fw-bold mb-4">Frequently Asked Questions</h4>

      <div class="accordion" id="faqAccordion">

        <!-- Q1 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faq1">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#answer1">
              How can I create an account on PGMS?
            </button>
          </h2>
          <div id="answer1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              You can create an account by clicking on the <a href="{{ url('/signup') }}">Sign Up</a> button and filling in your details. It only takes a few minutes!
            </div>
          </div>
        </div>

        <!-- Q2 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faq2">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer2">
              How do I track my order?
            </button>
          </h2>
          <div id="answer2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              After placing your order, go to <strong>My Orders</strong> in your account. You’ll see the live status of your shipment.
            </div>
          </div>
        </div>

        <!-- Q3 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faq3">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer3">
              What payment methods are available?
            </button>
          </h2>
          <div id="answer3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              We accept all major debit/credit cards, UPI, Net banking, and Cash on Delivery (COD).
            </div>
          </div>
        </div>

        <!-- Q4 -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="faq4">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer4">
              How can I contact customer support?
            </button>
          </h2>
          <div id="answer4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
            <div class="accordion-body">
              You can reach us anytime through <strong>Live Chat</strong>, <strong>Email</strong>, or our <strong>Toll-Free Number</strong>.
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Support Section -->
    <div class="col-lg-4">
      <div class="support-box p-4">
        <h5 class="fw-bold mb-3">Need More Help?</h5>
        <p class="text-muted">Our support team is available 24/7 to assist you.</p>
        <a href="mailto:indiapgms@gmail.com" class="btn w-100 mb-2 contact-btn">📧 Email Support</a>
        <a href="tel:+91 7060471592" class="btn w-100 contact-btn">📞 Call Support</a>
      </div>
    </div>
  </div>
</div>
<div class="alert alert-info text-center">
   <a href="{{ route('home') }}" class="text-success fw-bold">Continue shopping!</a>
            </div>
<style>
/* Support Box */
.support-box {
  background: #fff;
  border-radius: 12px;
  border: 1px solid #ddd;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.contact-btn {
  background-color: #009688;
  color: #fff;
  font-weight: 600;
  border-radius: 8px;
  transition: 0.3s;
}
.contact-btn:hover {
  background-color: #00796B;
  color: #fff;
}
</style>
@endsection
</body>
</html>