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
				<h4>访问网站最多的用户</h4>				
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>序号</th>
                        <th>数据库ID</th>
                        <th>用户ID</th>
                        <th>访问次数</th>
                        <th>最后访问时间</th>
                        <th>查看详情</th>                                             
                    </tr>
                    <tr>                        
                        <td>1</td>
                        <td>12</td>
                        <td>517cd37cd759c93</td>  
                        <td>20</td> 
                        <td>2013-04-28 15:38:23</td>
                        <td><a href="#" class="btn btn-small btn-primary">详细情况</a></td>                   
                    </tr>
                    <tr>                        
                        <td>2</td>
                        <td>12</td>
                        <td>517cd37cd759c93</td>  
                        <td>20</td> 
                        <td>2013-04-28 15:38:23</td>
                        <td><a href="#" class="btn btn-small btn-primary">详细情况</a></td>                   
                    </tr>
                    <tr>                        
                        <td>3</td>
                        <td>12</td>
                        <td>517cd37cd759c93</td>  
                        <td>20</td> 
                        <td>2013-04-28 15:38:23</td>
                        <td><a href="#"  class="btn btn-small btn-primary">详细情况</a></td>                   
                    </tr>
                    <tr>                        
                        <td>4</td>
                        <td>12</td>
                        <td>517cd37cd759c93</td>  
                        <td>20</td> 
                        <td>2013-04-28 15:38:23</td>
                        <td><a href="#" class="btn btn-small btn-primary">详细情况</a></td>                   
                    </tr>
                    <tr>                        
                        <td>5</td>
                        <td>12</td>
                        <td>517cd37cd759c93</td>  
                        <td>20</td> 
                        <td>2013-04-28 15:38:23</td>
                        <td><a href="#"  class="btn btn-small btn-primary">详细情况</a></td>                   
                    </tr>                   

                    
                </table>
			</div> 

                   
		</div>
		<!--右侧内容--> 
		
	</div>
</div>
<!--内容-->
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
</script>
