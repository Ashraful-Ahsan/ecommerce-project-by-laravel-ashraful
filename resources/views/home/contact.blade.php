<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- Header -->
    @include('home.header')

    <section class="contact_section">
      <div class="container px-0">
        <div class="heading_container">
          <h2>Contact Us</h2>
        </div>
      </div>
      <div class="container container-bg">
        <div class="row">
          <div class="col-lg-7 col-md-6 px-0">
            <div class="map_container">
              <div class="map-responsive">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29054.197400431138!2d89.69453809999999!3d24.458601700000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1742383247471!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 px-0">
            <!-- Contact Form -->
            <form action="{{ route('contact.store') }}" method="POST">
              @csrf
              <input type="text" name="name" placeholder="Name" required />
              <input type="email" name="email" placeholder="Email" required />
              <input type="text" name="phone" placeholder="Phone" />
              <textarea name="message" placeholder="Message" required></textarea>
              <button type="submit">SEND</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    @include('home.footer')

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
  </div>
</body>

</html>
