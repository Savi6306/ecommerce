<footer class="footer-teal pt-5 pb-3 mt-5">
    <div class="container text-white">

        <div class="row">

            <!-- About -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">PGMS Marketplace</h5>
                <p class="small">
                    India’s growing e-commerce platform for sellers and buyers.  
                    Sell more, grow more, earn more 🚀
                </p>
            </div>

            <!-- Quick Links -->
            <div class="col-md-2 mb-4">
                <h6 class="fw-bold">Quick Links</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ url('/') }}" class="footer-link">Home</a></li>
                    <li><a href="{{ route('seller.startSelling') }}" class="footer-link">Become Seller</a></li>
                    <li><a href="{{ route('bestsellers') }}" class="footer-link">Bestsellers</a></li>
                    <li><a href="{{ route('contact') }}" class="footer-link">Contact Us</a></li>
                </ul>
            </div>

            <!-- Policies -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Policies</h6>
                <ul class="list-unstyled small">
                    <li><a href="{{ route('privacy') }}" class="footer-link">Privacy Policy</a></li>
                    <li><a href="{{ route('terms') }}" class="footer-link">Terms & Conditions</a></li>
                    <li><a href="{{ route('returns') }}" class="footer-link">Return Policy</a></li>
                </ul>
            </div>

            <!-- Social -->
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Follow Us</h6>
                <div class="d-flex gap-3 mt-2">
                    <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

        </div>

        <hr class="footer-line">

        <div class="text-center small opacity-75">
            © {{ date('Y') }} PGMS Marketplace — All Rights Reserved.
        </div>

    </div>
</footer>

<style>
    /* Main footer background using your logo color */
    .footer-teal {
        background: #009688; /* Teal Green */
        color: white !important;
    }

    .footer-link {
        color: rgba(255, 255, 255, 0.85);
        text-decoration: none;
        display: block;
        margin-bottom: 6px;
        transition: 0.3s ease;
    }

    .footer-link:hover {
        color: #ffffff;
        padding-left: 5px;
    }

    .social-icon {
        color: white;
        font-size: 1.5rem;
        transition: 0.3s ease;
    }

    .social-icon:hover {
        color: #c8f7f4; /* Lighter teal glow */
        transform: scale(1.15);
    }

    .footer-line {
        border-color: rgba(255, 255, 255, 0.3);
    }
</style>
