<?php

class inoxstarConfiguration extends sfApplicationConfiguration
{
  	public function configure()
	{
	}
	public function loadHelpers($module)
	{
		return sfLoader::loadHelpers($module);
	}
}
