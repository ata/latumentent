<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class CustomerRegister extends User
{
    public $customerService;
    public $customerNumber;
    //public $customerName;

    public function rules()
    {
	return array(
	    array('username,password,customerNumber,customerService','required'),
	    array('username,customerNumber','unique'),
	    array('password','length','min'=>6),
	);
    }

    public function attributeLabes()
    {
	return array(
	    'customerService'=>Yii::t('app','Layanan'),
	    'customerNumber'=>Yii::t('app','No Apartement'),
	);
    }

    
}
?>
