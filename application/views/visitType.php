<div class="span10"><!--右侧内容-->
            <div class="row-fluid linenums">
                <div class="control-group">
                    <label class="control-label">起始日期</label>
                    <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="start_time" data-link-format="yyyy-mm-dd">
                        <input size="16" type="text" value="" readonly>
                        <span class="add-on"><i class="icon-remove"></i></span>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" id="start_time" value="" /><br/>
                </div>

                <div class="control-group">
                    <label class="control-label">终止日期</label>
                    <div class="controls input-append date form_date" data-date="" data-date-format="yyyy-mm-dd" data-link-field="end_time" data-link-format="yyyy-mm-dd">
                        <input size="16" type="text" value="" readonly>
                        <span class="add-on"><i class="icon-remove"></i></span>
                        <span class="add-on"><i class="icon-th"></i></span>
                    </div>
                    <input type="hidden" id="end_time" value="" /><br/>
                </div>

                <div class="control-group">
                    <input type="button" value="查询" class="btn" id="visit_check" />
                </div>
            </div>

			
			<div class="row-fluid linenums">
				<h4>网站访问情况统计(全部)</h4>				
                <table class="table table-bordered table-hover" id="visitTable">
                    <tr>
                        <th>&nbsp;</th>
                        <th>总数</th>                                           
                    </tr>
                    <tr>
                        <th>人数</th>
                        <td>Loading...</td>                                                                 
                    </tr>
                    <tr>
                        <th>比率</th>
                        <td>Loading...</td>                                               
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
<script type="text/javascript" src="/application/data/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="/application/data/js/locales/bootstrap-datetimepicker.fr.js"></script>
<script type="text/javascript">
$('.form_date').datetimepicker({
    //language:  'fr',
    weekStart: 1,
    todayBtn:  1,
    autoclose: 1,
    todayHighlight: 1,
    startView: 2,
    minView: 2,
    forceParse: 0
});
$(function(){
    getTypeData(0,"<?php echo date('Y-m-d');?>");
});
function getTypeData(start,end){
    //ajax....
    $.get("/index.php/visitType/getTypeData/"+start+"/"+end,function(data){
        
        var tmp = eval("("+data+")");
               

        var val = [{name:tmp['name1'], y:parseInt(tmp['num1']),sliced: true,selected: true},[tmp['name2'],parseInt(tmp['num2'])]];
        var total = parseInt(tmp['num1']) + parseInt(tmp['num2']);

        var html = '<tr><th>&nbsp;</th><th>总数</th><th>'+tmp['name1']+'</th><th>'+tmp['name2']+'</th></tr><tr><th>人数</th><td>'+total+'</td><td>'+tmp['num1']+'</td><td>'+tmp['num2']+'</td></tr><tr><th>比率</th><td>100%</td><td>'+parseInt(tmp['num1'])/total+'</td><td>'+parseInt(tmp['num2'])/total+'</td></tr>';

        document.getElementById('visitTable').innerHTML = html;
        
        
        getPin(val);
    });
    
}

function getPin (val) {
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
                text: '网站访问情况统计(全部)'
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
                name: '访问来源比率图',
                data: val
            }]
        });
    });
    
};
</script>