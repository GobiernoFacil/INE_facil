<footer class="the_end">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<span class="branding">Forjado artesanalmente por</span> 
				<a href="http://gobiernofacil.com/" class="gobiernofacil">Gobierno Fácil</a>
				<p> © 2014 -2015</p>
			</div>
			<div class="col-sm-3 col-sm-offset-4">
				<span class="branding">Este sitio usa herramientas del</span> 
				<a href="http://surrealista.mx/" class="pato">Partido Surrealista</a>
			</div>
		</div>
	</div>
</footer>

<?php //modal 
	if ($body_class == 'candidatos') { include $_SERVER['DOCUMENT_ROOT']."/templates/modal.php";} ?>

<?php if($body_class == "candidatos"): ?>
  <script src="https://maps.googleapis.com/maps/api/js"></script>
  <script src="/js/bower_components/d3/d3.min.js"></script>
  <script src="/js/bower_components/handlebars/handlebars.min.js"></script>
  <script src="/js/main.js"></script>
<?php else: ?>
	<script src="/js/bower_components/countdownjs/countdown.min.js"></script>
	<script src="/js/main.home.js"></script>
<?php endif; ?>

<?php if($body_class == "diputados"): ?>
  <script src="/js/bower_components/d3/d3.min.js"></script>
  <script src="/js/main.partidos.js"></script>
<?php endif; ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-45473222-8', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>