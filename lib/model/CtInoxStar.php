<?php

/**
 * Subclass for representing a row from the 'ct_inox_star_' table.
 *
 * 
 *
 * @package lib.model
 */ 
class CtInoxStar extends BaseCtInoxStar
{
	public function getNamNormalized()
	{
		return (
			str_replace(
				" ", "-", 
				strtolower(trim($this->getNam()))
			)
		);
	}
}
