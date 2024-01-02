<!-- Header -->
<?php
include('template/header.php');
include('admin/config_query.php');

// Instantiate the database class
$db = new database();
$articles = $db->show_publish_data(); // Get articles from the database
?>

<!-- Start posts-entry -->
<section class="section">
	<div class="container">

		<div class="row mb-4">
			<div class="col-sm-6">
				<h2 class="posts-entry-title">E-Mading</h2>
			</div>
		</div>
		<!-- Check if $articles is empty -->
		<?php if (empty($articles)) : ?>
			<div class="row">
				<div class="col">
					<p>Data kosong. Tidak ada yang ditampilkan.</p>
				</div>
			</div>
		<?php else : ?>
		<!-- Loop through the articles and display them -->
		<div class="row">
			<?php foreach ($articles as $article) : ?>
				<div class="col-lg-4 mb-4">
					<div class="post-entry-alt">
						<!-- Link to the detail page with the specific article ID -->
						<a href="detail.php?id_artikel=<?= $article['id_artikel']; ?>" class="img-link">
							<!-- Use an absolute path for the image source -->
							<img src="files/<?php echo $article['sampul']; ?>" alt="Image" class="img-fluid" style="max-width: 100px;">
						</a>
						<div class="excerpt">
							<h2><a href="detail.php?id_artikel=<?= $article['id_artikel']; ?>"><?php echo $article['judul']; ?></a></h2>
							<div class="post-meta align-items-center text-left clearfix">
								<span class="d-inline-block mt-1">By <a href="#"><?php echo $article['name']; ?></a></span>
								<span>&nbsp;-&nbsp; <?php echo $article['created_at']; ?></span>
								<br>
								<span>Kategori : <?php echo $article['kategori']; ?></span>
							</div>
							<p><?php echo $article['isi']; ?></p>
							<p><a href="detail.php?id_artikel=<?= $article['id_artikel']; ?>" class="read more">Continue Reading</a></p>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>
</section>

<!-- Footer -->
<?php
include('template/footer.php');
?>
