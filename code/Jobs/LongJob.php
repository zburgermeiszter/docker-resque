<?php

namespace Jobs;

class LongJob
{
	public function perform()
	{
		sleep(600);
	}
}