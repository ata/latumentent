
<h2><?php echo Yii::t('app','{service} Ticket Detail',array('{service}' => $ticket->service->name)) ?></h2>
<div class="ticket">
	<div class="head span-24 last">
		<span class="title span-22"><h3><?php echo $ticket->title; ?></h3></span>
		<span class="status span-2 last"><?php echo $ticket->statusLabel; ?></span>
	</div></br>
	<div class="body">
		<span class="author span-20"><h4><?php echo $ticket->author->fullname; ?></h4></span>
		<span class="date span-4 last"><?php echo $ticket->time_open; ?></span>
	</div>
</div>
