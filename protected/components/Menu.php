<?php
Yii::import('zii.widgets.CMenu');
class Menu extends CMenu
{
	protected function isItemActive($item,$route)
	{
		if(isset($item['url']) && is_array($item['url'])) {
			$url =  trim($item['url'][0],'/');
			$urlSlice = explode('/',$url);
			$routeSlide = explode('/',$route);
			if($urlSlice[0] === $routeSlide[0]) {
				return true;
			}
		}
		return parent::isItemActive($item, $route);
	}
}
