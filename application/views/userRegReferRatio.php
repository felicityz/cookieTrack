<div class="span10"><!--右侧内容-->            
            			
			<div class="row-fluid linenums">
				<h4>成功注册来源比例</h4>				
                
			</div>

            <div class="row-fluid linenums">
				<h4>网站访问情况统计(今日)</h4>				
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>&nbsp;</th>
                        <th>总数</th>
                        <th>baidu-cpc</th>
                        <th>baidu-wm</th>
                        <th>google</th>
                        <th>renren</th>
                        <th>other</th>                     
                    </tr>
                    <tr>
                        <th>人数</th>
                        <td>1038</td>
                        <td>12</td>
                        <td>14</td>  
                        <td>15</td> 
                        <td>10</td>
                        <td>40</td>                   
                    </tr>
                    <tr>
                        <th>比率</th>
                        <td>100%</td>
                        <td>12.5%</td>
                        <td>12.28%</td> 
                        <td>15%</td>
                        <td>10%</td>
                        <td>40.25%</td>
                    </tr>
                </table>
			</div> 

            <div class="row-fluid linenums">
                <div id="visitUser" style="height:400px;"></div>
            </div> 
                   
		</div>
		<!--右侧内容--> 
		
	</div>
</div>
<!--内容-->
<script type="text/javascript" src="/application/data/js/highcharts.js"></script>
<script type="text/javascript" src="/application/data/js/modules/exporting.js"></script>
<script type="text/javascript">

$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'visitUser',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: '网站访问情况统计(今日)'
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        color: '#000000',
                        connectorColor: '#000000',
                        formatter: function() {
                            return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                        }
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                data: [
                    ['baidu-cpc',20],
                    ['baidu-wm',25],
                    {
                        name: 'google',
                        y: 20,
                        sliced: true,
                        selected: true
                    },
                    ['reren',    15],                    
                    ['Others',   20]
                ]
            }]
        });
    });
    
});
</script>
