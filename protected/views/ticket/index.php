<div class="filter">
    <?php echo CHtml::link(Yii::t('app','Complaint'),array('customerComplaint'))?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form">
	<label>Periode</label>
	<select>
	    <option>Januari 2020</option>
	</select>
    </div>
</div>
<div class="list-ticket">
    <table border="1">
	<tr>
	    <td>No</td>
	    <td>Permasalahan</td>
	    <td>Layanan</td>
	    <td>Potongan</td>
	    <td>Status</td>
	</tr>
	<tr>
	    <td>1</td>
	    <td><a href="<?php echo $this->createUrl('replyTicket')?>">Test</a></td>
	    <td>Internet</td>
	    <td>100</td>
	    <td>Open</td>
	</tr>
	<tr>
	    <td>2</td>
	    <td><a href="<?php echo $this->createUrl('replyTicket')?>">Test</a></td>
	    <td>Internet</td>
	    <td>100</td>
	    <td>Open</td>
	</tr>
    </table>
</div>