
<h2><?php echo Yii::t('app','{service} Ticket Detail',array('{service}' => $ticket->service->name)) ?></h2>
<div class="ticket">
	<div class="head span-24 last">
		<span class="title span-22"><h3><?php echo $ticket->title; ?></h3></span>
		<span class="status span-2 last"><?php echo $ticket->statusLabel; ?></span>
	</div>
	<div class="body">
		
	</div>
</div>
