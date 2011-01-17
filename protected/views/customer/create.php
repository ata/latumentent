<h1>Add Customer</h1>

<?php echo $this->renderPartial('_form', array(
    'customer'=>$customer,
    'services'=>$services,
)); ?>