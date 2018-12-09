

<script type="text/javascript" src="page/sms/js/sms_script.js"></script>
<link rel="stylesheet" type="text/css" href="page/index/style.css">

<?php

$list=array();
//$res=$sms->make_sms_array("01991223020","Hello Normal Phone");
//array_push($list, $res);
$msg="Dear Hamza,
Your Monthly Fee 'Sep-2018' in 'SSC Program 2018' is Successfully Taken.

Payment ID: 54
Pay: 200 Tk.
Due: 300 Tk.

@TechSerm
01991223020";
$res=$sms->make_sms_array("01777564786",$msg);
array_push($list, $res);
//$sms->send_sms($list);
//print_r($list);
$info=$sms->sms_balance();

?>

 <div class="row" style="">

                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-users fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Total SMS
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $info['total_sms']; ?>
                                    <span id="sparklineA"></span>
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-money fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Total Send
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $info['total_send']; ?>
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-bell fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Total Expire
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $info['ex']; ?>
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-3 col-sm-6">
                        <div class="circle-tile">
                            <a href="#">
                                <div class="circle-tile-heading dark-blue">
                                    <i class="fa fa-bell fa-fw fa-3x"></i>
                                </div>
                            </a>
                            <div class="circle-tile-content dark-blue">
                                <div class="circle-tile-description text-faded">
                                    Total Balance
                                </div>
                                <div class="circle-tile-number text-faded">
                                    <?php echo $info['balance']; ?>
                                </div>
                                <a href="#" class="circle-tile-footer">More Info <i class="fa fa-chevron-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
        </div>


    <div class="row" style="margin-top: -35px;">
    	<script type="text/javascript">
    		$(document).ready(function() {
   				 $('table.display').DataTable();
			} );
    	</script>
    	

        <div class="col-md-6">
            <div class="dashboard_box">
                <div class="box_header">Buy SMS List</div>
                <div class="box_body">
                	 <div class="pull-rightt" style="margin-top: -20px;">
						<center><button class="button" onclick="buy_sms_btn()">+ Add SMS</button></center>
					</div>
                
                	<table id="" class="display" width="100%">
                		<thead style="width: 100%;">
                		<tr>
                			<td class="td_list1"></td>
                			<td class="td_list1">#</td>
                			<td class="td_list1">Total Buy SMS</td class="td_list1">
                			<td class="td_list1">Total Use</td class="td_list1">
                			<td class="td_list1">Buy Date</td class="td_list1">
                			<td class="td_list1">Expire Date</td class="td_list1">
                			<td class="td_list1">Add By</td class="td_list1">
                			<td class="td_list1">Status</td class="td_list1">
                		</tr>
                	</thead>
                	<tbody>
                		<?php 

						$info=$sms->get_buy_sms_list();
                		foreach ($info as $key => $value) {

                			$end=$value['end'];
                			$now=strtotime($db->date());
                			$now=date("Y-m-d", $now);
                			$status="<font color='red'>Expired</font>";
                			if($end>=$now)$status="<font color='green'>Active</font>";
                		 ?>
 
						<tr>
							<td class="td_list2"></td>
                			<td class="td_list2"><?php echo $value['id']; ?></td>
                			<td class="td_list2"><?php echo $value['total_sms']; ?></td class="td_list1">
                			<td class="td_list2"><?php echo $value['total_send']; ?></td class="td_list1">
                			<td class="td_list2"><?php echo $value['start']; ?></td class="td_list1">
                			<td class="td_list2"><?php echo $value['end']; ?></td class="td_list1">
                			<td class="td_list2"><?php echo $value['user']; ?></td class="td_list1">
                			<td class="td_list2"><?php echo $status; ?></td class="td_list1">
                		</tr>
                		<?php } ?>
                		</tbody>
                	</table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="dashboard_box">
                <div class="box_header">Send SMS List</div>
                <div class="box_body">
                	<table id="" class="display" width="100%">
                		<thead style="width: 100%;">
                		<tr>
                			<td class="td_list1"></td>
                			<td class="td_list1">#</td>
                			<td class="td_list1">Phone Number</td class="td_list1">
                			<td class="td_list1">Message</td class="td_list1">
                			<td class="td_list1">Time</td class="td_list1">
                			<td class="td_list1">Sender</td class="td_list1">
                		</tr>
                	</thead>
                	<tbody>
                		<?php 
                		$info=$sms->get_send_sms_list();
                		foreach ($info as $key => $value) {
                          $date=$value['date'];
                          $date=$site->timeAgo($date);
                		 ?>
 
						<tr>
							<td class="td_list2"></td>
                			<td class="td_list2"><?php echo $value['id']; ?></td>
                			<td class="td_list2"><?php echo $value['number']; ?></td class="td_list1">
                			<td class="td_list2"><?php echo $value['message']; ?></td class="td_list1">
                			<td class="td_list2"><?php echo $date; ?></td class="td_list1">
                			<td class="td_list2"><?php echo $value['user']; ?></td class="td_list1">
                		</tr>
                		<?php } ?>
                		</tbody>
                	</table>
                </div>
            </div>
        </div>
        

    </div>    

<style type="text/css">
    thead{
    	background-color: #EFF0F2;
    	border-width: 0px;
    }
	.td_list1{
		background-color: #EFF0F2;
		color: #000000;
		padding: 10px;
		font-weight: bold;
		border: 1px solid #C6C9D1;
		text-align: center;
	}
	.td_list2{
		background-color: #ffffff;
		color: #000000;
		padding: 8px;
		border: 1px solid #C6C9D1;
		text-align: center;
	}
</style>