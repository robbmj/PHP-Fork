#! /home/robbmi/myprograms/php/cli/phpbuild/php-5.4.26/sapi/cli/php -q
<?php

declare(ticks = 1);

function do_job($job) {
	echo "child process: executing job $job\n";
	sleep(2);
	die("child process: job $job done\n");
}

function main() {

	$child_pids = array();

	pcntl_signal(SIGCHLD, function ($signo) use (&$child_pids) {
		echo "parent process: got signo: $signo\n";
		array_pop($child_pids);
	});

	foreach (range(0, 9) as $job) {

		$pid = pcntl_fork();

		if ($pid === 0) {
			do_job($job);
		}
		else {
			echo "parent process: started child process pid: $pid with job: $job\n";
			array_push($child_pids, $pid);
		}
	}

	// FIXME: if the child process dies before the parent process has
        //  pushed the pid onto the child_pids array we end up in
        //  in an infinite loop.
	while (count($child_pids) > 0);

	echo "parrent process: all jobs done!\n";

}

main();
?>
