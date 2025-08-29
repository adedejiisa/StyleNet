<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <title>STYLENET-HOME</title>
  <style>
    body {
      font-family: sans-serif;
      padding: 0;
      margin: 0;
    }

    header {
      padding: 1rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: bold;
    }

    nav {
      display: flex;
      align-items: center;
             margin-right:5%;

    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 1rem;
      margin: 0;
      padding: 0;
    }

    .nav-links li a {
      text-decoration: none;
      color: black;
    }

    /* Mobile menu button */
    .menu-btn {
      display: none;
      font-size: 1.8rem;
      cursor: pointer;
    }

    /* Products */
    #products {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
      gap: 1rem;
      padding: 1rem;
    }

    .product {
      background: var(--secondary);
      border: 1px solid #ddd;
      padding: 1rem;
      border-radius: 8px;
    }

    .product img {
      max-width: 100%;
      height: auto;
    }

    footer {
      background: #333;
      color: white;
      padding: 30px 20px;
      text-align: center;
    }
    footer a {
      color: #FF6F61;
      margin: 0 10px;
    }

    /* Mobile Styles */
    @media (max-width: 700px) {
      .nav-links {
        display: none;
        flex-direction: column;
        background: #222;
        position: absolute;
        top: 70px;
        right: 0;
        width: 80%;
        left: 2%;
        padding: 1rem;
        border-radius: 8px;
      }
      .nav-links li a {
        color: white;
        display: block;
        padding: 10px 0;
      }
      .menu-btn {
        display: block;
        position: absolute;
        right:10%;
      }
      .nav-links.active {
        display: flex;
      }
    }
  </style>
</head>
<body>
  <div class="animation"></div>
  <header>
    <div class="logo">STYLENET</div>
    <nav>
      <i class="fa-solid fa-bars menu-btn"></i>
      <ul class="nav-links">
        <li><a href="#hero">Home</a></li>
        <li><a href="cart.html">Cart</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="product.html">Shop</a></li>
        <li><a href="#contact">Contact</a></li>
      </ul>
    </nav>
  </header>

  <main class="main">
    <section class="hero">
      <h1> 💳 Shop with us seamlessly</h1>
      <p class="p">Discover quality products, fast delivery and a shopping experience that feels effortless </p>
      <div class="btn">
       <a href="product.html"> <button type="submit" class="input">Shop Now</button></a>
      </div>
    </section>

    <section id="produc">
      <h2 style="text-align: center;">Our Products</h2>
      <a style="margin-left: 85%;" href="product.html">see all</a>
      <div id="products"></div>
    </section>
    
    <section>
      <h1>About us</h1>
      <div class="about" id="about">
        <div>
          <h1>About Us</h1>
          <p>StyleNet was founded in 2006.
          <br>StyleNet is an online fashion store committed to delivering the best shopping experience...</p>
        </div>
        <div>
          <h1>Our Mission</h1>
          <p>To make fashion accessible, enjoyable, and sustainable for everyone—no matter where they are.</p>
        </div>
        <div><h1>What We Offer</h1>
<p>
- A wide variety of clothing and accessories for men, women, and kids
<br>
- Easy-to-use website for seamless shopping  
<br>
- Secure checkout and fast delivery 
<br>
- Excellent customer support  </p></div>

<div><h1>Why Choose Us?</h1>
<p>
- Carefully curated collections  <br>
- Affordable prices  <br>
- Customer-first approach  <br>
- Trusted and secure platform <br>
</p></div></div>
      </div>
    </section>
    
    <section class="contact-form">
      <h1>Contact</h1>
      <div class="form-group">
        <input type="name" placeholder="Name" class="form"/>
        <input type="email" placeholder="Email" class="form"/>
        <textarea cols="30" rows="10" placeholder="Enter your message here" class="form"></textarea>
        <button type="submit" class="submit" style="justify-self: center;">Submit</button>
      </div>
    </section>
  </main>
  
  <footer>
    <p>© 2025 STYLENET</p>
    <p>
      <a href="#">Facebook</a> | 
      <a href="#">Instagram</a> | 
      <a href="#">WhatsApp</a>
    </p>
    <p>Message us on </p>
    <li>Whatsapp <span>+(821) 876 543</span></li>
    <li>Call us on <span>03045728190</span></li>
  </footer>

  <script>
    // Toggle mobile menu
    document.querySelector(".menu-btn").addEventListener("click", () => {
      document.querySelector(".nav-links").classList.toggle("active");
    });

    // Fetch products
    fetch('https://fakestoreapi.com/products?limit=4')
      .then(res => res.json())
      .then(data => {
        data.forEach(product => {
          const card = document.createElement('div');
          card.className = 'product';
          card.innerHTML = `
            <img src="${product.image}" alt="${product.title}">
            <h4>${product.title}</h4>
            <p>$ ${product.price}</p>
            <button class="btn-cart">Add to Cart</button>
          `;
          document.getElementById("products").appendChild(card);

          // Add to cart functionality
          card.querySelector(".btn-cart").addEventListener("click", () => {
            addToCart(product);
          });
        });
      });

    function addToCart(product) {
      let cart = JSON.parse(localStorage.getItem("cart")) || [];
      let existing = cart.find(item => item.id === product.id);
      if (existing) {
        existing.quantity += 1;
      } else {
        cart.push({ ...product, quantity: 1 });
      }
      localStorage.setItem("cart", JSON.stringify(cart));
      alert(product.title + " added to cart ✅");
    }
  </script>
</body>
</html>

