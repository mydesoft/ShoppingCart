<?php
	function PresentPrice($price)
	{
		return money_format('#%i', $price / 100);
	}