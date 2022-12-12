<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie</title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/app.css">
</head>
<body>

<link rel="stylesheet" href="/path/to/cdn/bootstrap.min.css" />
<script src="/path/to/cdn/bootstrap.bundle.min.js"></script>
    
</body>
</html>

<div id="mySidebar" class="sidebar">
  <!-- Close Button -->
  <a class="closebtn collapsed" id="closeNav" type="button" aria-expanded="false">
    Close
  </a>
  <!-- Accordion Menu -->
  <div class="accordion text-left" id="accordionExample">
    <div class="accordion-item">
      <div class="accordion-header" id="headingOne">
        <h5 class="mb-0">
          <button class="btn accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Accordion 1
          </button>
        </h5>
      </div>
      <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body text-left">
          <p>
            Accordion 1 Content
          </p>
        </div>
      </div>
    </div>
    <div class="accordion-item">
      <div class="accordion-header" id="headingTwo">
        <h5 class="mb-0">
          <button class="btn btn-link accordion-button collapsed custom-button" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Accordion 2
          </button>
        </h5>
      </div>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
          <p>
            Accordion 2 Content
          </p>
        </div>
      </div>
    </div>
    <!-- More Accordion Items Here -->
  </div>
</div>

<button class="openbtn" id="openNav">
  ☰ open
</button>