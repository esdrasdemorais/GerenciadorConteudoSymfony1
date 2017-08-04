<?php

/**
 * Subclass for representing a row from the 'pr_ph_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class PrPhInoxStar extends BasePrPhInoxStar
{
	private $sfWebRequest;
	private $uploadedFile;

	private static $filePath;
	private static $relativePath;
	
	public function __construct()
	{
		static::$relativePath = DIRECTORY_SEPARATOR . 'images' . 
		 	DIRECTORY_SEPARATOR . 'products' . DIRECTORY_SEPARATOR;

 		static::$filePath = sfConfig::get('sf_web_dir') . 
			static::$relativePath;
	}

	public function setSfWebRequest($sfWebRequest)
	{
		$this->sfWebRequest = $sfWebRequest;
	}

	public function setUploadedFile($uploadedFile)
	{
		$this->uploadedFile = $uploadedFile;
	}

	public function setFile(sfWebRequest $sfWebRequest)
	{
		$this->setSfWebRequest($sfWebRequest);

		foreach ($sfWebRequest->getFileNames() as $uploadedFile) {
		    $typeExt = explode("/", 
			$sfWebRequest->getFileType($uploadedFile));
		    
	    	    if (count($typeExt) > 0) {
			$fileName = $sfWebRequest->getFileName($uploadedFile);
			$fileName = $this->normalizeName($fileName);
		        $this->setNam($fileName);
			
			$this->setTyp($typeExt[0]);
		        $this->setExt($typeExt[1]);
			$this->setUploadedFile($uploadedFile);
 		    }
		}
	}

	public function normalizeName($productName)
	{
	    $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
  	    $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
  		$productName = str_replace($a, $b, $productName); 
		return strtolower(
		    preg_replace(
		        array("/([^a-z0-9 _|$^\.a-z0-9 _{3})])/i", "/[ _]/", 
				"/^-|-$/", "/^_|_$/"),
		        array("", "_", "", ""), 
			$productName
		    )
		);
	}

	public function savePhoto(PrInoxStar $productModel)
	{
		if (true === $this->createPhotoWithThumbs(
		    $productModel->getId())
		) {
		    	$this->setPrId($productModel->getId());
		    	return $this->save();
		}
		
		return false;
	}

	/** Refactor to create thumbnails to pc and mobile dimensions */
	private function createPhotoWithThumbs($productId)
	{
		try {
		    //$uploadedPath = $sfWebRequest->getFilePath($uploadedFile);
		    $fileNew = static::$filePath . DIRECTORY_SEPARATOR . 
			$productId . DIRECTORY_SEPARATOR . 
 			$this->getNam();

		    return $this->sfWebRequest->moveFile(
			$this->uploadedFile, 
			$fileNew
		    );
		} catch (sfFileException $sfFlEx) {
			$this->logMessage(
			    'PrPhInoxStar->createPhotoWithThumbs() : Erro ' + 
			    'ao salvar foto. ' . $sfFlEx->getMessage(), 'error'
			);
			return false;
		}
	}

	public function getRelativePath()
	{
		return static::$relativePath . $this->getPrId()
			. DIRECTORY_SEPARATOR;
	}
}
