PHP-Fork
========

PHP Forking Demo with pcntl_fork

This is just a simple PHP application the forks 10 child processes. The parent process waits for all the children to finish then it terminates. 

To use the pcntl library you need to build PHP from source. 

Grab what ever version of PHP you want to use (I am using PHP 5.4.26) from the <a href="http://br.php.net/downloads.php">PHP downloads page</a> 

unzip the archive: 
  tar -zxvf php-5.4.26.tar.gz

cd into the extracted directory: 
  cd php-5.4.26/

build PHP: 
  sudo ./configure --enable-pcntl && make

NOTE: I did not install this version, if you want to issue this command instead: `sudo ./configure --enable-pcntl && make install`

Also it seams to be a common problem (Debian and Fedora) that the PHP configure script complains about a missing libxml so file. If you run into that issue have a look at this thread: http://ubuntuforums.org/showthread.php?t=836133. 

The solution should be similar with yum:

  yum search available | grep libxml
  yum install libxml2-dev

After you have installed the xmllib rebuild PHP.

If you are interested in learning more about forking in PHP check out these resources.

<a href="http://www.youtube.com/watch?v=FU_GZF5YLuI">PHPNW12 Sunday Track 2 Talk 3: Nathanial McHugh - Fork It! Parallel Processing In PHP</a>
<a href="https://github.com/natmchugh">Nathaniel McHugh's PHP-Fractals and phploc repos</a>
<a hred="http://ca1.php.net/manual/en/book.pcntl.php"The PCNTL Documentation</a>
