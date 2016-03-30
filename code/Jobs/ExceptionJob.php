<?php

namespace Jobs;

class ExceptionJob
{
	public function perform()
	{
		throw new \Exception('Unable to run this job!');
	}
}