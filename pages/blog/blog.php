<?php 

$title_page = "Blog | ";
include dirname(__FILE__). '/../includes/header.php'; ?>


<main class="main mb-0" data-animate="top" data-delay="3">
<aside class="banner_topo bnr-blog"></aside>
	 
<header class="page-header" >
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>
					<span>Blog</span>
				</h1>
			</div>
		</div>
	</div>
</header>

<section class=" mb-0">
	<div class="container">
		
		<div class="row">

			<div class="col-12 mb-4">
				<form class="row">
					<div class="col-lg-9 col-8">
						<input class="form-control form-control-lg" style="border: 1px solid #98a8b1;padding: 11px;" type="text" placeholder="Buscar">
					</div>
					<div class="col-lg-3 col-4">
						<button type="submit" class="btn btn-primary w-100">BUSCAR</button>
					</div>
				</form>
			</div>
		
		<?php for ($i=1; $i <=9 ; $i++) { ?> 
				
			<div class="col-lg-4 mb-5">
				<div class="blog_content box-shadow mb-3">
					<a href="blog/detalhe" class="zoom_image mb-3">
						<img src="assets/img/blog.jpg" alt="" />
					</a>

					<div class="chamada_blog">
						<h3 class="">
							Primeiro Simpósio de Fonoaudiologia
						</h3>

						<p>
							O primeiro Simpósio de Fonoaudiologia foi incrível graças a cada um de vocês que esteve presente. Agradecemos por compartilharem conhecimento e entusiasmo. Juntos, construímos uma jornada inesquecível!
						</p>
					</div>
				</div>
				<a href="blog/detalhe" class="leia">Saiba mais</a>
			</div><!-- col-lg-4 -->

		<?php } ?>

 			<div class="col-12 my-3">

 				<nav aria-label="Paginação">
				  <ul class="pagination justify-content-center">
				    <li class="page-item ">
				      <a class="page-link" href="javascript:;" tabindex="-1">Anterior</a>
				    </li>
				    <li class="page-item active"><a class="page-link" href="javascript:;">1</a></li>
				    <li class="page-item"><a class="page-link" href="javascript:;">2</a></li>
				    <li class="page-item"><a class="page-link" href="javascript:;">3</a></li>
				    <li class="page-item">
				      <a class="page-link" href="javascript:;">Próximo</a>
				    </li>
				  </ul>
				</nav>

 			</div>

		</div><!-- row -->

	</div> <!-- container -->
</section>

<aside>
<?php
	$banner = rand(1,6);
?>
	<a href="<?=$config['whatsapp'];?>" target="_blank">
		<img src="assets/img/banner/0<?=$banner;?>.png" class="d-none d-md-block w-100">
		<img src="assets/img/banner/mobile0<?=$banner;?>.jpg" class="d-block d-md-none w-100">
	</a>
</aside>
</main>


<?php 

include dirname(__FILE__). '/../includes/footer.php';

?>