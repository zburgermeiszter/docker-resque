<?php

namespace Jobs;

class ErrorJob
{
	public function perform()
	{
		callToUndefinedFunction();
	}
}