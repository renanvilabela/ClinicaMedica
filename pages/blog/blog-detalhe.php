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

<section class=" mb-4">
	<div class="container">
		
		<div class="row">
			
			<article class="col-12">
				 <div class="cabecalho mb-4 pb-2">
					<h2 class="topic5">Doenças do coração matam quase um terço dos brasileiros; 
estilo de vida é um dos fatores de risco</h2>
					<time style="color:#3056bb"><img src="assets/img/icones/calendar.jpg" style="vertical-align: baseline;" alt=""> 23 agosto de 2024</time>

					<hr class="">
				 </div>
                

				<p class="text-center">
					<img src="assets/img/foto.jpg" alt="" class="img-fluid mb-3">
				</p>

				<p>
					As doenças cardiovasculares são as mais comuns entre os brasileiros e também a principal causa de morte. Segundo a Sociedade Brasileira de Cardiologia, o percentual é maior que todos os cânceres juntos, problemas respiratórios, violência e acidentes de trânsito.
				</p>

				<p>
					Isso acontece porque as patologias do coração são muitas e acometem grande parte da população brasileira. Estima-se que, pelo menos, 400 mil pessoas venham a óbito por doenças cardiovasculares ao final de cada ano, o que significa uma morte a cada um minuto e meio. Segundo um artigo publicado do Arquivos Brasileiros de Cardiologia, a pressão arterial sistólica elevada foi o principal fator de risco para a mortalidade por doenças cardiovasculares em 2019.
				</p>

				<p>
					A chegada da pandemia agravou mais um pouco o cenário, já que devido ao isolamento, grande parte da população parou de fazer exercícios físicos e adotou uma alimentação pouco saudável. Além disso, a contaminação por Covid-19 é uma das causas para o surgimento ou piora de doenças cardiovasculares. “Pessoas que contraíram o modo mais agressivo do vírus têm maior chance de desenvolver patologias cardiovasculares após um ano. Por isso, durante as consultas, sempre perguntamos se o paciente já teve coronavírus, pois a doença por si só representa grande risco ao coração”, afirma a Dra. Salete Nacif, cardiologista do Hcor.
				</p>

				<p>
					Em média, o Hcor realiza 250 exames mensais para detectar doenças cardiovasculares. Durante a época mais forte da pandemia, este número caiu 30%, o que representa uma forte propensão ao diagnóstico tardio. Até julho deste ano, a média era de 216, ainda inferior à antes da pandemia. Com a redução do diagnóstico, também houve queda na realização de cirurgias, passando de 155 (2019) para 110, no primeiro ano da pandemia. Atualmente, a média é de 137 cirurgias por mês.
				</p>



		        <p>
		          <a href="javascript:history.go(-1);" class="btn btn-1 mt-3"> &laquo; Voltar</a>
		        </p>
			</article>	


        <div class="col-md-12 mt-4 col-lg-10 col-xl-8">
          <h5 class="topic5">Comentários</h5>
            <div class="comentario mb-3">
              <div class="d-block"> 
                  <h6 class="fw-bold text-primary mb-1">Pedro Paulo</h6>
                  <p class="text-muted small mb-0">
                    Shared publicly - Jan 2020
                  </p>
              </div>

              <p class="mt-3 mb-4 pb-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac arcu a lacus posuere facilisis nec a sapien. Proin mattis, diam id pharetra vulputate, lectus sapien tristique justo, nec vehicula enim turpis sit amet sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque a nunc erat. Cras ut dui ut mi scelerisque cursus.
              </p>
            </div>
        
            <div class="comentario mb-3">
              <div class="d-block"> 
                  <h6 class="fw-bold text-primary mb-1">José Carol</h6>
                  <p class="text-muted small mb-0">
                    Shared publicly - Jan 2020
                  </p>
              </div>

              <p class="mt-3 mb-4 pb-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam ac arcu a lacus posuere facilisis nec a sapien. Proin mattis, diam id pharetra vulputate, lectus sapien tristique justo, nec vehicula enim turpis sit amet sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Quisque a nunc erat. Cras ut dui ut mi scelerisque cursus.
              </p>
            </div>
        

            <form class=" py-3 border-0">
          <h5 class="topic5">Deixe um comentário</h5>
		        <div class="row ">
			        <div class="col-md-12">
			        	<div class="form-group">
			        		<input class="form-control"  type="text" name="" placeholder="Nome"style="border: 1px solid #98a8b1;">
			        	</div>
			        </div>
			        <div class="col-md-12">
			        	<div class="form-group">
                 			<textarea class="form-control" id="" placeholder="Mensagem" rows="4" style="border: 1px solid #98a8b1;"></textarea>
			        	</div>
			        </div>
			        <div class="col-md-12">
			        	<div class="float-right pt-1">
                			<button type="button"  class="btn btn-primary btn-sm" data-mdb-button-initialized="true">PUBLICAR</button>
			        	</div>
			        </div>
			    </div>
            </form>
              
            </div>
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