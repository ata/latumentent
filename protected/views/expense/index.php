<h1>Tagihan</h1>
<div class="filter">
    <?php echo CHtml::link(Yii::t('app','Tambah Pengeluaran'),array('addExpense'))?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <div class="form">
	<div class="row">
	    <label>Periode</label>
	    <select>
		<option>Januari 2020</option>
	    </select>
	</div>
	<div class="row">
	    <label>Jenis Pengeluaran</label>
	    <input type="checkbox">Rutin
	    <input type="checkbox">Manual
	</div>
    </div>
</div>
<div class="list-ticket">
    <table border="1">
	<tr>
	    <td>No</td>
	    <td>Nama Pengeluaran</td>
	    <td>Tipe</td>
	    <td>Jumlah</td>
	    <td>Status</td>
	</tr>
	<tr>
	    <td>1</td>
	    <td>Test</td>
	    <td>Internet</td>
	    <td>100</td>
	    <td>bayar</td>
	</tr>
	<tr>
	    <td>2</td>
	    <td><a href="<?php echo $this->createUrl('replyTicket')?>">Test</a></td>
	    <td>Internet</td>
	    <td>100</td>
	    <td>bayar</td>
	</tr>
    </table>
</div>