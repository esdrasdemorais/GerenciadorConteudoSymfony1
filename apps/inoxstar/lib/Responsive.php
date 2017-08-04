<?php
class Responsive
{
	public $info;
	private $wurflManager;
	private $requestingDevice;

	public function __construct()
	{
		$this->info = $_SERVER;
		$this->initWurflApi();
	}
	
	private function initWurflApi()
	{
		require_once dirname(__FILE__) . '/../../../plugins/wurfl_php/examples/demo/inc' . 
					 '/wurfl_config_standard.php';
		if ($wurflManager instanceof WURFL_WURFLManager) {
			$this->wurflManager = $wurflManager;
			$this->requestingDevice = $this->
					wurflManager->
					getDeviceForHttpRequest($this->info);

			#var_dump($this->requestingDevice->getAllCapabilities());die;
		}
	}
	
	private function isMobile()
	{
		if ($this->wurflManager instanceof WURFL_WURFLManager) {
			return 'true' === $this->requestingDevice->getCapability(
				'can_assign_phone_number'
			);
		}
		return preg_match('/\bmobile\b/i', $this->info['HTTP_USER_AGENT']);
	}
	
	private function isTablet()
	{
		if ($this->wurflManager instanceof WURFL_WURFLManager) {
			return 'true' == $this->requestingDevice->getCapability(
					'is_tablet'
			);
		}
		return preg_match('/\btablet\b/i', $this->info['HTTP_USER_AGENT']);
	}
	
	private function isPC()
	{
		if ($this->wurflManager instanceof WURFL_WURFLManager) {
			return 'false' == $this->requestingDevice->getCapability(
				'can_assign_phone_number' 
			) && 'false' == $this->requestingDevice->getCapability(
				'is_tablet'
			);
		}
		return preg_match('/\bdesktop\b/i', $this->info['HTTP_USER_AGENT']);
	}

	private function isValidRequest()
	{
		// Forbiden CLI Request
		return (false !== array_key_exists('HTTP_USER_AGENT', $this->info)
				&& false !== array_key_exists('SERVER_ADDR', $this->info)
				&& true === in_array($this->info['SERVER_ADDR'], 
						     sfConfig::get('app_srv_ip')));


	}
	
	private function isPCValidRequest()
	{
		return 
			preg_match('/\bwindows|win32\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\blinux\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\bmacintosh|mac os x\b/i', 
				$this->info['HTTP_USER_AGENT'])
			|| 'true' == $this->requestingDevice->getCapability(
				'is_smarttv'
			) && $this->isValidRequest();
	}
	
	private function isTabletValidRequest()
	{
		if ($this->wurflManager instanceof WURFL_WURFLManager) {
			return 'Android' == $this->requestingDevice->getCapability(
				'device_os'
			) || true === preg_match('/\bmacintosh|mac os x|mac\b/i', 
				$this->requestingDevice->getCapability('device_os')
			) || true === preg_match('/\bwindows|win32\b/i',
				$this->requestingDevice->getCapability('device_os')
			) && 'false' == $this->requestingDevice->getCapability(
				'is_smarttv'
			) && $this->isValidRequest();
		}
		return (preg_match('/\bandroid\b/i', $this->info['HTTP_USER_AGENT']) 
			||  preg_match('/\biphone\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\bwindows\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\ubuntu\b/i', $this->info['HTTP_USER_AGENT']));
	}
	
	private function isMobileValidRequest()
	{
		if ($this->wurflManager instanceof WURFL_WURFLManager) {
			return 'Android' == $this->requestingDevice->getCapability(
				'device_os'
			) || true === preg_match('/\bmacintosh|mac os x|mac\b/i', 
				$this->requestingDevice->getCapability('is_ios') 
			) || true === preg_match('/\bwindows|win32\bi',
				$this->requestingDevice->getCapability('device_os')
			) && 'false' == $this->requestingDevice->getCapability(
				'is_smarttv'	
			) && $this->isValidRequest();
		}
		
		return (preg_match('/\bandroid\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\biphone\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\bwindows\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\bsymbiam\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\firefox\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\sailfish\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\sailfish\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\tizen\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\ubuntu\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\limo\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\maemo\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\meego\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\palm\b/i', $this->info['HTTP_USER_AGENT'])
			||  preg_match('/\webos\b/i', $this->info['HTTP_USER_AGENT']));
	}
	
	public function getLayoutType()
	{
		if (true === $this->isTablet() && 
			  true === $this->isTabletValidRequest()
		) {
			return 'table';
		} elseif (true === $this->isMobile() && 
		    true === $this->isMobileValidRequest()
		) {
			return 'mobile';
		} elseif (true === $this->isPC() && 
			  true === $this->isPCValidRequest()
		) {
			return 'desktop';
		} elseif ($this->isValidRequest()) {
			return 'desktop';
		} else {
			throw new Exception(
				'Invalid Request - ' . 
				$this->info['USER_AGENT'] . ' - ' . 
				$this->info['HTTP_REFERER']
			);
		}
	}
}
