<div class="span10"><!--右侧内容-->            
            			
			<div class="row-fluid linenums">
				<h4>注册的比例</h4>				
                
			</div>

            <div class="row-fluid linenums">
				<h4>网站注册情况统计(今日)</h4>				
                <table class="table table-bordered table-hover">
                    <tbody><tr>
                        <th>&nbsp;</th>
                        <th>总数</th>
                        <th>注册总数</th>
                        <th>IB注册</th>
                        <th>DEMO注册</th>
                        <th>pomotion</th>
                        <th>other</th>                     
                    </tr>
                    <tr>
                        <th>人数</th>
                        <td>1038</td>
                        <td>20</td>
                        <td>14</td>  
                        <td>15</td> 
                        <td>10</td>
                        <td>40</td>                   
                    </tr>
                    <tr>
                        <th>比率</th>
                        <td>20%</td>
                        <td>5%</td>
                        <td>40%</td> 
                        <td>15%</td>
                        <td>10%</td>
                        <td>10.25%</td>
                    </tr>
                </tbody></table>
			</div>


            <div class="row-fluid linenums">
				<div id="container" style="min-width: 400px; height: 400px; margin: 0 auto"></div>               
			</div>

            
                   
		</div>
		<!--右侧内容--> 
		
	</div>
</div>
<!--内容-->
<script src="/application/data/js/highcharts.js"></script>
<script src="/application/data/js/modules/exporting.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
    
        var colors = Highcharts.getOptions().colors,
            categories = ["注册","未注册"],
            name = '注册成功比率',
            data = [{
                    y: 20,
                    color: colors[0],
                    drilldown: {
                        name: '已注册',
                        categories: ["IB","DEMO","pomotion","other"],
                        data: [5,8,4,3],
                        color: colors[0]
                    }
                }, {
                    y: 80,
                    color: colors[1],
                    drilldown: {
                        name: '未注册',
                        categories: ["未注册"],
                        data: [80],
                        color: colors[1]
                    }
                }];
    
    
        // Build the data arrays
        var browserData = [];
        var versionsData = [];
        for (var i = 0; i < data.length; i++) {
    
            // add browser data
            browserData.push({
                name: categories[i],
                y: data[i].y,
                color: data[i].color
            });
    
            // add version data
            for (var j = 0; j < data[i].drilldown.data.length; j++) {
                var brightness = 0.2 - (j / data[i].drilldown.data.length) / 5 ;
                versionsData.push({
                    name: data[i].drilldown.categories[j],
                    y: data[i].drilldown.data[j],
                    color: Highcharts.Color(data[i].color).brighten(brightness).get()
                });
            }
        }
    
        // Create the chart
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container',
                type: 'pie'
            },
            title: {
                text: '注册人数的比例'
            },
            yAxis: {
                title: {
                    text: '注册人数的比例'
                }
            },
            plotOptions: {
                pie: {
                    shadow: false
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.y +' %';
                }
            },
            series: [{
                name: 'Browsers',
                data: browserData,
                size: '60%',
                dataLabels: {
                    formatter: function() {
                        return this.y > 5 ? this.point.name : null;
                    },
                    color: 'white',
                    distance: -30
                }
            }, {
                name: 'Versions',
                data: versionsData,
                innerSize: '60%',
                dataLabels: {
                    formatter: function() {
                        // display only if larger than 1
                        return this.y > 1 ? '<b>'+ this.point.name +':</b> '+ this.y +'%'  : null;
                    }
                }
            }]
        });
    });
    
});
		</script>
