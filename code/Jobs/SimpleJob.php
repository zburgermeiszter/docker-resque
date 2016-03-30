<?php

namespace Jobs;

class SimpleJob
{
	public function perform()
	{
		sleep(30);
		fwrite(STDOUT, 'Hello!');
	}
}