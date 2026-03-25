<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="index.css" />
  <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
  <script defer src="js/bootstrap.bundle.min.js"></script>

  <title>Anbilibabol Bestabol</title>
</head>

<body
  class="d-flex flex-column min-vh-100 position-relative"
  data-bs-spy="scroll"
  data-bs-target="#mainNav"
  data-bs-offset="80"
  tabindex="0">

  <header>
    <nav id="mainNav" class="navbar navbar-expand-lg fixed-top px-4 text-dark">
      <a class="navbar-brand" href="index.php">
        <img src="images/logo.png" alt="Logo" height="50" />
      </a>

      <ul class="navbar-nav nav-underline ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#products">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contact">Contact Us</a>
        </li>
      </ul>
    </nav>
  </header>

  <main class="flex-fill">

    <section id="home" class="my-5">
      <div
        id="carouselAutoplaying1"
        class="carousel slide carousel-fade"
        data-bs-ride="carousel"
        data-bs-pause="false">
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"></button>
          <button
            type="button"
            data-bs-target="#carouselIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button
            type="button"
            data-bs-target="#carouselIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"></button>
          <button
            type="button"
            data-bs-target="#carouselIndicators"
            data-bs-slide-to="3"
            aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="images/car1.jpg"
              class="d-block w-100 carousel-img home"
              alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="fw-bold">Fresh Products, Everyday</h1>
              <p>Gamot ay Laging Bago</p>
              <a href="#products" class="btn btn-success" mt-3>Shop Na</a>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="images/car2.jpg"
              class="d-block w-100 carousel-img home"
              alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="fw-bold">Fresh Products, Everyday</h1>
              <p>Gamot ay Laging Bago</p>
              <a href="#products" class="btn btn-success" mt-3>Shop Na</a>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="images/car3.jpg"
              class="d-block w-100 carousel-img home"
              alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="fw-bold">Fresh Products, Everyday</h1>
              <p>Gamot ay Laging Bago</p>
              <a href="#products" class="btn btn-success" mt-3>Shop Na</a>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="images/car4.jpg"
              class="d-block w-100 carousel-img home"
              alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <h1 class="fw-bold">Fresh Products, Everyday</h1>
              <p>Gamot ay Laging Bago</p>
              <a href="#products" class="btn btn-success" mt-3>Shop Na</a>
            </div>
          </div>
        </div>
      </div>

      <div class="container py-5">
        <div class="row">
          <div class="col-md-8 py-3">
            <h1>Announcements</h1>
            <p>
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
            </p>
          </div>
          <div class="col-md-4 py-3">
            <h1>Updates</h1>
            <p>
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
              Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
            </p>
          </div>
        </div>
      </div>
    </section>

    <hr />

    <section id="products" class="container py-5 my-5">
      <?php
      include 'db.php';
      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);
      ?>

      <div class="row g-4">
        <?php
        if ($result->num_rows > 0) {
          while ($product = $result->fetch_assoc()) {
        ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="card overflow-hidden h-100 ">
                <img src="images/<?php echo $product['p_img']; ?>" class="card-img-top" height="200" alt="Product image" />

                <div class="card-body">
                  <h5 class="card-title"> <?php echo $product['p_name']; ?> </h5>
                  <p class="card-text">₱<?php echo $product['p_price']; ?> </p>

                  <div id="action-buttons">
                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modal"
                      onclick="openBuyNow(
                    <?php echo $product['p_id']; ?>,
                    '<?php echo addslashes($product['p_name']); ?>',
                    <?php echo $product['p_price']; ?>,
                    <?php echo $product['p_stocks']; ?>
                    '<?php echo addslashes($product['p_img']); ?>'
                    )"> Buy Now </button>
                    <button class="btn btn-sm btn-outline-success" onclick="addToCart(<?php echo $product['p_id']; ?>)">
                      Add to Cart
                    </button>
                  </div>

                  <p class="card-text small mt-2 ms-1">Stocks: <?php echo $product['p_stocks']; ?> </p>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo "<p>No products available.</p>";
        }
        $conn->close();
        ?>
      </div>
    </section>

    <hr />

    <section id="about" class="row p-5 my-5">
      <div class="col-md-6 text-center">
        <h2 class="mb-4 fw-bold">About isssss</h2>
        <p>
          Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
          Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
          Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
          Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
          Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
          Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
        </p>
        <p>
          Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
          Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
          Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
          Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
          Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem
          Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum
        </p>
      </div>

      <div
        id="carouselAutoplaying2"
        class="carousel slide carousel-fade col-md-6"
        data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="images/farmers.jpg"
              class="d-block w-100 carousel-img about"
              alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <a href="#products" class="btn btn-success" mt-3>Shop Na</a>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="images/farmers1.jpg"
              class="d-block w-100 carousel-img about"
              alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <a href="#products" class="btn btn-success" mt-3>Shop Na</a>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="images/farmers2.jpg"
              class="d-block w-100 carousel-img about"
              alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <a href="#products" class="btn btn-success" mt-3>Shop Na</a>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="images/farmers3.jpg"
              class="d-block w-100 carousel-img about"
              alt="..." />
            <div class="carousel-caption d-none d-md-block">
              <a href="#products" class="btn btn-success" mt-3>Shop Na</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr />

    <section id="contact" class="container py-5 my-5">
      <h2 class="text-center mb-4 fw-bold">Contact isssss</h2>

      <div class="row">
        <form action="">
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Your Name" />
          </div>
          <div class="mb-3">
            <input
              type="email"
              class="form-control"
              placeholder="Your Email" />
          </div>
          <div class="mb-3">
            <textarea
              class="form-control"
              rows="4"
              placeholder="Your Message"></textarea>
          </div>
          <button class="btn btn-success w-100">Send Message</button>
        </form>
      </div>
    </section>

  </main>

  <section id="buy-modal">
    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <form action="purchase.php" method="POST" id="buyNowForm">

            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Purchase</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <input type="hidden" name="p_id" id="modalp_id">
              <img id="modalp_image" src="" alt="Product image" class="image-fluid mb-3" />
              <p><strong>Product:</strong> <span id="modalp_name"></span> </p>
              <p><strong>Price:</strong> ₱<span id="modalp_price"></span> </p>
              <p><strong>Stocks:</strong> <span id="modalp_stocks"></span> </p>
            </div>

            <div class="modal-footer">
              <div class="text-start">
                <label>Quantity</label>
                <input type="number" name="quantity" id="modalQuantity" class="form-control" value="1" min="1">
                <strong>Total Amount: </strong>
                ₱<span id="modalTotalAmount">0.00</span>
              </div>
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-success">Confirm</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer class="bg-dark text-light mt-auto ">
    <div class="container py-4">
      <div class="row">
        <div class="col-md-4 mb-3">
          <h5>Bahay</h5>
          <p class="small">
            Your trusted store for quality products and services.
          </p>
        </div>

        <div class="col-md-4 mb-3">
          <h5>Quick Links</h5>
          <ul class="list-unstyled">
            <li>
              <a href="#home" class="text-light text-decoration-none">Home</a>
            </li>
            <li>
              <a href="#products" class="text-light text-decoration-none">Products</a>
            </li>
            <li>
              <a href="#about" class="text-light text-decoration-none">About Us</a>
            </li>
            <li>
              <a href="#contact" class="text-light text-decoration-none">Contact</a>
            </li>
          </ul>
        </div>

        <div class="col-md-4 mb-3">
          <h5>Contact</h5>
          <p class="small mb-1">Phillipines</p>
          <p class="small mb-1">0912-345-6789</p>
          <p class="small">bahay@gmel.kom</p>
        </div>
      </div>

      <hr class="border-secondary" />

      <div class="text-center small">© 2026 Bahay. All rights reserved.</div>
    </div>
  </footer>
</body>

<script>
  let currentPrice = 0;

  function openBuyNow(id, name, price, stocks) {
    currentPrice = price;

    document.getElementById("modalp_id").value = id;
    document.getElementById("modalp_name").innerText = name;
    document.getElementById("modalp_price").innerText = price.toFixed(2);
    document.getElementById("modalp_stocks").innerText = stocks;

    document.getElementById("modalp_image").src = imgPath;

    document.getElementById("modalQuantity").value = 1;
    updateTotal();

    let modal = new bootstrap.Modal(document.getElementById('modal'));
    modal.show();
  }

  function updateTotal() {

    let qty = document.getElementById("modalQuantity").value;
    let total = currentPrice * qty;

    document.getElementById("modalTotalAmount").innerText =
      total.toFixed(2);
  }
  document.getElementById("modalQuantity").addEventListener("input", updateTotal);
</script>

</html>