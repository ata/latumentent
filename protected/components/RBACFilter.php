<?php
class RBACFilter extends CFilter
{
    public $controller;
    
    protected function preFilter() 
    {
        if (Yii::app()->authManager)
        return true;
    }
}
