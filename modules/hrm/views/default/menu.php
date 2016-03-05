<?php 
use miloschuman\highcharts\Highcharts;

?>
<div class="wrap">

  

    <div class="body-content">

    	<?php
    		echo Highcharts::widget([
			   'options'=>'{
			      "title": { "text": "Key Performance Indicator" },
			      "xAxis": {
			         "categories": ["January", "February", "March"]
			      },
			      "yAxis": {
			         "title": { "text": "Productivity" }
			      },
			      "series": [
			         { "name": "Employee 1", "data": [1, 0, 4] },
			         { "name": "Employee 2", "data": [5, 7,3] }
			      ]
			   }'
			]);
    		
    	?>
        

    </div>
</div>
