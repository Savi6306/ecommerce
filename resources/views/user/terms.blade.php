@extends('layout.app')

@section('content')
<style>
    /* Container */
    .terms-container {
        max-width: 900px;
        margin: 50px auto;
        padding: 50px 40px;
        background: white;
        border-radius: 25px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        font-family: 'Poppins', sans-serif;
        color: #333;
        line-height: 1.8;
        transition: all 0.3s ease;
    }

    .terms-container:hover {
        transform: translateY(-5px);
        box-shadow: 0 25px 50px rgba(0,0,0,0.2);
    }

    /* Main Heading */
    .terms-container h1 {
        text-align: center;
        font-size: 3rem;
        color: #008080; /* Logo color */
        margin-bottom: 50px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Section Heading */
    .terms-container h2 {
        font-size: 2rem;
        color: #008080;
        margin-top: 35px;
        margin-bottom: 20px;
        position: relative;
        padding-left: 20px;
    }

    .terms-container h2::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 10px;
        height: 10px;
        background: #008080;
        border-radius: 50%;
    }

    /* Paragraphs */
    .terms-container p {
        font-size: 1.05rem;
        margin-bottom: 18px;
        color: #555;
    }

    /* Lists */
    .terms-container ul {
        margin-left: 30px;
        margin-bottom: 25px;
    }

    .terms-container li {
        margin-bottom: 12px;
        position: relative;
        padding-left: 20px;
        color: #444;
    }

    .terms-container li::before {
        content: '✔';
        position: absolute;
        left: 0;
        color: #008080;
        font-weight: bold;
    }

    /* Return Policy Box */
    .return-policy {
        background: #e0f7fa;
        border-left: 6px solid #008080;
        padding: 30px 25px;
        border-radius: 15px;
        margin-bottom: 35px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .return-policy:hover {
        background: #b2ebf2;
    }

    /* Links */
    .terms-container a {
        color: #008080;
        text-decoration: none;
        font-weight: 500;
        transition: color 0.2s ease;
    }

    .terms-container a:hover {
        color: #004d4d;
        text-decoration: underline;
    }

    @media (max-width: 768px) {
        .terms-container {
            padding: 30px 20px;
        }
        .terms-container h1 {
            font-size: 2.2rem;
        }
        .terms-container h2 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="terms-container">
    <h1>Terms & Conditions</h1>

    <h2>Return & Refund Policy</h2>
    <div class="return-policy">
        <p>At <strong>PGMS</strong>, customer satisfaction is our top priority. If you are not completely satisfied with your purchase, you may request a return or refund under the following conditions:</p>
        <ul>
            <li>Returns must be initiated within <strong>7 days</strong> of delivery.</li>
            <li>Products must be unused, in original packaging, with all tags and labels intact.</li>
            <li>Refunds will be processed within 7-10 business days to the original payment method.</li>
            <li>Shipping charges are non-refundable, except in cases of defective or incorrect items.</li>
            <li>To request a return, contact our support team at <strong><a href="mailto:indiapgms@gmail.com">support@pgms.com</a></strong> with your order details.</li>
        </ul>
    </div>

    <h2>1. Use of Website</h2>
    <p>By accessing and shopping on PGMS, you agree to comply with these Terms & Conditions. You are responsible for providing accurate information when placing orders and ensuring that payment details are correct.</p>

    <h2>2. Account Responsibilities</h2>
    <p>You are responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account. Please notify us immediately if you suspect unauthorized access.</p>

    <h2>3. Product Information</h2>
    <p>We strive to provide accurate product descriptions, pricing, and images. However, slight variations may occur due to display settings or supplier differences. PGMS is not liable for minor discrepancies.</p>

    <h2>4. Pricing & Payment</h2>
    <p>All prices are listed in INR and are subject to change without notice. Payments must be made using authorized methods provided on our website. We ensure secure payment processing for all transactions.</p>

    <h2>5. Limitation of Liability</h2>
    <p>PGMS shall not be liable for any indirect, incidental, or consequential damages arising from the use of our website or products, including lost profits or business interruptions.</p>

    <h2>6. Modifications to Terms</h2>
    <p>We reserve the right to update or modify these Terms & Conditions at any time. Any changes will be posted on this page, and continued use of our website constitutes acceptance of the updated terms.</p>

    <p>By using our website, you acknowledge that you have read, understood, and agree to these Terms & Conditions and Return Policy.</p>
</div>
<div class="alert alert-info text-center">
   <a href="{{ route('home') }}" class="text-success fw-bold">Continue shopping!</a>
            </div>
@endsection
