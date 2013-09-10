<div class="span10"><!--右侧内容-->
            <div class="row-fluid linenums">
                <div class="control-group"> 
                <label class="control-label">用户ID</label>
                        <input size="16" type="text" value="" />                              
                </div>                

                <div class="control-group">
                    <input type="button" value="查询" class="btn" id="visit_check" />
                </div>
            </div>
            
            <?php foreach($userTrack as $val):
                $time_list = explode(",",$val['time']);
            ?>			
			<div class="row-fluid linenums">
				<h4>用户<?php echo $val['uid'];?>,第<?php echo $val['v_times'];?>次访问.(<?php echo $val['created_at'];?>)</h4>				
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>序号</th>                        
                        <th>页面</th>
                        <th>停留时间</th>
                        <th>访问方式</th>                                        
                    </tr>
                    <?php foreach($val["page"] as $k => $v):?>
                    <tr>                        
                        <td><?php echo $k+1;?></td>
                        <td><?php echo $v['url'];?></td>
                        <td><?php echo isset($time_list[$k]) ? $time_list[$k] : 0;?></td>
                        <td><?php echo $val['type']?></td>                
                    </tr>
                    <?php endforeach;?>
                </table>
			</div>
            <?php endforeach;?> 

            

                   
		</div>
		<!--右侧内容--> 
		
	</div>
</div>
<!--内容-->
