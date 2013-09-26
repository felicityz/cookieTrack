<div class="span10"><!--右侧内容-->
			<div class="row-fluid">
				<div id="container" style="min-width: 400px; height: 350px;"></div>
			</div>
			<div class="row-fluid linenums">
				<h4>网站基本情况统计</h4>
				<table class="table table-bordered table-hover">
					<tr>
						<th>访问人数</th>
						<th>注册总数</th>
						<th>访问注册比率</th>						
					</tr>
					<tr>
						<td><?php echo $visitNum;?></td>
						<td><?php echo $regNum;?></td>
						<td><?php echo sprintf("%.2f",$regNum/$visitNum);?>%</td>						
					</tr>
				</table>
			</div>


            <div class="row-fluid linenums">
                <h4>网站用户来源统计</h4>
                               
                <table class="table table-bordered table-hover">
                    
                    <tr>
                        <th>&nbsp;</th>
                        <th>总数</th>
                        <?php foreach($getVisitTypeNumber['type'] as $val):?>
                        <th><?php echo $val;?></th>
                        <?php endforeach;?>
                    </tr>
                    <tr>
                        <th>人数</th>
                        <td><?php echo $getSumTypeNumber;?></td>
                        <?php foreach($getVisitTypeNumber['v_times'] as  $val):?>
                        <td><?php echo $val;?></td>
                        <?php endforeach;?>                                          
                    </tr>
                    <tr>
                        <th>比率</th>
                        <td>100%</td>
                        <?php foreach($getVisitTypeNumber['v_times']  as $key => $val):?>
                        <td><?php echo sprintf("%.2f",$val/$getSumTypeNumber)*100,"%";?></td>
                        <?php endforeach;?>                        
                    </tr>
                </table>
            </div>

            <div class="row-fluid linenums">
                <h4>网站页面访问统计</h4>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th></th>
                        <th>页面</th> 
                        <th>访问次数(次)</th>                       
                        <th>总访问时间(s)</th>                        
                        <th>平均时间(s/次)</th>                        
                    </tr>                    

                    <?php foreach($pageData as $k => $v):?>
                    <tr>
                        <th><?php echo $k+1;?></th>                        
                        <td><?php echo $v["url"]?></td>
                        <td><?php echo $v["v_times"]?></td>
                        <td><?php echo $v["time"]?></td>
                        <td><?php echo sprintf("%.2f",$v["time"]/$v["v_times"]);?></td>                        
                    </tr>
                    <?php endforeach;?>
                    
                </table>
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
                renderTo: 'container',
                zoomType: 'xy'
            },
            title: {
                text: '一周统计'
            },
            subtitle: {
                text: '说明/来源'
            },
            xAxis: [{
                categories: [<?php echo $preWeek;?>]
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    formatter: function() {
                        return this.value+'(人)';
                    },
                    style: {
                        color: '#89A54E'
                    }
                },
                title: {
                    text: '访问人数',
                    style: {
                        color: '#89A54E'
                    }
                }
            }, { // Secondary yAxis
                title: {
                    text: '注册人数',
                    style: {
                        color: '#4572A7'
                    }
                },
                labels: {
                    formatter: function() {
                        return this.value +'(人)';
                    },
                    style: {
                        color: '#4572A7'
                    }
                },
                opposite: true
            }],
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +"(人)";
                }
            },
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 120,
                verticalAlign: 'top',
                y: 100,
                floating: true,
                backgroundColor: '#FFFFFF'
            },
            series: [{
                name: '注册人数',
                color: '#4572A7',
                type: 'column',
                yAxis: 1,
                data: [<?php echo rtrim(implode(",",$regWeekNum),",");?>]
    
            }, {
                name: '访问人数',
                color: '#89A54E',
                type: 'spline',                
                data: [<?php echo rtrim(implode(",",$visitWeekNum),",");?>]
            }]
        });
    });
    
});
</script>