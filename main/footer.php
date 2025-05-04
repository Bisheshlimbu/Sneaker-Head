<style>
    .footer {
  background: #102a2b;
  color: #fff;
  padding: 40px 20px;
  font-family: sans-serif;
  width: 100%;
}

.footer-top, .footer-mid {
  display: flex;
  /* flex-wrap: ; */
  justify-content: center;
  gap: 20px;
  margin-bottom: 50px;
}

.footer-box, .mid-box {
  /* flex: 1 1 200px; */
  /* background-color:red; */
  max-width: 240px;
}

.footer-box h4,
.mid-box h5 {
  font-weight: bold;
  margin-bottom: 10px;
}

.footer-box p,
.mid-box p {
  font-size: 14px;
  line-height: 1.5;
}

.mid-box ul {
  list-style: none;
  padding: 0;
}

.mid-box ul li a {
  color: #ddd;
  font-size: 14px;
  text-decoration: none;
  display: block;
  margin: 5px 0;
}

.mid-box input[type="email"] {
  width: 100%;
  padding: 8px;
  margin-top: 10px;
  border: 1px solid #555;
  background: #000;
  color: #fff;
}

.footer-bottom {
  border-top: 1px solid #333;
  padding-top: 20px;
  font-size: 13px;
  text-align: center;
}

.footer-links {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  list-style: none;
  padding: 0;
  margin: 10px 0;
}

.footer-links li {
  margin: 0 10px;
}

.footer-links a {
  color: #aaa;
  text-decoration: none;
}

.social-icons a {
  margin: 0 8px;
  color: #fff;
  font-size: 18px;
}

@media (max-width: 768px) {
  .footer-top, .footer-mid {
    flex-direction: column;
  }

  .footer-box, .mid-box {
    max-width: 100%;
  }

  .footer-links {
    flex-direction: column;
  }
}

</style>
<footer class="footer">
  <div class="footer-top">
    <div class="footer-box">
      <h4>ORDER ASSISTANCE</h4>
      <p>Get help with ordering on our website online  by computer or phone</p>
    </div>
    <div class="footer-box">
      <h4>TRACK YOUR ORDER</h4>
      <p>Use your order number to check the location of your order</p>
    </div>
    <div class="footer-box">
      <h4>MAKE A RETURN</h4>
      <p>Print a return slip and make an easy return</p>
    </div>
    <div class="footer-box">
      <h4>FIND A STORE</h4>
      <p>Our associates are the best in the business, see for yourself</p>
    </div>
  </div>

  <div class="footer-mid">
    <div class="mid-box">
      <h5>GET POINTS. GAIN ACCESS.<br>BOOST YOUR STATUS.</h5>
      <p>Use your STATUS across our brand family, JD Sports and Finish Line.</p>
      <a href="#">Join STATUS</a>
    </div>
    <div class="mid-box">
      <h5>SHOPPING, REWARDS,<br>INSPIRATION & MORE</h5>
      <p>Access it all with exclusive product releases, giveaways, and app-only content.</p>
      <a href="#">Get the app</a>
    </div>
    <div class="mid-box">
      <h5>GET TO KNOW US</h5>
      <ul>
        <li><a href="#">Our Company</a></li>
        <li><a href="#">Our Brand Family</a></li>
        <li><a href="#">Finish Line Foundation</a></li>
        <li><a href="#">Careers</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
    </div>
    <div class="mid-box">
      <h5>CUSTOMER CARE</h5>
      <ul>
        <li><a href="#">FAQs</a></li>
        <li><a href="#">Sizing Chart</a></li>
        <li><a href="#">Shipping Rates & Policies</a></li>
        <li><a href="#">Return Policies</a></li>
        <li><a href="#">Cancel an Order</a></li>
        <li><a href="#">Contact Us</a></li>
      </ul>
    </div>
    <div class="mid-box">
      <h5>GIFT CARDS</h5>
      <ul>
        <li><a href="#">Buy a Gift Card</a></li>
        <li><a href="#">Check Your Balance</a></li>
      </ul>
      <h5>GET ON THE LIST</h5>
      <input type="email" placeholder="Enter your email">
    </div>
  </div>

  <div class="footer-bottom">
    <p>© 2025 Sneaker Head, Inc. All Rights Reserved.</p>
    <ul class="footer-links">
      <li><a href="#">Privacy Policy</a></li>
      <li><a href="#">Terms of Use</a></li>
      <li><a href="#">Site Map</a></li>
      <li><a href="#">Do Not Sell or Share My Info</a></li>
    </ul>
    <div class="social-icons">
      <a href="#"><i class="fab fa-instagram"></i></a>
      <a href="#"><i class="fab fa-youtube"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-facebook-f"></i></a>
    </div>
  </div>
</footer>

</body>
</html>