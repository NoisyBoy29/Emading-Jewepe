<!-- Header -->
<?php
include('template/header.php');
include('admin/config_query.php');

// Check if the article ID is set in the URL
if (isset($_GET['id_artikel'])) {
  // Sanitize the input to prevent SQL injection
  $articleId = intval($_GET['id_artikel']);

  // Instantiate the database class
  $db = new database();

  // Retrieve the article information based on the provided ID
  $article = $db->get_artikel_by_id($articleId);

  if ($article) {
    // Display article information
?>

    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('assets/landing/images/hero_5.jpg');">
      <div class="container">
        <div class="row same-height justify-content-center">
          <div class="col-md-6">
            <div class="post-entry text-center">
              <h1 class="mb-4"><?php echo $article['judul']; ?></h1>
              <div class="post-meta align-items-center text-center">
                <!-- You can use actual user data from your database -->
                <span class="d-inline-block mt-1">Dibuat Oleh <a><?php echo $article['name'];?></a></span>
                <br>
                <span>&nbsp;Pada :&nbsp; <?php echo $article['created_at']; ?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="section">
      <div class="container">
        <div class="row blog-entries element-animate">
          <div class="col-md-12 col-lg-12 main-content">
            <div class="post-content-body">
              <?php echo $article['isi']; ?>
            </div>
          </div>
          <!-- END main-content -->
        </div>
      </div>
    </section>

<?php
  } else {
    // Handle the case where the article is not found
    echo "<p>Article not found.</p>";
  }
} else {
  // Handle the case where no article ID is provided
  echo "<p>No article ID provided.</p>";
}

// Footer
include('template/footer.php');
?>