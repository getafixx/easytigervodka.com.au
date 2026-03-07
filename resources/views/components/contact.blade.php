<section class="contact" id="contact">
  <div class="section-label">Get in Touch</div>
  <h2 class="section-title">Contact Us</h2>

  @if(session('success'))
    <div class="alert-success">
      {{ session('success') }}
    </div>
  @endif

  <form action="/contact" method="POST" class="contact-form">
    @csrf

    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>
    </div>

    <div class="form-group">
      <label for="message">Message</label>
      <textarea name="message" id="message" rows="5" required></textarea>
    </div>

    <button type="submit" class="btn-primary">Send Message</button>
  </form>
</section>

<style>
.contact {
    padding: 4rem 2rem;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}
.alert-success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 1rem;
    margin-bottom: 2rem;
    border-radius: 4px;
}
.contact-form {
    margin-top: 2rem;
    text-align: left;
}
.form-group {
    margin-bottom: 1.5rem;
}
.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
}
.form-group input,
.form-group textarea {
    width: 100%;
    padding: 0.75rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-family: inherit;
    background: transparent;
}
.form-group textarea {
    resize: vertical;
}
</style>