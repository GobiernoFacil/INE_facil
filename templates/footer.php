<footer class="the_end">
	<div class="container">
		<div class="row">
			<div class="col-sm-5">
				<span class="branding">En desarrollo por</span> 
				<a href="http://gobiernofacil.com/" class="gobiernofacil">Gobierno Fácil</a>
				<p> © 2014 -2015</p>
			</div>
			
		</div>
	</div>
</footer>
 <script>
    /**
    *
    * THE CONFIGURATION FILES
    */

    // the time counter ending
    //
    <?php
	    date_default_timezone_set('America/Mexico_City');
      $now       = time();
      $ends      = mktime(8,0,0,6,7,2015);
      $js_ends   = "(2015,5,7," . date('G', $ends) . ",0,0)";
      $js_starts = "(2015,1," . date('j', $now) . "," . date('G', $now) . "," . date('i', $now) . ",0)";
    ?>
    var timer_ends  = new Date<?php echo $js_ends;   ?>;
    var timer_today = new Date<?php echo $js_starts; ?>;
 </script>

<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="don_pato/js/bower_components/d3/d3.min.js"></script>
<script src="don_pato/js/main.js"></script>
  <script data-main="/js/main" src="/js/bower_components/requirejs/require.js"></script>

</body>
</html>